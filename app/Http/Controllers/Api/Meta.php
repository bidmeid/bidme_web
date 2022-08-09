<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Api as Controller;
use Illuminate\Http\Request;
use App\Models\Instansi as model_instansi;
use App\Models\InstansiSetting as model_instansi_setting;
use App\Models\Menu as model_menu;
use App\Models\Setting as model_setting;
use App\Models\Slider as model_slider;


class Meta extends Controller
{
    public function index(){
		
		if($client = request()->header('origin')){
		$instansi = model_instansi::firstOrFail();
		
		$instansi_setting = model_instansi_setting::firstOrFail();

		if((!is_null($instansi_setting)) AND ($instansi_setting->count() != 0)){
			
			if($instansi_setting->foto_kepala == null){
				$instansi_setting->foto_kepala = url('assets/images/web/user.jpg');
			}else{
			$instansi_setting->foto_kepala		= url('assets/images/web/'.$instansi_setting->foto_kepala);
			}
			
			if($instansi_setting->font == null){
				$instansi_setting->font 		= url('assets/frontend/css/skins/font-1.css');
			}else{
				$instansi_setting->font			= url('assets/frontend/css/skins/'.$instansi_setting->font);
			}
			
			if($instansi_setting->theme == null){
				$instansi_setting->theme = '';
			}else{
				$instansi_setting->theme		= $instansi_setting->theme;
			}
			
			if($instansi_setting->style == null){
				$instansi_setting->style = url('assets/frontend/css/skins/skin-5.css');
			}else{
				$instansi_setting->style		= url('assets/frontend/css/skins/'.$instansi_setting->style);
			}
			
			if($instansi_setting->preloader == null){
				$instansi_setting->preloader = url('assets/images/preloader/1.gif');
			}else{
				$instansi_setting->preloader		= url('assets/images/preloader/'.$instansi_setting->preloader);
			}
			
			if($instansi_setting->bg == null){
				$instansi_setting->bg = '/';
			}else{
			$instansi_setting->bg				= url('assets/frontend/css/skins/'.$instansi_setting->bg);
			}
		}
		
		$menu 								= model_menu::get(); 
		
		$setting 							= model_setting::firstOrFail();
		if((!is_null($setting)) AND ($setting->count() != 0)){
			if($setting->logo == null){
				$setting->logo						= url('assets/images/web/logo.png');
			}else{
				$setting->logo						= url('assets/images/web/'.$setting->logo);
			}
		}
		
		$result['instansi'] 		    = $instansi;
		$result['instansi_setting'] = $instansi_setting;
		$result['setting'] 			    = $setting;
		$result['menu'] 		      	= $menu;
		$result['client'] 			    = $client;
		
		
		return  $this->sendResponseOk($result);
		}else{
			$message 	= 'Require of origin';
			return $this->sendError($message);
		}
	} 
	public function slider(){
		$slider = model_slider::orderBy("id", "DESC")->get();
		foreach($slider as $key=>$val){
			if($val['img']){
			$slider[$key]['img']		= url('assets/images/slider/'.$val['img']);
			}else{
			$slider[$key]['img']		= url('assets/images/slider/slider-1.jpg');	
			}
		}
		
		$result['slider'] 			= $slider;
		
		
		return  $this->sendResponseOk($result);
	} 
	
	
}
