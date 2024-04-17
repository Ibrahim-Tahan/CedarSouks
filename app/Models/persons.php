<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
class persons extends Model  implements Authenticatable
{
    use AuthenticatableTrait;
    protected $table ='persons';
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'birth_date',
        'user_type',
    ];
    public function getStore(){
        return $this->hasMany(Stores::class,'sellerId');
    }
    public function getFavStores(){
        return $this->belongsToMany(Favorites::class,'favorites','userId','storeId');
    }
    public function getOrder(){
        return $this->hasMany(Orders::class,'userId','id');
    }
    public function getAdresses(){
        return $this->hasMany(address::class,'userId');
    }
    public function getWishlists(){
        return $this->hasOne(wishlist::class, 'buyersId');
    }
    public function getEvents(){
        return $this->hasMany(event_user_product::class,'userId');
    }
}