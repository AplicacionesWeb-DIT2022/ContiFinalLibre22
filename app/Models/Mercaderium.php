<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mercaderium extends Model
{
    protected $fillable = [
        'descripcion',
        'detalle',
        'urlimagen',
        'tipo',
        'precio',
        'cantidad',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/mercaderia/'.$this->getKey());
    }
}
