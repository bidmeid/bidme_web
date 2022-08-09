<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\InstansiSetting as model_instansi_setting;
use Validator;
use Illuminate\Support\Arr;
use Image;

class Styling extends Controller
{
    //
	public function index(){
	
	}
	
	public function view(){
		
		$result = model_instansi_setting::first();
		
		if (is_null($result)) {
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendError($message);
		}

		return $this->sendResponseOk($result);

	}
	
	public function update(request $request, $id){	
		$input = model_instansi_setting::where('id', $id)->update([
			$request->name => $request->value,
        ]);
		return $this->sendResponseUpdate(null);
	}
	
	public function updateMap(request $request){	

		$input = model_setting::update([
		'maps'       => $request->maps,
		]);
		return $this->sendResponseUpdate(null);
	}

	public function delete(){
		$data = model_page::all();

		$data->delete();
		 
		return $this->sendResponseDelete($data);
	}

	public function instansiSetting(){
		$result = model_instansi_setting::all();

		return  $this->sendResponseOk($result);
	}

	public function updateInstansiSetting(request $request, $instansi){
		if($request->file('userfile')){
			$result = model_instansi_setting::all();
			
			$originalImage  = $request->file('userfile');
			$imageFile      = Image::make($originalImage);
			$originalPath   = base_path('/assets/images/web/');
			$time           = time();
			$image_path     = $originalPath.$result->foto_kepala;

			if(file_exists($image_path)) {
				@unlink($image_path);
			}
		
	        $imageFile->save($originalPath.$time.$originalImage->getClientOriginalName());
	        $image = $time.$originalImage->getClientOriginalName();
		}else{
			$image = $request->oldfoto;
		}		

		$input = model_instansi_setting::update([
			'nama_kepala'      	=> $request->nama_kepala,
			'instansi'  		=> $request->instansi,
			'kabupaten' 		=> $request->kabupaten,
			'provinsi'    		=> $request->provinsi,
			'foto_kepala'       => $image,	
		]);
		return $this->sendResponseUpdate(null);
	}
		
}
