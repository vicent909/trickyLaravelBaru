<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'transaction_id', 'product_title', 'size', 'color', 'quantity', 'price', 'price_end'
    ];

    protected $hidden = [];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function sizes(){
        return $this->belongsTo(Size::class, 'size', 'id');
    }
    
    public function colors(){
        return $this->belongsTo(Color::class, 'color', 'id');
    }
}
