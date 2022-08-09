<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Setting as model_setting;
use App\Models\Admin\InstansiSetting as model_instansi_setting;
use Validator;
use Illuminate\Support\Arr;
use Image;

class Setting extends Controller
{
    //
	public function index(){
		$result = model_setting::first();

		if (!is_null($result->logo)) {
			$result->logo = url('/assets/images/web/').'/'.$result->logo;
		}

		return  $this->sendResponseOk($result);
	}
	
	public function view($id){
		$result = model_page::where('id', $id)->first();
		
		if (is_null($result)) {
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendError($message);
		}

		return $this->sendResponseOk($result);
	}
	
	public function update(request $request, $id){
		$result = model_setting::where('id', $id)->first();
		if($request->file('userfile')){
			
			
			$originalImage  = $request->file('userfile');
			$imageFile      = Image::make($originalImage);
			$originalPath   = base_path('/assets/images/web/');
			$time           = time();
			$image_path     = $originalPath.$result->logo;

			if(!is_dir($originalPath)) {
				mkdir($originalPath, 0755, true);
			}
			
			if(file_exists($image_path)) {
				@unlink($image_path);
			}
		
	        $imageFile->save($originalPath.$time.$originalImage->getClientOriginalName());
	        $image = $time.$originalImage->getClientOriginalName();
		}else{
			$image = $result->logo;
		}		

		$input = model_setting::where('id', $id)->update([
			'judul'      => $request->judul,
			'deskripsi'  => $request->deskripsi,
			'googlecode' => $request->googlecode,
			'metatag'    => $request->metatag,
			'metadesc'   => $request->metadesc,
			'metakey'    => $request->metakey,
			'footer'     => $request->footer,
			'alamat'     => $request->alamat,
			'telp'       => $request->telp,
			'telp2'      => $request->telp2,
			'email'      => $request->email,
			'logo'       => $image,	
			'fb'         => $request->fb,
			'twitter'    => $request->twitter,
			'linked'     => $request->linked,
			'google'     => $request->google,
			'youtube'    => $request->youtube,
		]);
		return $this->sendResponseUpdate(null);
	}
	
	public function updateMap(request $request, $id){	

		$input = model_setting::where('id', $id)->update([
		'maps'       => $request->maps,
		]);
		return $this->sendResponseUpdate(null);
	}

	public function instansiSetting(){
		$result = model_instansi_setting::firstOrFail();

		return  $this->sendResponseOk($result);
	}

	public function updateInstansiSetting(request $request, $id){
		if($request->file('userfile')){
			$result = model_instansi_setting::firstOrFail();
			
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

		$input = model_instansi_setting::where('id', $id)->update([
			'nama_kepala'      	=> $request->nama_kepala,
			'kabupaten' 		=> $request->kabupaten,
			'provinsi'    		=> $request->provinsi,
			'foto_kepala'       => $image,	
		]);
		return $this->sendResponseUpdate(null);
	}
		
}
