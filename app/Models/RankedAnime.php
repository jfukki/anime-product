<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankedAnime extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id', 
        'anime_title',
        'anime_picture',
        'rank'
    ];
}
