<?php

namespace App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Kategori as model_kategori;
use App\Http\Resources\Frontend\KategoriCollection as colection_kategori;
use App\Http\Resources\Frontend\NewsCollection as colection_news;

class Kategori extends Controller
{
	public function index(Request $request){
		
		$render		= $request->input('render'); if ($render == 'sidebar'){$limit = 6; } else {$limit = 20;};	
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		$columns	= "id";

		$data 	= model_kategori::where('status', 'publish')
					->orderBy($columns, $sort)
					->paginate($limit);
		 
		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_kategori::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}
	

	
}
