<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
    $this->middleware(['guest']);
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $this->validate($req, [

            
            'email' => 'required|email',
          
            'password' => 'required',
        ]);

        if(! auth()->attempt($req->only('email', 'password')))
        {
                return back()->with('status', "Invalid Login Credentials");
        }

        return redirect()->route('my-profile');
    }
}
