<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function index()
    {
        $data['title']  = 'List Headlines';
        return view('backend.headline.index', compact('data'));
    }
}
