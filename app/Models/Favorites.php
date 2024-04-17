<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'userId',
        'storeId',
    ];

    public function getUser()
    {
        return $this->belongsTo(persons::class, 'userId');
    }

    public function getStore()
    {
        return $this->belongsTo(Stores::class, 'storeId');
    }
}
