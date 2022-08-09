<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Upload as model_upload;
use Validator;
use Illuminate\Support\Arr;
use Image;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Storage;
use File;

class Upload extends Controller
{
	//
	public function index(Request $request)
	{
		$draw 		= $request->input('draw');
		$offset		= $request->input('start');
		if ($offset == '') {
			$offset = 0;
		};
		$limit		= $request->input('length');
		if ($limit == '') {
			$limit = 25;
		};
		$search		= $request->input('search')['value'];
		if ($search == '') {
			$search = '';
		};
		$order		= $request->input('order')[0]['column'];
		$sort 		= $request->input('order')[0]['dir'];
		if ($sort == '') {
			$sort = 'DESC';
		};
		$columns	= $request->input('columns')[$order]['data'];
		if ($columns == '') {
			$columns = 'id';
		} elseif ($columns == 'kategori') {
			$columns = 'kategori_id';
		};

		$data 	= model_upload::orderBy($columns, $sort)
			->where('judul_file', 'like', '%' . $search . '%')
			->offset($offset)
			->limit($limit)
			->get();

		$total  = model_upload::where('nama_file', 'like', '%' . $search . '%')
			->count();

		$result['draw']            = $draw;
		$result['recordsTotal']    = $total;
		$result['recordsFiltered'] = $total;
		$result['data']            = $data;

		return  $this->sendResponseOk($result);
	}

	public function view($id)
	{

		$result = model_upload::where('id', $id)->first();

		if (is_null($result)) {
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}

		return $this->sendResponseOk($result);
	}

	public function upload(request $request)
	{

		$validator = Validator::make($request->all(), [
			'judul_file' => 'required',
			'userfile'   => 'required|file|max:5000|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$uploadedFile = $request->file('userfile');
		$desPath      = $uploadedFile->store('assets/file');
		$filename     = basename($desPath);
		$extension 	  = pathinfo($desPath, PATHINFO_EXTENSION);

		$input = model_upload::create([
			'judul_file' => $request->judul_file,
			'deskripsi_file' => $request->deskripsi_file,
			'nama_file'  => $filename,
			'type_file'  => $extension,
		]);

		return $this->sendResponseCreate($input);
	}

	public function update(request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'judul_file' => 'required',
			'userfile'   => 'file|max:5000|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}
		if ($request->file('userfile')) { //jika userfile ada maka

			$result = model_upload::find($id); //cari file berdasarkan id

			$originalPath  = base_path('/assets/file/');
			$file_path     = $originalPath . $result->nama_file;

			if (file_exists($file_path)) {
				@unlink($file_path);
			}

			$uploadedFile = $request->file('userfile');
			$desPath      = $uploadedFile->store('assets/file/');
			$filename     = basename($desPath);
			$extension 	  = pathinfo($desPath, PATHINFO_EXTENSION);
		} else {

			$filename 	= $request->oldfile;
			$extension	= $request->type_file;
		}

		$input = model_upload::where('id', $id)->update([
			'judul_file' => $request->judul_file,
			'deskripsi_file' => $request->deskripsi_file,
			'nama_file'  => $filename,
			'type_file'  => $extension,
		]);
		return $this->sendResponseUpdate(null);
	}

	public function delete($id)
	{
		$data = model_upload::find($id);

		$originalPath = base_path('/assets/file/');
		$file_path    = $originalPath . $data->nama_file;

		if (file_exists($file_path)) {
			@unlink($file_path);
		}

		$data->delete();
		return $this->sendResponseDelete($data);
	}

	public function open($id)
	{
		$data = model_upload::find($id);

		$result['data'] = url('/assets/file/' . $data->nama_file);
		//get in the url file into array $results[] with 'data' name

		return  $this->sendResponseOk($result);
	}
}
