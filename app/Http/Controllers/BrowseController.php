<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function index()
    {
     
        
        
           
            
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.jikan.moe/v4/anime?sort=desc&order_by=favorites&limit=10',
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
    
                $popularAnime =  $popularAnime['data'];
            }
    
             
            // movies anime

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.jikan.moe/v4/anime?type=movie&limit=15',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $movies = [];

            $response = curl_exec($curl);

            curl_close($curl);

            $movies = json_decode($response, true);
    
            if(isset($movies['data'])){
    
                $movies =  $movies['data'];
            }

            // airing anime

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.jikan.moe/v4/anime?status=airing&sort=desc&limit=10&order_by=score',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $airing = [];

            $response = curl_exec($curl);

            curl_close($curl);

            $airing = json_decode($response, true);
    
            if(isset($airing['data'])){
    
                $airing =  $airing['data'];
            }
    
        return view ('browse')->with('popularAnime', $popularAnime)->with('movies', $movies)->with('airing', $airing);
    }


    public function randomImages()
    {

        $randomId       =   rand(2,20000);
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$randomId.'/pictures',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $randomAnime = [];

        $response = curl_exec($curl);

        curl_close($curl);

        $randomAnime = json_decode($response, true);

        if(isset($randomAnime['data'])){

            $randomAnime =  $randomAnime['data'];
        }


// anime title

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$randomId.'/full',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));


        $anime = [];

        $response = curl_exec($curl);

        curl_close($curl);
        $anime = json_decode($response, true);
           
        if(isset($anime['data'])){
            
            $anime =  $anime['data']['titles'][0]['title'];
        }
 


        return view('randomPictures')->with('randomAnime', $randomAnime)->with('anime', $anime);
    }


}
