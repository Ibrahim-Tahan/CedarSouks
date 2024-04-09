<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function getCategory(){
        return $this->belongsTo(Categories::class);
    }
    public function getOrders(){
        return $this->belongsToMany(Orders::class,'order_details','product_id','order_id');
    }
public function getStores(){
    return $this->belongsTo(Products::class);
}
public function getOrderDetails(){
    return $this->hasMany(Order_details::class);
}
}
