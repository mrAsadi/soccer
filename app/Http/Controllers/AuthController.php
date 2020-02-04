<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;
use Response;
use Flash;
use View;

class AuthController extends  AppBaseController
{

    public function __construct()
    {

    }

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        return view('auth.register');
    }
}
