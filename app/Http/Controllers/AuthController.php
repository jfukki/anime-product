<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
    {
    $this->middleware(['guest']);
    }


    public function signup()
    {
        return view('signup');
    }

 

    public function userRegister(Request $req)
    {
        $this->validate($req, [

            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        // create new user    //
        
        $user = new User();
        $user ->name = $req->name;
        $user ->email = $req->email;
        $user ->password = bcrypt($req->password);

        $user->save();
        
        auth()->attempt($req->only('email', 'password'));
        return redirect()->route('home1');
    }
}
