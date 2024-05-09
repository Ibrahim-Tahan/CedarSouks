<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'eventId',
        'userId',
    ];
    
    public function getUsers(){
        return $this->belongsTo(persons::class,'userId');
    }

    public function getEvents(){
        return $this->belongsTo(events::class,'eventId');
    }


}
