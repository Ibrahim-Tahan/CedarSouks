<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    public function getSeller(){
        return $this->belongsTo(persons::class,'sellerId','id');
    }
    public function getFavStores(){
        return $this->belongsToMany(Stores::class,'user__store__favorites','storeId','userId');
    }
    public function getOrders(){
        return $this->belongsToMany(Orders::class,'order_stores','store_id','order_id');
    }
    public function getCategories(){
        return $this->hasMany(Categories::class);
    }
    

}
