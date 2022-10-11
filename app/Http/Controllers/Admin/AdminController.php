<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginIndex()
    {
        return view('adminDashboard.login');
    }


    public function login()
    {
        return view('adminDashboard.main');
    }
}
