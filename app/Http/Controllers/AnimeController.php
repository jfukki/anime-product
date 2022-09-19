<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anime;
use App\Models\PopularAnime;
use App\Models\HorrorAnime;



class AnimeController extends Controller
{

    public function popularAnimeInsert()
    {

        // NOTE: page change kre - to get popular aime list | initial page is {42}
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime?genres=1&order_by=popularity&page=80&limit=10',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $popularAnime = [];
        $response = curl_exec($curl);

        curl_close($curl);

        
        $popularAnime = json_decode($response, true);
           
        if(isset($popularAnime['data'])){
            
            $data =  $popularAnime['data'];
        }
 

         // popular anime basic entry database
            
         
            $anime_popular  = $data;

   
             foreach($anime_popular as $key => $anime_populars)
             {
                
                $AnimeInformation = PopularAnime::updateOrCreate(
                    ['anime_id' =>  $anime_popular[$key]['mal_id']],
                    [
                        
                        'anime_title' => $anime_popular[$key]['title_english'],
                        'anime_picture' => $anime_popular[$key]['images']['jpg']['large_image_url'],
                        'popularity' => $anime_popular[$key]['popularity'],
            
                      ]
               
    
                );
                 
                                 
             }

         
    }



    public function horrorAnimeInsert()
    {

        // NOTE: page change kre - to get popular aime list | initial page is {1} | and last page {22}
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime?genres=14&limit=25&page=22',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $horrorAnime = [];
        $response = curl_exec($curl);

        curl_close($curl);

        
        $horrorAnime = json_decode($response, true);
           
        if(isset($horrorAnime['data'])){
            
            $data =  $horrorAnime['data'];
        }
 

         // popular anime basic entry database
                     
             $anime_horror  = $data;
   
             foreach($anime_horror as $key => $anime_horrors)
             {
                
                $AnimeInformation = HorrorAnime::updateOrCreate(
                    ['anime_id' =>  $anime_horrors['mal_id']],
                    [
                        
                        'anime_title' => $anime_horrors['title_english'],
                        'anime_picture' => $anime_horrors['images']['jpg']['large_image_url'],
                        'popularity' => $anime_horrors['popularity'],
            
                      ]
               
    
                );
                 
                                 
             }

         
    }

}
