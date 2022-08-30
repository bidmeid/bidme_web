<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController as Controller;
use Illuminate\Http\Request;
use Session;
class LayananController extends Controller
{
    public function index()
    {
		
		if (Session::has('order')) {
			$data = Session::pull('order');
			 
			return redirect(url('/order/next-step3?'.http_build_query($data)));
		}

        $data['title']   = 'Layanan Berlangsung';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.layananBerlangsung', compact('data'));
    }
	
	 public function myOrder()
    {
		
		if (Session::has('order')) {
			$data = Session::pull('order');
			 
			return redirect(url('/order/next-step3?'.http_build_query($data)));
		}

        $data['title']   = 'Riwayat Pesanan';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.account', compact('data'));
    }
	
	
}