<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;

use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;

class Producto extends Model implements HasMedia{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    // use InteractsWithMedia;

    // protected $table = 'producto';

    protected $fillable = [
        'descripcion',
        'tipo',
        'detalle',
        'urlimagen',
        'precio',
        'cantidad'
    ];    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $appends = ['resource_url', 'media_urls'];


    public function toJsonAPI()
    {
        $producto = new \stdClass;
        $producto->id = $this->id;
        $producto->descripcion = $this->descripcion;
        $producto->detalle = $this->detalle;
        $producto->urlimagen = $this->urlimagen;
        $producto->tipo = $this->tipo;
        $producto->precio = $this->precio;
        $producto->cantidad = $this->cantidad;
        return $producto;
    }

    /* ************************** MEDIA ************************** */

    public function registerMediaCollections(): void {
        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(3);
    }
    
    public function registerMediaConversions(Media $media = null): void{
        $this->autoRegisterThumb200()
        ->addMediaConversion('thumb')
        ->fit(Manipulations::FIT_MAX, 200, 200)
        ->optimize();
    }
    

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute(){
        return url('/admin/productos/'.$this->getKey());
    }

    public function getMediaUrlsAttribute() {
        $mediaItems = $this->getMedia();

        $mediaUrls = $mediaItems->map(function (Media $media) {
            return $media->getFullUrl();
        });
        return $mediaUrls;
    }   
}