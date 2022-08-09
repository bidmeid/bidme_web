<?php

namespace App\Http\Controllers\Api\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Artikel as model_artikel;
use App\Models\Admin\Kategori as model_kategori;
use App\Http\Resources\Frontend\NewsCollection as colection_news;

use Illuminate\Support\Arr;


class News extends Controller
{

	public function index(Request $request){
	    $kategori ="Pengumuman";
		$id = model_kategori::where('kategori', 'like', strtolower($kategori))->firstOrFail();
		
		$headlines 	= 'IS NOT NULL';
		$type 		= $request->input('type'); if ($type == 'popular'){$columns = 'view'; }elseif($type == 'headlines'){$headlines = 1; $columns = 'tanggal';} else {$columns = 'tanggal';};
		$search		= $request->input('keyword'); if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'home'){$limit = 12; } elseif ($render == 'sidebar'){$limit = 5; } elseif ($render == 'footer'){$limit = 3; } elseif ($render == 'bottom'){$limit = 4; }else {$limit = 15;};		
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		 

		$data 	= model_artikel::with('kategori')
		            ->whereRaw('kategori_id !='. $id['id'])
					->where('headlines', $headlines)
					->where('judul_artikel', 'like', '%'.$search.'%')
					->orderBy($columns, $sort)
					->paginate($limit);
		 
		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_news::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}
	

	public function pemerintahan(Request $request){
		$type 		= $request->input('type'); if ($type == 'popular'){$columns = 'view'; }else {$columns = 'tanggal';};
		$search		= $request->input('keyword'); if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'pemerintahan'){$limit = 4; };		
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		
		$kategori = model_kategori::where('kategori', 'like', '%pemerintahan%')->where('status', 'publish')->first();

		if((!is_null($kategori)) AND ($kategori->count() != 0)){
			$kategori = $kategori->id;
		}else{
			$kategori = 0;
		}

		$data 	= model_artikel::with('kategori')
					->where('judul_artikel', 'like', '%'.$search.'%')
					->where('kategori_id', $kategori)
					->orderBy($columns, $sort)
					->paginate($limit);

		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_news::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}

	public function umum(Request $request){
		$type 		= $request->input('type'); if ($type == 'popular'){$columns = 'view'; }else {$columns = 'tanggal';};
		$search		= $request->input('keyword'); if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'home'){$limit = 4; };		
		$order		= $request->input('order'); 
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		
		$kategori = model_kategori::where('kategori', 'like', '%umum%')->where('status', 'publish')->first();

		if((!is_null($kategori)) AND ($kategori->count() != 0)){
			$kategori = $kategori->id;
		}else{
			$kategori = 0;
		}

		$data 	= model_artikel::with('kategori')
					->where('judul_artikel', 'like', '%'.$search.'%')
					->where('kategori_id', $kategori)
					->orderBy($columns, $sort)
					->paginate($limit);

		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_news::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}

	public function Read($id, $slug){
		
		$result = model_artikel::where('id', $id)->firstOrFail();
		
		if((is_null($result)) OR ($result->count() == 0)){
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		
		$result->url_img = url('/assets/images/artikel/'.$instansi).'/'.$result->img;
		return $this->sendResponseOk($result);

	}
	
	public function Kategori(Request $request, $kategori){
		$kategori = str_replace("-"," ",$kategori);
		$id = model_kategori::where('kategori', 'like', $kategori)->where('status', 'publish')->first();
		
		if((!is_null($id)) AND ($id->count() != 0)){
			
			$id = $id->id;
		}else{
			$id 	= 0;
			
		}
		$search		= $request->input('keyword'); if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'sidebar'){$limit = 6; } elseif ($render == 'bottom'){$limit = 4; } else {$limit = 10;};	
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		$columns	= "id";

		$data 	= model_artikel::with('kategori')
					->where('kategori_id', $id)
					->where('judul_artikel', 'like', '%'.$search.'%')
					->orderBy($columns, $sort)
					->paginate($limit);
		 
		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_news::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}
	
	public function Tag(Request $request, $tag){
		
		$search		= $request->input('keyword'); if ($search == ''){$search = ''; };
		$render		= $request->input('render'); if ($render == 'sidebar'){$limit = 6; } else {$limit = 10;};	
		$sort 		= $request->input('sort'); if ($sort == ''){$sort = 'DESC'; };
		$columns	= "id";

		$data 	= model_artikel::with('kategori')
					->where('tag', 'like', '%'.$tag.'%')
					->where('judul_artikel', 'like', '%'.$search.'%')
					->orderBy($columns, $sort)
					->paginate($limit);
		 
		if((!is_null($data)) AND ($data->count() != 0)){
			$data->data = colection_news::collection($data);
			$result = $data;
		}else{
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return  $this->sendResponseOk($result);
	}
	

	
}
