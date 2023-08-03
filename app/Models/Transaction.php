<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'products_id', 'users_id', 'transaction_total', 'transaction_status', 'handle_status'
    ];

    protected $hidden = [];

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
