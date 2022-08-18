<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController as Controller;
use Illuminate\Http\Request;

class BiddingController extends Controller
{
    public function index()
    {
        $data['title']   = 'Halaman Bidding User';
        $data = array_merge($this->currentUser(), $data);

        return view('backend.user.account', compact('data'));
    }
}
