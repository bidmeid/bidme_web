<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

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
        return view('frontend.order.step1');
    }

    public function orderStep2()
    {
        return view('frontend.order.step2');
    }

    public function orderStep3()
    {
        return view('frontend.order.step3');
    }


    public function faq()
    {
        return view('frontend.pages.faq');
    }
}
