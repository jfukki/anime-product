<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Country;


use Location;

class SiteStatsController extends Controller
{
    public function index(Request $request)
    {
        // searches counter

  
        $count = DB::table('anime_seaches')->count();
        $anime_count = DB::table('animes')->count();
        $user_count = DB::table('users')->count();
        $fav_count = DB::table('user_favourite_lists')->count();
        $reviews_count = DB::table('anime_reviews')->count();


        
        $ip = $request->ip();

        $data = \Location::get($ip);
    
        $country = Country::updateOrCreate(

                [
                    'countryName' =>  $data->countryName, 
                ],

                [
                    
                    'countryName' =>  $data->countryName, 
                ]
           

        );
            
       

        // dd($data['countryName']);

        return view('site_stats', ['count' => $count, 
                                   'anime_count' => $anime_count,
                                   'user_count' => $user_count,
                                   'fav_count' => $fav_count,
                                   'reviews_count' => $reviews_count,

                                
                                   ]);

        // reviews counter

        // users counter




    }
}
