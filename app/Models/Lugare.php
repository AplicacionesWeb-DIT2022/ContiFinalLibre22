<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lugare extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'CP',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/lugares/'.$this->getKey());
    }
}
