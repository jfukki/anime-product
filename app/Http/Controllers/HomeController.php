<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\AnimeView;
use Illuminate\Support\Facades\DB;
use App\Models\AnimeSeach;
use App\Models\Anime;
use App\Models\AnimeDetail;



class HomeController extends Controller
{
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/top/anime/?limit=5&filter=bypopularity',
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
          CURLOPT_URL => 'https://api.jikan.moe/v4/seasons/2022/summer?limit=5',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $season = [];
        $response = curl_exec($curl);
        
        curl_close($curl);

        $season = json_decode($response, true);
           
        if(isset($season['data'])){
            
            $season =  $season['data'];
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/seasons/upcoming/?limit=6',
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

 
        return view('home')->with('data', $data)->with('upcomingSeason',$upcomingSeason)->with('season', $season);
    }


    public function animeDetailV2($id)
    {

             // views counter
        DB::table('anime_views')->where('anime_id', $id)->increment('views');

        
        $AnimeView = AnimeView::updateOrCreate(
            ['anime_id' =>  $id]
            

        );
 
        $animeViews = DB::table('anime_views')->where('anime_id', $id)->first();
 

        // views counter


         $anime_basic = DB::table('animes')->where('anime_id', $id)->first();

            if(isset($anime_basic) )
            {

                $anime_genres = DB::table('anime_details')->where('anime_id', $id)->get();
                $anime_producers = DB::table('anime_producers')->where('anime_id', $id)->get();


                
                return view('detail',['anime_basic' => $anime_basic, 
                                      'anime_genres' => $anime_genres, 
                                      'anime_producers' => $anime_producers,
                                      'animeViews' => $animeViews
                                        
                                    ]);
            }
            else
            {
                $this->createAnimeBasicData($id);

                $anime_basic = DB::table('animes')->where('anime_id', $id)->first();
                return view('detail',['anime_basic' => $anime_basic]);
                
                
            }
  
    }

    public function createAnimeBasicData($id)
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


         // anime basic entry database
                // $anime_check = DB::table('animes')->where('anime_id', $id)->first();

                $english_title = $pagi['data']['title_english'];
                $synopsis = $pagi['data']['synopsis'];
                $rank = $pagi['data']['rank'];
                $popularity = $pagi['data']['popularity'];
                $youtube_trailer = $pagi['data']['trailer']['embed_url'];
                $type = $pagi['data']['type'];
                $episodes = $pagi['data']['episodes'];
                $status = $pagi['data']['status'];
                $aired = $pagi['data']['aired'];
                $season = $pagi['data']['season'];
                $broadcast = $pagi['data']['broadcast'];
                $rating = $pagi['data']['rating'];
                $duration = $pagi['data']['duration'];
                $source = $pagi['data']['source'];
                $anime_image = $pagi['data']['images']['jpg']['large_image_url'];

              $AnimeInformation = Anime::updateOrCreate(
                  ['anime_id' =>  $id],
                  ['english_title' =>  $english_title,
                  'synopsis' =>  $synopsis,
                  'rank' =>  $rank,
                  'popularity' =>  $popularity,
                  'youtube_trailer' =>  $youtube_trailer,
                  'type' =>  $type,
                  'no_of_episodes' =>  $episodes,
                  'status' =>  $status,
                  'aired' =>  'test',
                  'season' =>  $season,
                  'broadcast' =>  'test',
                  'rating' =>  $rating,
                  'duration' =>  $duration,
                  'source' =>  $source,
                  'anime_image' => $anime_image,
          
              ]
             
  
              );
  

// genres
              $anime_genre_check = DB::table('anime_details')->where('anime_id', $id)->get();
                
              if(count($anime_genre_check) > 0 ){
                  

              }
              else
              {
                  $anime_genres  = $pagi['data']['genres'];

                   
                  foreach($anime_genres as $key => $genres)
                  {
                      
  
                      
                      DB::table('anime_details')->insert(
                          [
                              'anime_id' => $id,
                              'genres' => $anime_genres[$key]['name']
                          ]
                      );
  
                      
                  }
  
              }

// genres


          // producers


                

          $anime_producers_check = DB::table('anime_producers')->where('anime_id', $id)->get();
                
          if(count($anime_producers_check) > 0 ){
                              

          }
          else
          {
              $anime_producers  = $pagi['data']['producers'];

               
              foreach($anime_producers as $key => $producers)
              {
                 

                  
                  DB::table('anime_producers')->insert(
                      [
                          'anime_id' => $id,
                          'producers' => $anime_producers[$key]['name']
                      ]
                  );

                  
              }

          }
          // producers


      



        }

        public function createAnimeCharacters($id)
        {

          // characters

          

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
  
   
  
            $anime_characters_check = DB::table('anime_characters')->where('anime_id', $id)->get();
            
            if(count($anime_characters_check) > 0 ){
                                
  
            }
            else
            {
                 
              $anime_characters  = $characters;
                 
                foreach($anime_characters as $key => $anime_character)
                {
                   
  
                    
                  $anime_character_insert_check =  DB::table('anime_characters')->insert(
                        [
                            'anime_id' => $id,
                            'character_name' => $anime_characters[$key]['character']['name'],
                            'character_image' => $anime_characters[$key]['character']['images']['jpg']['image_url'],
                            'character_role' => $anime_characters[$key]['role'],
  
                        ]
                    );
  
                    if(isset($anime_character_insert_check ))
                    {
                      return "insert ho gya";
                    }
                    else
                    {
                      return "insert NAI HUA";
  
                    }
  
                    
                }
  
            }
  
            // characters
        }



    public function animeDetail($id)
    {

        // views counter
        DB::table('anime_views')->where('anime_id', $id)->increment('views');

        
        $AnimeView = AnimeView::updateOrCreate(
            ['anime_id' =>  $id]
            

        );
 
        $animeViews = DB::table('anime_views')->where('anime_id', $id)->first();
 

        // views counter



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
                CURLOPT_URL => 'https://api.jikan.moe/v4/anime/'.$id.'/episodes',
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
        
        


 


                // anime basic entry database
                // $anime_check = DB::table('animes')->where('anime_id', $id)->first();

                  $english_title = $pagi['data']['title_english'];
                  $synopsis = $pagi['data']['synopsis'];
                  $rank = $pagi['data']['rank'];
                  $popularity = $pagi['data']['popularity'];
                  $youtube_trailer = $pagi['data']['trailer']['embed_url'];
                  $type = $pagi['data']['type'];
                  $episodes = $pagi['data']['episodes'];
                  $status = $pagi['data']['status'];
                  $aired = $pagi['data']['aired'];
                  $season = $pagi['data']['season'];
                  $broadcast = $pagi['data']['broadcast'];
                  $rating = $pagi['data']['rating'];
                  $duration = $pagi['data']['duration'];
                  $source = $pagi['data']['source'];
                  $anime_image = $pagi['data']['images']['jpg']['large_image_url'];
 
                $AnimeInformation = Anime::updateOrCreate(
                    ['anime_id' =>  $id],
                    ['english_title' =>  $english_title,
                    'synopsis' =>  $synopsis,
                    'rank' =>  $rank,
                    'popularity' =>  $popularity,
                    'youtube_trailer' =>  $youtube_trailer,
                    'type' =>  $type,
                    'no_of_episodes' =>  $episodes,
                    'status' =>  $status,
                    'aired' =>  'test',
                    'season' =>  $season,
                    'broadcast' =>  'test',
                    'rating' =>  $rating,
                    'duration' =>  $duration,
                    'source' =>  $source,
                    'anime_image' => $anime_image,
            
                ]
               
    
                );
    
                 
        
                // anime entry database
        
        


                // anime detail entry database
                
                
                // genres


                $anime_genre_check = DB::table('anime_details')->where('anime_id', $id)->get();
                
                if(count($anime_genre_check) > 0 ){
                    

                   
                   

                }
                else
                {
                    $anime_genres  = $pagi['data']['genres'];
 
                     
                    foreach($anime_genres as $key => $genres)
                    {
                        
    
                        
                        DB::table('anime_details')->insert(
                            [
                                'anime_id' => $id,
                                'genres' => $anime_genres[$key]['name']
                            ]
                        );
    
                        
                    }
    
                }

                // genres

             
 

                // producers


                

                $anime_producers_check = DB::table('anime_producers')->where('anime_id', $id)->get();
                
                if(count($anime_producers_check) > 0 ){
                                    

                }
                else
                {
                    $anime_producers  = $pagi['data']['producers'];
 
                     
                    foreach($anime_producers as $key => $producers)
                    {
                       
    
                        
                        DB::table('anime_producers')->insert(
                            [
                                'anime_id' => $id,
                                'producers' => $anime_producers[$key]['name']
                            ]
                        );
    
                        
                    }
    
                }
                // producers


                // episodes

                // print_r($episodes['data']);


                // episodes

                // characters
                

                // print_r($characters[0]['role']);

      

                $anime_characters_check = DB::table('anime_characters')->where('anime_id', $id)->get();
                
                if(count($anime_characters_check) > 0 ){
                                    

                }
                else
                {
                    $anime_characters  = $characters;
 
                     
                    foreach($anime_characters as $key => $anime_character)
                    {
                       
    
                        
                        DB::table('anime_characters')->insert(
                            [
                                'anime_id' => $id,
                                'character_name' => $anime_characters[$key]['character']['name'],
                                'character_image' => $anime_characters[$key]['character']['images']['jpg']['image_url'],
                                'character_role' => $anime_characters[$key]['role'],

                            ]
                        );
    
                        
                    }
    
                }

                // characters
            
            
            // anime detail entry database


            // fetch basic information

            $anime_basic = DB::table('animes')->where('anime_id', $id)->first();


            // fetch basic information


        
            return view('detail',['anime_basic' => $anime_basic]);

        // return view('animeDetail')->with('data', $data)->with('characters', $characters)->with('staff', $staff)->with('pictures', $pictures)->with('recommendations', $recommendations)->with('episodes', $episodes)->with('animeViews', $animeViews);
    }




    public function searchAnime(Request $req)
    {
      $searchItem = $req->searchAnimeTitle;
        
    //   insert data into database
    $AnimeSeach = new AnimeSeach;
    $AnimeSeach->anime_name = $req->searchAnimeTitle; 

    if($searchItem !="")
    {

        $AnimeSeach->save();

    }

    //   insert data into database
      
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.jikan.moe/v4/anime/?q='.$searchItem.'&limit=20',
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



        return view('search')->with('search', $search)->with('searchItem', $searchItem);

    }

     
}
