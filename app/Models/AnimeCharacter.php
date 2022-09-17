<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeCharacter extends Model
{
    use HasFactory;

    
    protected $fillable = [

        'anime_id',
        'character_name',
        'character_image',
        'character_role',  

    ];

    

}
