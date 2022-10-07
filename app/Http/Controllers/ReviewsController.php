<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnimeReview;
use Auth;


class ReviewsController extends Controller
{

  

    public function index()
    {
        return view('animeReviews');
    }

    public function reviewDetail($id)
    {
        $anime_review_detail = DB::table('anime_reviews')
        ->where('id', $id)
        ->first();   

        $ani_id = $anime_review_detail->anime_id;

         $anime_detail = DB::table('animes')
            ->select('japanese_title','english_title', 'anime_image', 'rank', 'anime_id')
            ->where('anime_id', $ani_id)
            ->first();

        return view("reviewDetail", ['anime_review_detail' => $anime_review_detail, 'anime_detail' => $anime_detail]);
    }



    public function reviewAdd($anime_id)
    {

        $anime_review = AnimeReview::where('anime_id' , '=', $anime_id)->first();

        
        $anime_basic = DB::table('animes')->where('anime_id', $anime_id)->first();
        

        return view('userdashboard.addReview', ['anime_basic' => $anime_basic, 'anime_review' => $anime_review]);
    }


    public function reviewStore(Request $req, $anime_id, $user_id, $user_name)
    {
         

        $UserAnimeReview = AnimeReview::updateOrCreate(
            ['anime_id' =>  $anime_id,
             'user_id' =>  $user_id,
        
        ],
            [
                
                'review_title' => $req->reviewTitle,
                'review_text' => $req->review,
                'story' => $req->story,
                'animation' => $req->animation,
                'characters' => $req->characters,
                'music' => $req->sound,
                'user_name' => $user_name,



    
            ]);

            if(isset($UserAnimeReview))
            { 
                return redirect()->back()->with('status', 'Review Updated!');;

            }

            // return redirect()->back();
            return "something is wrong";
    }


}
