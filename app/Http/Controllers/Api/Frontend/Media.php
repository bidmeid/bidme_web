<?php

namespace App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Media as model_media;
use App\Models\Admin\Banner as model_banner;
use App\Http\Resources\Frontend\MediaCollection as colection_media;

use Illuminate\Support\Arr;


class Media extends Controller
{

	public function index(Request $request){
		
		$type 		= $request->input('type'); if ($type == ''){$type = 'IS NOT NULL'; }else {$type = '= '.$type;};
		$search		= isset($request->input('search')['value']); if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'gallery'){$limit = 8; } else {$limit = 16;};		
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		$columns	= "id";

		$data 	= model_media::orderBy($columns, $sort)->paginate($limit);

		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_media::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}
	
	public function media(Request $request){
		
		$type 		= $request->input('type'); if ($type == ''){$type = 'IS NOT NULL'; }else {$type = '= '.$type;};
		$search		= $request->input('search')['value']; if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'gallery'){$limit = 8; } else {$limit = 16;};		
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		$columns	= "id";

		$data 	= model_media::orderBy($columns, $sort)->paginate($limit);

		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_media::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}
	

}
