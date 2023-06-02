<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'title' , 'slug', 'about', 'price'
    ];

    protected $hidden = [];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }

    public function variants(){
        return $this->hasMany(Variant::class, 'products_id', 'id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'products_id', 'id');
    }


}
