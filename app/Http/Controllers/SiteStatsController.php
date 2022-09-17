<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteStatsController extends Controller
{
    public function index()
    {
        // searches counter

  
        $count = DB::table('anime_seaches')->count();
        $anime_count = DB::table('animes')->count();
        return view('site_stats', ['count' => $count, 'anime_count' => $anime_count]);

        // reviews counter

        // users counter


    }
}
