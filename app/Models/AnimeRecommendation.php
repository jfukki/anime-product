<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [

        'anime_id',
        'anime_mal_id',
        'anime_picture',
        'anime_title'
    ];
}
