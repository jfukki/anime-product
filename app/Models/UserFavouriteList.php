<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouriteList extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id', 
        'user_id',
    ];
}
