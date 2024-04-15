<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    public function getOrders()
    {
        return $this->belongsTo(Orders::class,'orderId','id');
    }
    public function getProducts()
    {
        return $this->belongsTo(Products::class,'productId','id');
    }
}
