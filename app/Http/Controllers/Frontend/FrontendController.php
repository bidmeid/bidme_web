<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\User\BaseController as Controller;

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
}
