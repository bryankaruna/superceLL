<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderTransaction extends Model
{
    //relasi
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }

    protected $fillable = [
        'date', 'status', 'user_id',
    ];
}
