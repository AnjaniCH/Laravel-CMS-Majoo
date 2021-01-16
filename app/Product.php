<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand_id', 'image', 'description', 'price', 'discount', 'stock'
    ];

    protected $table = 'products';

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function detail() {
        return $this->hasMany(Detail::class);
    }

}
