<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController as Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $data['title']   = 'Welcome to Dashboard!';
        // $data = array_merge($this->currentUser(), $data);
        return view('backend.dashboard.home', compact('data'));
    }
}
