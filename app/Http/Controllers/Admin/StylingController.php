<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StylingController extends Controller
{
    public function index()
    {
        return view('backend.styling.index');
    }
}
