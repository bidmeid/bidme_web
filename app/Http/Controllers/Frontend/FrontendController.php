<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\User\BaseController as Controller;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function dashboard()
    {
        return view('frontend.dashboard.index');
    }

    public function mitra()
    {
        return view('frontend.pages.mitra');
    }

    public function posts()
    {
        return view('frontend.posts.posts');
    }

    public function post()
    {
        return view('frontend.posts.show');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function orderStep1()
    {
        $data['title']   = 'Rincian Pesanan';
		if(isset($_COOKIE['access_tokenku'])){
        $data = array_merge($this->currentUser(), $data);
		}
		
		return view('frontend.order.step1', compact('data'));
    }

    public function orderStep2()
    {
        $data['title']   = 'Rincian Pesanan';
		if(isset($_COOKIE['access_tokenku'])){
        $data = array_merge($this->currentUser(), $data);
		}
		
		return view('frontend.order.step2', compact('data'));
    }

    public function orderStep3()
    {
        $data['title']   = 'Rincian Pesanan';
		if(isset($_COOKIE['access_tokenku'])){
        $data = array_merge($this->currentUser(), $data);
		}

		return view('frontend.order.step3', compact('data'));
    }


    public function faq()
    {
        return view('frontend.pages.faq');
    }
	
	public function test()
    {
        $dateOrder = "2022-10-13";
        $timeOrder = "07:19:59";
		
		$orderTime =  Carbon::parse($dateOrder.' '.$timeOrder);
		$now =  Carbon::now();
		
		$orderExpired = Carbon::parse($dateOrder.' '.$timeOrder)->addMinutes(5);
		
		$expireMin = $orderExpired->diff($orderTime)->format('%H:%I:%S');
		
		$diffInMinutes = $now->diffInMinutes($orderTime);
		
		echo $now;
		echo '<br>';
		echo $orderTime;
		echo '<br>';
		echo $orderExpired;
		echo '<br>';
		echo $expireMin;
		echo '<br>';
		echo $now->diff($orderTime)->format('%H:%I:%S');
		echo '<br>';
		echo $now->diffInMinutes($orderTime);
	
		if($diffInMinutes > 5){
			return false;
		} 
		
    }
}
