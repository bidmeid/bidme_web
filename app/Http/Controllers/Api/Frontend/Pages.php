<?php

namespace App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Pages as model_pages;
use App\Http\Resources\Frontend\PagesCollection as colection_pages;

class Pages extends Controller
{
	public function index(Request $request){
		
		$render		= $request->input('render'); if ($render == 'sidebar'){$limit = 6; } else {$limit = 20;};	
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'ASC'; };
		$columns	= "id";

		$data 	= model_pages::where('status', 'publish')
					->orderBy($columns, $sort)
					->paginate($limit);

		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_pages::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}

	public function View($slug){
		
		$result = model_pages::where('status', 'publish')->where('slug', 'like', '%'.$slug.'%')->first();
		
		if((is_null($result)) OR ($result->count() == 0)){
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return $this->sendResponseOk($result);
	}
	
	
}
