<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persons extends Model
{
    use HasFactory;
    public function getStore(){
        return $this->hasMany(Stores::class);
    }
    public function getFavStores(){
        return $this->belongsToMany(Stores::class,'user__store__favorites','userId','storeId');
    }
    public function getOrders(){
        return $this->hasMany(Orders::class);
    }
}
