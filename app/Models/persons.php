<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class persons extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'birth_date',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getStore()
    {
        return $this->hasMany(Stores::class, 'sellerId');
    }

    public function getFavStores()
    {
        return $this->belongsToMany(Favorites::class, 'favorites', 'userId', 'storeId');
    }

    public function getOrder()
    {
        return $this->hasMany(Orders::class, 'userId', 'id');
    }

    public function getAddresses()
    {
        return $this->hasMany(Address::class, 'userId');
    }

    public function getWishlist()
    {
        return $this->hasOne(Wishlist::class, 'buyersId');
    }

    public function getEvents()
    {
        return $this->hasMany(EventUserProduct::class, 'userId');
    }
}
