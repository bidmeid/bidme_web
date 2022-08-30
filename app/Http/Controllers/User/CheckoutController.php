<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController  as Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['title']   = 'Halaman Checkout Pesanan';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.checkout', compact('data'));
    }
}
