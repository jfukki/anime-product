<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeReview extends Model
{
    use HasFactory;



    protected $fillable = [
        'anime_id',
        'user_id', 
        'user_name',
        'review_title',
        'review_text',
        'story',
        'animation',
        'characters',
        'music',
 
    ];


}
