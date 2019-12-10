<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    //relasi
    public function headerTransaction()
    {
        return $this->belongsTo('App\HeaderTransaction');
    }

    public function phones()
    {
        return $this->belongsTo('App\Phone');
    }

    protected $fillable = [
        'phone_id', 'header_id', 'qty',
    ];
}
