<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anime;
use App\Models\PopularAnime;


class AnimeController extends Controller
{

    public function popularAnimeInsert()
    {

        // NOTE: page change kre - to get popular aime list | initial page is {42}
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime?genres=1&order_by=popularity&page=63&limit=10',
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

}
