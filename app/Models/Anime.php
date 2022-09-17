<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $fillable = [
        'anime_id',
        'english_title',
        'synopsis',
        'rank',
        'popularity',
        'youtube_trailer',
        'type',
        'no_of_episodes',
        'status',
        'aired',
        'season',
        'broadcast',
        'rating',
        'duration',
        'source',
        'anime_image'

      

    ];
}
