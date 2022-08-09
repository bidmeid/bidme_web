<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Pages as model_page;
use App\Http\Resources\Pages as collection_pages;
use Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Image;

class Pages extends Controller
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

		$data 	= model_page::orderBy($columns, $sort)
			->where('judul', 'like', '%' . $search . '%')
			->offset($offset)
			->limit($limit)
			->get();

		$total  = model_page::where('judul', 'like', '%' . $search . '%')
			->count();

		$result['draw']            = $draw;
		$result['recordsTotal']    = $total;
		$result['recordsFiltered'] = $total;
		$result['data']            = collection_pages::collection($data);

		return  $this->sendResponseOk($result);
	}

	public function view($id)
	{

		$result = model_page::find($id);

		if (is_null($result)) {
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}

		return $this->sendResponseOk($result);
	}

	public function create(request $request)
	{

		$validator = Validator::make($request->all(), [
			'judul'   => 'required',
			'content' => 'required',

		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_page::create([
			'judul'       => $request->judul,
			'slug'        => Str::slug($request->judul, "-"),
			'content'     => $request->content,
			'keyword'     => $request->keyword,
			'description' => $request->description,
			'status'      => $request->status,
		]);

		return $this->sendResponseCreate($input);
	}

	public function update(request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'judul'    => 'required',
			'content'  => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_page::where('id', $id)->update([
			'judul'       => $request->judul,
			'slug'        => Str::slug($request->judul, "-"),
			'content'     => $request->content,
			'keyword'     => $request->keyword,
			'description' => $request->description,
			'status'      => $request->status,
		]);
		return $this->sendResponseUpdate(null);
	}

	public function delete($id)
	{
		$data = model_page::find($id);

		$data->delete();

		return $this->sendResponseDelete($data);
	}

	public function upload(request $request)
	{

		$validator = Validator::make($request->all(), [
			'file' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()));
		}

		$originalImage  = $request->file('file');
		$thumbnailImage = Image::make($originalImage);
		$originalPath   = public_path('/assets/images/pages/');
		$time = time();

		if (!is_dir($originalPath)) {
			mkdir($originalPath, 0755, true);
		}

		$thumbnailImage->save($originalPath . $time . $originalImage->getClientOriginalName());
		$result['image'] = url('/assets/images/pages/' . $time . $originalImage->getClientOriginalName());

		return $this->sendResponseCreate($result);
	}

	public function unupload(request $request)
	{

		$validator = Validator::make($request->all(), [
			'file' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()));
		}


		$originalPath   = public_path('/assets/images/pages/');

		$image_path     = $originalPath . $request->file;
		if (file_exists($image_path)) {
			@unlink($image_path);
		}

		return $this->sendResponseOk(null);
	}
}
