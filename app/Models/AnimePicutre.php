<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimePicutre extends Model
{
    use HasFactory;

    protected $fillable = [

        'anime_id',
        'anime_picture_url',
    ];

}
