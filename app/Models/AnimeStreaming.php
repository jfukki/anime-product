<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeStreaming extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id', 
        'streamiing_title',
        'streamiing_url'
    ];
}
