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
		
 

        $data['title']   = 'Riwayat Pesanan';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.account', compact('data'));
    }
	
	 public function detail()
    {
		
 

        $data['title']   = 'Detail Pesanan';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.layananDetail', compact('data'));
    } 
	
	public function tracking()
    {
		
 

        $data['title']   = 'Tracking Layanan';
        $data = array_merge($this->currentUser(), $data);

        return view('frontend.user.tracking', compact('data'));
    }
	
	
}
