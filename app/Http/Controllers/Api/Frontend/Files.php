<?php

namespace App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Upload as model_files;
use App\Http\Resources\Frontend\FilesCollection as colection_files;

use Illuminate\Support\Arr;


class Files extends Controller
{

	public function index(Request $request){
		
		$type 		= $request->input('type'); if ($type == ''){$type = 'IS NOT NULL'; }else {$type = '= '.$type;};
		$search		= $request->input('keyword'); if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'sidebar'){$limit = 4; } else {$limit = 20;};		
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		$columns	= "id";

		$data 	= model_files::orderBy($columns, $sort)
					->whereRaw('type_file '.$type)
					->where('judul_file', 'like', '%'.$search.'%')
					->paginate($limit);

		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_files::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}

	public function Detail($id){
		
		$data = model_files::find($id);
		
		if((!is_null($data)) AND ($data->count() != 0)){
			$data->link_download = url('/assets/file/').'/'.$data->nama_file;
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message, 204);
		}
		
		return $this->sendResponseOk($result);

	}

}
