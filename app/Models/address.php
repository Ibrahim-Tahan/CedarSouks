<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    public function getUsers(){
        return $this->belongsTo(persons::class,'userId','id');
    }

    
}
