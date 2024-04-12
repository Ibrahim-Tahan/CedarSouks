<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'event_date',
        'store_id',
    ];
    public function getUserProduct(){
        return $this->hasMany(event_user_product::class,'eventId');
    }
    public function getStore(){
        return $this->belongsTo(Stores::class,'storeId');
    }
 
}
