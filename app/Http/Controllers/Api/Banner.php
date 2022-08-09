<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Banner as model_banner;
use App\Http\Resources\Banner as collection_banner;
use Validator;
use Illuminate\Support\Arr;
use Image;

class Banner extends Controller
{
    //
	public function index(Request $request){
		$draw 		= $request->input('draw');
		$offset		= $request->input('start'); if ($offset == ''){$offset = 0; };
		$limit		= $request->input('length'); if ($limit == ''){$limit = 25; };
		$search		= $request->input('search')['value']; if ($search == ''){$search = ''; };		
		$order		= $request->input('order')[0]['column']; 
		$sort 		= $request->input('order')[0]['dir']; if ($sort == ''){$sort = 'DESC'; };
		$columns	= $request->input('columns')[$order]['data'];  if ($columns == ''){$columns = 'id'; }elseif($columns == 'posisi'){$columns = 'id'; };

		$data 	= model_banner::orderBy($columns, $sort)
					->where('posisi', 'like', '%'.$search.'%')
					->offset($offset)
					->limit($limit)
					->get();
					
		$total  = model_banner::where('link', 'like', '%'.$search.'%')
					->count();
		
		$result['draw']           = $draw ;
		$result['recordsTotal']   = $total;
		$result['recordsFiltered']= $total;
		$result['data'] = collection_banner::collection($data);
		
		return  $this->sendResponseOk($result);
	}
	
	public function view($id){
		
		$result          = model_banner::find($id);
		$result->url_img = url('/assets/images/bannerads/').'/'.$result->img;
		
		if (is_null($result)) {
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendError($message);
		}

		return $this->sendResponseOk($result);

	}
	
	public function create(request $request){
		
        $validator = Validator::make($request->all(), [
			'posisi' => 'required',
			 
       
        ]);
        if($request->link){$request->link = $request->link;}else{$request->link ='';};
        if($request->keterangan){$request->keterangan = $request->keterangan;}else{$request->keterangan ='';};
        if($validator->fails()){
            return $this->sendError(json_encode($validator->errors()), $validator->errors());       
        }
		
		$originalImage  = $request->file('userfile');
		$thumbnailImage = Image::make($originalImage);
		$originalPath   = public_path('/assets/images/bannerads/');
		$time = time();

		if(!is_dir($originalPath)) {
			mkdir($originalPath, 0755, true);
		}

        $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());

		
		$input          = model_banner::create([
			'posisi'     => $request->posisi,
			'link'       => $request->link,
			'keterangan' => $request->keterangan,
			'img'        => $time.$originalImage->getClientOriginalName(),
			'status'     => $request->status,
		]);
	  
		return $this->sendResponseCreate($input);
	}
	
	public function update(request $request, $id){
		
		$validator = Validator::make($request->all(), [
            'posisi' => 'required',
             
        ]);

        if($validator->fails()){
            return $this->sendError(json_encode($validator->errors()), $validator->errors());       
        }
		if($request->file('userfile')){
		$result = model_banner::find($id);
		
		
		$originalImage  = $request->file('userfile');
		$thumbnailImage = Image::make($originalImage);
		$time           = time();

		$originalPath   = public_path('/assets/images/bannerads/');
		$image_path     = $originalPath.$result->img;
		if(file_exists($image_path)) {
			@unlink($image_path);

		}
		
        $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());

		$image = $time.$originalImage->getClientOriginalName();
		}else{
			$image = $request->img;
		}		
		$input = model_banner::where('id', $id)->update([
			'posisi'     => $request->posisi,
			'link'       => $request->link,
			'keterangan' => $request->keterangan,
			'img'        => $image,
			'status'     => $request->status,
		]);
		return $this->sendResponseUpdate(null);
	}
	
	public function delete($id){
		$data = model_banner::where('id', $id)->first();

		$originalPath  = base_path('/assets/images/bannerads/');
		$image_path    = $originalPath.$data->img;

		if(file_exists($image_path)) {
			@unlink($image_path);
		}
		
		$data->delete();
		 
		return $this->sendResponseDelete($data);
	}
		
}
