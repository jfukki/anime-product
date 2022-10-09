<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserDetail;



class UserDetailController extends Controller
{

    public function __construct()
    {
    $this->middleware(['auth']);
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = UserDetail::where('user_id' , '=', $user_id)->first();

        $user_detail = User::find($user_id);


        // heart list

       
        $user_fav_anime_list= DB::table('user_favourite_lists')
    //    ->select('anime_id', 'english_title' , 'japanese_title', 'synopsis', 'popularity', 'anime_views.view')

       ->join('animes', 'user_favourite_lists.anime_id', '=', 'animes.anime_id')    
       ->join('anime_views', 'animes.anime_id', '=', 'anime_views.anime_id')        

       ->where('user_favourite_lists.user_id', $user_id)
       ->orderBy('user_favourite_lists.id', 'desc')

       ->get();


        $user_anime_watch_list = DB::table('user_anime_status_lists')
       ->join('animes', 'user_anime_status_lists.anime_id', '=', 'animes.anime_id')    
       ->where('user_anime_status_lists.status', 'watching')
       ->where('user_anime_status_lists.user_id', $user_id)
       ->orderBy('user_anime_status_lists.id', 'desc')
       ->get();


       $user_anime_planing_list = DB::table('user_anime_status_lists')
       ->join('animes', 'user_anime_status_lists.anime_id', '=', 'animes.anime_id')    
       ->where('user_anime_status_lists.status', 'planning')
       ->where('user_anime_status_lists.user_id', $user_id)
       ->orderBy('user_anime_status_lists.id', 'desc')
       ->get();
       

       $user_anime_watched_list = DB::table('user_anime_status_lists')
       ->join('animes', 'user_anime_status_lists.anime_id', '=', 'animes.anime_id')    
       ->where('user_anime_status_lists.status', 'watched')
       ->where('user_anime_status_lists.user_id', $user_id)
       ->orderBy('user_anime_status_lists.id', 'desc')
       ->get();

       $user_anime_dropped_list = DB::table('user_anime_status_lists')
       ->join('animes', 'user_anime_status_lists.anime_id', '=', 'animes.anime_id')    
       ->where('user_anime_status_lists.status', 'dropped')
       ->where('user_anime_status_lists.user_id', $user_id)
       ->orderBy('user_anime_status_lists.id', 'desc')
       ->get();


       $anime_dropped_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'dropped')
       ->count();   


       
       $anime_watching_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'watching')
       ->count();   


       $anime_plan_to_watch_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'planning')
       ->count();   

       $anime_watched_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'watched')
       ->count(); 
        // heart list

        return view('userdashboard.home1', ['user'=> $user , 
                                            'user_detail' => $user_detail, 
                                            'user_fav_anime_list' => $user_fav_anime_list,
                                            'user_anime_watch_list' => $user_anime_watch_list,
                                            'user_anime_planing_list' => $user_anime_planing_list,
                                            'user_anime_watched_list' => $user_anime_watched_list,
                                            'user_anime_dropped_list' => $user_anime_dropped_list,
                                            'anime_dropped_status_count' => $anime_dropped_status_count,
                                            'anime_watching_status_count' => $anime_watching_status_count,
                                            'anime_watched_status_count' => $anime_watched_status_count,
                                            'anime_plan_to_watch_status_count' => $anime_plan_to_watch_status_count,
                                        ]);
    }

    public function userEdit($user_id)
    {
        $user = UserDetail::where('user_id' , '=', $user_id)->first();

        $user_detail = User::find($user_id);
        
        return view ('userdashboard.profileEdit',['user'=> $user , 'user_detail' => $user_detail]);
    }

    public function userUpdate(Request $req, $id)
    {
        $user = User::find($id);

        if($req->password== null)
        {
          
            $user->name = $req->name;
            $user->email = $req->email; 
            $user->save();

        }
        else{

            $user->name = $req->name;
            $user->email = $req->email;     
            $user->password = bcrypt($req->password);
     
            $user->save();
    
        }
  
       


        if($req->file('avatar')){
            $file= $req->file('avatar');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/user_images'), $filename);
            $user_avatar['avatar']= $filename;
            
            $user_avatar = $filename;  

        }
        else
        {
            $user_avatar= $req->old_image; 

         
        }

        $userBannerInfo = UserDetail::updateOrCreate(
            ['user_id' =>  $id],
            [
                    'user_avatar' =>  $user_avatar,

        ]
       

        );

        if(isset($userBannerInfo))
        {
           
    
        }
        else
        {
            return  "something went wrong...";
        }

        $user_id = auth()->user()->id;
        $user = UserDetail::where('user_id' , '=', $user_id)->first();

        $user_detail = User::find($user_id);
        

        
       $anime_dropped_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'dropped')
       ->count();   


       
       $anime_watching_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'watching')
       ->count();   


       $anime_plan_to_watch_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'planning')
       ->count();   

       $anime_watched_status_count = DB::table('user_anime_status_lists')
       ->select('anime_id')
       ->where('user_id', $user_id)
       ->where('status' , 'watched')
       ->count(); 

        return view('userdashboard.home1', [
                                            'user'=> $user , 
                                            'user_detail' => $user_detail,
                                            'anime_dropped_status_count' => $anime_dropped_status_count,
                                            'anime_watching_status_count' => $anime_watching_status_count,
                                            'anime_watched_status_count' => $anime_watched_status_count,
                                            'anime_plan_to_watch_status_count' => $anime_plan_to_watch_status_count,
    
                                            ]);
        
    }

    public function editBannerAavatar($user_id)
    {
 
        // $user = DB::table('user_details')->select('user_banner', 'about')
        //                  ->where('user_id', $user_id)->get();

    //   $user = DB::table('user_details')->where('user_id', $user_id)->get();
      $user = UserDetail::where('user_id' , '=', $user_id)->first();
      

        return view ('userdashboard.editBio',['user'=> $user]);
        // return view ('userdashboard.editBanner');

    }

    public function updateBannerAvatar(Request $request, $user_id)
    {

         
        
        
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/user_images'), $filename);
            $user_banner = $filename;  

            $user_about= $request->about;


        }
        else
        {            
            $user_banner = $request->old_image;
            $user_about= $request->about;

        }

         
        
        
        $userBannerInfo = UserDetail::updateOrCreate(
            ['user_id' =>  $user_id],
            [
                
            'about' =>  $user_about,
            'user_banner' =>  $user_banner,

        ]
       

        );

        if(isset($userBannerInfo))
        {
           
            $user_id = auth()->user()->id;
            $user = UserDetail::where('user_id' , '=', $user_id)->first();
      
            $anime_dropped_status_count = DB::table('user_anime_status_lists')
            ->select('anime_id')
            ->where('user_id', $user_id)
            ->where('status' , 'dropped')
            ->count();   
     
     
            
            $anime_watching_status_count = DB::table('user_anime_status_lists')
            ->select('anime_id')
            ->where('user_id', $user_id)
            ->where('status' , 'watching')
            ->count();   
     
     
            $anime_plan_to_watch_status_count = DB::table('user_anime_status_lists')
            ->select('anime_id')
            ->where('user_id', $user_id)
            ->where('status' , 'planning')
            ->count();   
     
            $anime_watched_status_count = DB::table('user_anime_status_lists')
            ->select('anime_id')
            ->where('user_id', $user_id)
            ->where('status' , 'watched')
            ->count(); 
     
            return view('userdashboard.home1', ['user' => $user, 
        
            'anime_dropped_status_count' => $anime_dropped_status_count,
            'anime_watching_status_count' => $anime_watching_status_count,
            'anime_watched_status_count' => $anime_watched_status_count,
            'anime_plan_to_watch_status_count' => $anime_plan_to_watch_status_count,
        
        ]);
            
        }
        else
        {
            return  "something went wrong...";
        }
    }


    public function userReviewList()
    {

        $user_id = auth()->user()->id;
        
        $user = UserDetail::where('user_id' , '=', $user_id)->first();

        $user_detail = User::find($user_id);

         $anime_reviews = DB::table('anime_reviews')
        ->select('anime_reviews.review_title', 'anime_reviews.id', 'animes.english_title', 'animes.japanese_title',
         'animes.anime_image', 'anime_reviews.review_text', 'user_details.user_avatar', 
         'anime_reviews.user_name' )
        ->join('animes', 'anime_reviews.anime_id', '=', 'animes.anime_id')   
        ->join('user_details', 'anime_reviews.user_id', '=', 'user_details.user_id')   
        ->where('anime_reviews.user_id', $user_id) 
        ->orderBy('anime_reviews.id', 'desc')
        ->paginate(10);
     
        $reviews_count = $anime_reviews->count();

        return view('userdashboard.userReviewsList', [
                                                        'anime_reviews' => $anime_reviews,
                                                        'reviews_count' => $reviews_count,
                                                        'user' => $user,
                                                        'user_detail' => $user_detail,

                                                    
                                                      ]);
    }

    public function deleteUserReview($id)
    {
        
        DB::table('anime_reviews')->delete($id);
        return back();
    }
}
