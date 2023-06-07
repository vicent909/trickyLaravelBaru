<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'user_id', 'products_id', 'size_id', 'color_id', 'quantity', 'checkout_at'
    ];

    protected $hidden = [];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'product_id', 'products_id');
    } 

    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
