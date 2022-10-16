<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopAiringAnime extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'anime_id', 
        'english_title',
        'japanese_title',
        'anime_image'
    ];

}
