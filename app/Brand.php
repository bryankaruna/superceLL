<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //relasi
    public function phones()
    {
        return $this->hasMany('App\Phone');
    }
}
