<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\User as model_user;
use App\Models\Instansi as model_instansi;
use App\Http\Resources\User as collection_user;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Arr;

class User extends Controller
{
    //
	public function index(){
		$data 	= model_user::get();

		$total  = model_user::count();
		
		$result['recordsTotal'] 	  = $total;
		$result['recordsFiltered']    = $total;
		$result['data'] 			  = $data;
		$result['data']               = collection_user::collection($data);
		
		return  $this->sendResponseOk($result);
	}
	
	public function view($id){
		$result = model_user::find($id);
		if (is_null($result)) {
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendError($message);
		}
		return $this->sendResponseOk($result);
	}
	
	public function create(request $request){
		
        $validator = Validator::make($request->all(), [
			'username' => 'required',
			'name' => 'required',
			'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError(json_encode($validator->errors()), $validator->errors());       
        }
	
		$input = model_user::create([	
			'name' => $request->name,
			'username' => $request->username,
			'password' => Hash::make($request->password),
			'email' => $request->email,
			'address' => $request->address,
			'phone' => $request->phone,
			'hak_akses' => $request->priviledge,
		]);
	  
		return $this->sendResponseCreate($input);
	}
	
	public function update(request $request, $id){
		
		$validator = Validator::make($request->all(), [
            'username' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError(json_encode($validator->errors()), $validator->errors());       
        }

		if($request->password == ""){
			$password = $request->old_pw;
		} else {
			$password = Hash::make($request->password);
		}

		$input = model_user::where('id', $id)->update([
        	'username'=> $request->username,
			'name' => $request->name,
			'password' => $password,
			'email' => $request->email,
			'address' => $request->address,
			'phone' => $request->phone,
			'hak_akses' => $request->priviledge,
		]);
		
		return $this->sendResponseUpdate(null);
	}

	// public function delete($instansi, $id){
	// 	$data = model_user::where('instansi_id', $instansi)->find($id);

	// 	$data->delete();
		 
	// 	return $this->sendResponseDelete($data);
	// }

	public function delete($id){
		$data = model_user::where('id', $id);

		$data->delete();
		 
		return $this->sendResponseDelete($data);
	}
}
