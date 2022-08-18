<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController as Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {


        $data['title']   = 'Halaman User Account';
        $data = array_merge($this->currentUser(), $data);

        return view('backend.user.account', compact('data'));
    }
}
