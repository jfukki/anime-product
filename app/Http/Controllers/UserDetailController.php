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

        return view('userdashboard.home', ['user'=> $user , 'user_detail' => $user_detail]);
    }

    public function userEdit($user_id)
    {
        $user = UserDetail::where('user_id' , '=', $user_id)->first();

        $user_detail = User::find($user_id);
        
        return view ('userdashboard.userEdit',['user'=> $user , 'user_detail' => $user_detail]);
    }

    public function userUpdate(Request $req, $id)
    {

        if($req->file('avatar')){
            $file= $req->file('avatar');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/user_images'), $filename);
            $user_avatar['avatar']= $filename;
            
            $user_avatar = $filename;  

        }
        else
        {
            $user_avatar= $req->avatar; 

         
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

        $user = User::find($id);

        $user->name = $req->name;
        $user->email = $req->email; 
        $user ->password = Hash::make($req->password);

        $user->save();

        $user_id = auth()->user()->id;
        $user = UserDetail::where('user_id' , '=', $user_id)->first();

        $user_detail = User::find($user_id);

        return view('userdashboard.home', ['user'=> $user , 'user_detail' => $user_detail]);
    }

    public function editBannerAavatar($user_id)
    {
 
        $user = DB::table('user_details')->select('user_banner', 'about')
                         ->where('user_id', $user_id)->get();

    //   $user = DB::table('user_details')->where('user_id', $user_id)->get();
    //   $user = UserDetail::where('user_id' , '=', $user_id)->first();
      

        return view ('userdashboard.editBanner',['user'=> $user]);
        // return view ('userdashboard.editBanner');

    }

    public function updateBannerAvatar(Request $request, $user_id)
    {

      echo  $user_banner = $request->image;
        $user_about= $request->about;
        
        
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/user_images'), $filename);
            $user_banner = $filename;  

        }
        else
        {            
            $user_banner = $request->image;
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
    
            return view('userdashboard.home', ['user' => $user]);

        }
        else
        {
            return  "something went wrong...";
        }
    }
}
