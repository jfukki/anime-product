<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserFavouriteList;

class UserFavouriteListController extends Controller
{
    public function __construct()
    {
    $this->middleware(['auth']);
    }

    public function store($anime_id, $user_id)
    {
            DB::table('user_favourite_lists')->insert(
                [
                    'anime_id' => $anime_id,
                    'user_id' => $user_id
                ]
            );

            return redirect()->back();
       
    }


    public function searchItemFav($anime_id, $user_id)
    {

        $user_fav_anime = DB::table('user_favourite_lists')
        ->where('anime_id', $anime_id)
        ->where('user_id', $user_id)
        ->get();


        if(count($user_fav_anime) > 0)
        {
            return redirect()->route('animeDetail', [$anime_id]);
            
        }else
        {

            DB::table('user_favourite_lists')->insert(
                [
                    'anime_id' => $anime_id,
                    'user_id' => $user_id
                ]
            );

            return redirect()->back();

        }

           
       
    }


    public function removefromfavlist($anime_id, $user_id)
    {
       $removeFromList =  DB::table('user_favourite_lists')
        ->where('anime_id', $anime_id)
        ->where('user_id', $user_id)
        ->delete();

        
            return redirect()->back();
 
    }

}
