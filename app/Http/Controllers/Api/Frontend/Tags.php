<?php

namespace App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Tags as model_tags;


class Tags extends Controller
{
	public function index(Request $request){
		
		$render		= $request->input('render'); if ($render == 'sidebar'){$limit = 18; } else {$limit = 20;};	
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		$columns	= "id";

		$data 	= model_tags::orderBy($columns, $sort)
					->paginate($limit);
		 
		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = $data;
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}
	

	
}
