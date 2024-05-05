<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'storeId'
    ];
    public function getUserProduct(){
        return $this->hasMany(event_user_product::class,'eventId');
    }
    public function getStore(){
        return $this->belongsTo(Stores::class,'storeId');
    }
 
}
