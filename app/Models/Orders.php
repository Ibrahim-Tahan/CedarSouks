<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public function getBuyer(){
        return $this->belongsTo(persons::class,'userId','id');
    }
    public function getStores(){
        return $this->belongsToMany(Stores::class,'order_stores','order_id','store_id');
    }
    public function getProducts(){
        return $this->belongsToMany(Products::class,'order_details','order_id','product_id');
    }
    public function getOrderDetails(){
        return $this->hasMany(Order_details::class);
    }
}
