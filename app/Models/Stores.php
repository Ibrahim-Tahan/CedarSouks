<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Stores extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'isApproved',
        'sellerId',
        'logo',
        'description',
        'address',
        'longitude',
        'latitude',
    ];


    public function getSeller(){
        return $this->belongsTo(persons::class,'sellerId','id');
    }
    public function getFavStores(){
        return $this->belongsToMany(Stores::class,'favorites','storeId','userId');
    }
    public function getOrders(){
        return $this->belongsToMany(Orders::class,'order_stores','store_id','order_id');
    }
    public function getCategories(){
        return $this->hasMany(Categories::class,'store_id','id');
    }
    public function getEvents(){
        return $this->hasMany(events::class,'storeId');
    }
    public function getReviews(){
        return $this->hasMany(Reviews::class,'storeId');
    }

    protected static $marks = [
        Like::class,
    ];
}
