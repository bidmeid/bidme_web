<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup()
    {
        return view('frontend.auth.signup');
    }

    public function sigin()
    {
        return view('frontend.auth.login');
    }
}
