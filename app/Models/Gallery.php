<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'product_id' , 'image',
    ];

    protected $hidden = [];

    public function product_image(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
