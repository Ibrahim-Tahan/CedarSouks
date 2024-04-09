<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public function getProducts(){
return $this->hasMany(Products::class);
    }
    public function getStores(){
        return $this->belongsTo(Stores::class,'store_id','id');
    }

}
