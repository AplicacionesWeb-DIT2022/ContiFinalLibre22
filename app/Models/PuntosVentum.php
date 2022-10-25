<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuntosVentum extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'descripcion',
        'codigo postal',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/puntos-venta/'.$this->getKey());
    }
}
