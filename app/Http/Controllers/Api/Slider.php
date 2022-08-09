<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Slider as model_slider;
use App\Http\Resources\Slider as collection_slider;
use Validator;
use Illuminate\Support\Arr;
use Image;

class Slider extends Controller
{
    //
	public function index(){

		$data 	= model_slider::orderBy('id', 'DESC')
					->offset(0)
					->limit(10)
					->get();
		$result = collection_slider::collection($data);
		$total  = model_slider::count();
		return  $this->sendResponseOk($result);
	}
	
	
	public function create(request $request){

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'file' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError(json_encode($validator->errors()), $validator->errors());       
        }
		
		$originalImage = $request->file('file');
		$Image         = Image::make($originalImage);
		$originalPath  = public_path('/assets/images/slider/');
		$time          = time();

		if(!is_dir($originalPath)) {
			mkdir($originalPath, 0755, true);
		}

		$Image->save($originalPath.$time.$originalImage->getClientOriginalName());
        
		$input = model_slider::create([
			'judul' => $request->judul,
			'link'  => $request->link,
			'img'   => $time.$originalImage->getClientOriginalName(),
		]);
	  
		return $this->sendResponseCreate(json_encode($request));
	}
	

	public function delete($id){
		$data = model_slider::find($id);

		$originalPath  = public_path('/assets/images/slider/');
		$image_path    = $originalPath.$data->img;

		if(file_exists($image_path)) {
			@unlink($image_path);
		}
		
		$data->delete();
		 
		return $this->sendResponseDelete($data);
	}

		
}
