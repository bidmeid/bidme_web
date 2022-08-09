<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiddingController extends Controller
{
    public function index()
    {
        return view('frontend.pages.bidding');
    }
}
