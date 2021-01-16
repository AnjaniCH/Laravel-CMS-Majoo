<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'image', 'name', 'qty', 'price', 'subtotal',
    ];

    protected $table = 'carts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }


}