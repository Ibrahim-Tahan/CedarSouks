<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'store_id'
    ];
    public function getProducts(){
        return $this->hasMany(Products::class,'id');
    }
    public function getStores(){
        return $this->belongsTo(Stores::class,'store_id','id');
    }

}
