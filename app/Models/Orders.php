<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['userId', 'status'];

    public function getBuyer(){
        return $this->belongsTo(persons::class,'userId','id');
    }
    public function getStores(){
        return $this->belongsToMany(Stores::class,'order_stores','order_id','store_id');
    }
    public function getOrderDetails(){
        return $this->hasMany(Order_details::class,'orderId','id');
    }
}
