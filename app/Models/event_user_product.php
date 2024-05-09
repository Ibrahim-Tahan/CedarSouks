<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_user_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'eventId',
        'productId',
        'bidding_price',
        'userId',
        'event_status'
    ];
    public function getUsers(){
        return $this->belongsTo(persons::class,'userId');
    }
    public function getProducts(){
        return $this->belongsTo(Products::class,'productId');
    }
    public function getEvents(){
        return $this->belongsTo(events::class,'eventId');
    }
}
