<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MyListController extends Controller
{
    public function __construct()
    {
    $this->middleware(['auth']);
    }

    public function index()
    {

        $user_id = auth()->user()->id;
        
         $user_fav_anime_list= DB::table('user_favourite_lists')
        ->join('animes', 'user_favourite_lists.anime_id', '=', 'animes.anime_id')        
        ->where('user_favourite_lists.user_id', $user_id)
        ->orderBy('user_favourite_lists.id', 'desc')
        ->get();

        return view('my-list' , ['user_fav_anime_list' => $user_fav_anime_list]);
    }
}
