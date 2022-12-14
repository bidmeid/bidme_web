<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController as Controller;
use Illuminate\Http\Request;
use Session;
class UserController extends Controller
{
    public function index()
    {
		
		if (Session::has('order')) {
			$data = Session::pull('order');
			 
			return redirect(url('/order/next-step3?'.http_build_query($data)));
		}

        $data['title']   = 'Halaman User Account';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.account', compact('data'));
    }
	
	public function bantuan()
    {
		
		

        $data['title']   = 'Halaman Bantuan';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.bantuan', compact('data'));
    }
	
	
}
