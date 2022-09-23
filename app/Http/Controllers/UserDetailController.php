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
        return view('userdashboard.home');
    }

    public function userEdit($user_id)
    {
        $user = User::find($user_id);
        return view ('userdashboard.userEdit',['user'=>$user]);
    }

    public function userUpdate(Request $req, $id)
    {
        $user = User::find($id);

        $user->name = $req->name;
        $user->email = $req->email; 
        $user ->password = Hash::make($req->password);

        $user->save();

        return view('userdashboard.home'); 
    }

    public function editBannerAavatar($user_id)
    {
 
      $user = DB::table('user_details')->where('user_id', $user_id)->get();

        return view ('userdashboard.editBanner',['user'=> $user]);

    }

    public function updateBannerAvatar(Request $request, $user_id)
    {

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/'), $filename);
            $user_banner['image']= $filename;
        }

        $user_about= $request->about;
        $user_avatar= 'avatar';
        $user_banner= $request->file('image');
        
        
        $userBannerInfo = UserDetail::updateOrCreate(
            ['user_id' =>  $user_id],
            [
                
            'about' =>  $user_about,
            'user_avatar' =>  $user_avatar,
            'user_banner' =>  $user_banner,

        ]
       

        );

        if(isset($userBannerInfo))
        {
            return view('userdashboard.home'); 

        }
        else
        {
            return  "something went wrong...";
        }
    }
}
