<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'categoryId',
    ];
    
    public function getCategory(){
        return $this->belongsTo(Categories::class,'categoryId');
    }
    public function getOrderDetails(){
    return $this->hasMany(Order_details::class,'productId');
}
    public function getEventUserProduct(){
    return $this->hasOne(event_user_product::class,'productId');
}
    public function getWishlist(){
    return $this->hasMany(wishlist::class,'productId');
}
}
