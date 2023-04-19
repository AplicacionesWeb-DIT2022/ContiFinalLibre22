<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productox extends Model
{
    protected $table = 'productox';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/productoxes/'.$this->getKey());
    }
}