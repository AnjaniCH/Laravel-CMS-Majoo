<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    //
    protected $fillable = [
        'user_id', 'date', 'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }


}
