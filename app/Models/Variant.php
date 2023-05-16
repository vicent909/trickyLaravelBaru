<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id', 'sizes_id', 'colors_id', 'quantity', 'price'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizes_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'colors_id', 'id');
    }
}
