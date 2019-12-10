<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    //relasi
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function phone()
    {
        return $this->belongsTo('App\Phone');
    }
    
    protected $fillable = [
        'email', 'comment',
    ];
}
