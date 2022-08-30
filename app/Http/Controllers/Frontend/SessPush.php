<?php

namespace App\Http\Controllers\FrontEnd;


use Illuminate\Http\Request;
use Session;

use App\Http\Controllers\Controller as Controller;


class SessPush extends Controller
{

	public function index(request  $request)
	{
		$data = $request->all();
		 
		Session::forget('order');
		Session::flush();
		Session::put('order', $data);
		
		$response = [
            'success' => true,
            'message' => 'Your request has been saved',
        ];
		return response()->json($response, 201);
	}

	
}
