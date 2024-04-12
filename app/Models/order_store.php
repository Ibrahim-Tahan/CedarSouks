<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_store extends Model
{
    protected $fillable = [
        'order_id',
        'store_id',
    ];
    public function getOrders(){
        return $this->belongsTo(Orders::class,'order_id');
    }
    public function getStores(){
        return $this->belongsTo(Stores::class,'store_id');
    }
}
