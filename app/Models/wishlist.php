<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyersId',
        'productId',
    ];

    public function getBuyer()
    {
        return $this->belongsTo(persons::class,'buyersId');
    }
    public function getProduct()
    {
        return $this->belongsTo(Products::class,'productId');
    }
}
