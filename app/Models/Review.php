<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function getBuyer(){
        return $this->belongsTo(persons::class,'userId','id');
    }
    public function getStore(){
        return $this->belongsTo(Stores::class,'storeId','id');
    }
}
