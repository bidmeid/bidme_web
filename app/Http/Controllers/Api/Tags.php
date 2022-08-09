<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Tags as model_tags;
use Validator;
use Illuminate\Support\Arr;
use Image;
use Illuminate\Support\Str;

class Tags extends Controller
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

		$data 	= model_tags::orderBy($columns, $sort)
			->where('nama_tag', 'like', '%' . $search . '%')
			->offset($offset)
			->limit($limit)
			->get();

		$total  = model_tags::where('nama_tag', 'like', '%' . $search . '%')
			->count();

		$result['draw'] 			= $draw;
		$result['recordsTotal'] 	= $total;
		$result['recordsFiltered'] 	= $total;
		$result['data'] 			= $data;

		return  $this->sendResponseOk($result);
	}

	public function view($id)
	{

		$result = model_tags::find($id);

		if (is_null($result)) {
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}

		return $this->sendResponseOk($result);
	}

	public function create(request $request)
	{

		$validator = Validator::make($request->all(), [
			'nama_tag' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_tags::create([
			'nama_tag' => $request->nama_tag,
			'tag_seo' => Str::slug($request->nama_tag, "-"),
		]);

		return $this->sendResponseCreate($input);
	}

	public function update(request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'nama_tag' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_tags::where('id', $id)->update([
			'nama_tag' => $request->nama_tag,
			'tag_seo' => Str::slug($request->nama_tag, "-"),
		]);


		return $this->sendResponseUpdate(null);
	}

	public function delete($id)
	{
		$data = model_tags::find($id);

		$data->delete();

		return $this->sendResponseDelete($data);
	}

	public function list_all()
	{
		$result['data'] = model_tags::get();

		return $this->sendResponseOk($result);
	}
}
