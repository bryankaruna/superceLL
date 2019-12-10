<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //relasi
    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
