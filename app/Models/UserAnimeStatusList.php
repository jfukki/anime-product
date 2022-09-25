<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnimeStatusList extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id', 
        'user_id',
        'status',

    ];
}
