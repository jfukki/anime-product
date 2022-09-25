<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\Models\UserAnimeStatusList;
use Auth;


class UserAnimeStatusListController extends Controller
{
    public function __construct()
    {
    $this->middleware(['auth']);
    }

    public function addToList($anime_id, $user_id, $status)
    {

        $UserAnimeStatusList = UserAnimeStatusList::updateOrCreate(
            ['anime_id' =>  $anime_id,
             'user_id' =>  $user_id,
        
        ],
            [
                
                'status' => $status,
    
            ]);

            return redirect()->back();
    }

}
