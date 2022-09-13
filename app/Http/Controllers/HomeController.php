<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/top/anime/?limit=15&filter=bypopularity',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));


        $pagi = [];

        $response = curl_exec($curl);

        curl_close($curl);
        $pagi = json_decode($response, true);
           
        if(isset($pagi['data'])){
            
            $data =  $pagi['data'];
        }
 


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/seasons/upcoming/?limit=20',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $upcomingSeason = [];

        $response = curl_exec($curl);

        curl_close($curl);
        $upcomingSeason = json_decode($response, true);
            
        if(isset($upcomingSeason['data'])){
            
            $upcomingSeason =  $upcomingSeason['data'];
        }

 
        return view('home')->with('data', $data)->with('upcomingSeason',$upcomingSeason);
    }


    public function animeDetail($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$id.'/full',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $pagi = [];

        $response = curl_exec($curl);

        curl_close($curl);
        $pagi = json_decode($response, true);
           

        if(isset($pagi['data'])){
            
            $data =  $pagi['data'];
        }



        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$id.'/characters',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $characters = [];

        $response = curl_exec($curl);

        curl_close($curl);

        $characters = json_decode($response, true);
         
        if(isset($characters['data'])){
            $characters =  $characters['data'];
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$id.'/staff',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $staff = [];

        $response = curl_exec($curl);

        curl_close($curl);
        $staff = json_decode($response, true);
          
       

        if(isset($staff['data'])){
            $staff =  $staff['data'];
        }


                
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$id.'/pictures',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $pictures = [];

        $response = curl_exec($curl);

        curl_close($curl);
        $pictures = json_decode($response, true);
          
      
        if(isset($pictures['data'])){

            $pictures =  $pictures['data'];
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$id.'/recommendations',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $recommendations = [];

        $response = curl_exec($curl);

        curl_close($curl);
        $recommendations = json_decode($response, true);
          
      

        if(isset($recommendations['data'])){

            $recommendations =  $recommendations['data'];
        }




        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$id.'/videos/episodes',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $episodes = [];
        $response = curl_exec($curl);

        curl_close($curl);
       
        $episodes = json_decode($response, true);
        
        if(isset($episodes['data'])){

            $episodes =  $episodes['data'];
        }else{
            $episodes = "No Episodes Found";
        }




        return view('animeDetail')->with('data', $data)->with('characters', $characters)->with('staff', $staff)->with('pictures', $pictures)->with('recommendations', $recommendations)->with('episodes', $episodes);
    }




    public function searchAnime(Request $req)
    {
       
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/top/anime?filter=bypopularity',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $search = [];
        $response = curl_exec($curl);

        curl_close($curl);
        $search = json_decode($response, true);

        if(isset($search['data'])){

            $search =  $search['data'];
        }

        return view('search')->with('search', $search);

    }

     
}
