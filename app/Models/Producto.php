<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Producto extends Model implements HasMedia{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    // protected $table = 'producto';

    protected $fillable = [
        'descripcion',
        'tipo',
        'precio',
        'cantidad'
    ];    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $appends = ['resource_url', 'media_urls'];


    // public function toJsonAPI()
    // {
    //     $producto = new \stdClass;
    //     $producto->descripcion = $this->descripcion;
    //     $producto->media_url = $this-> getMediaUrlsAttribute();
    //     return $producto;
    // }

    /* ************************** MEDIA ************************** */

    public function registerMediaCollections(): void {
        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(3);
    }
    
    public function registerMediaConversions(Media $media = null): void{
        $this->autoRegisterThumb200();
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