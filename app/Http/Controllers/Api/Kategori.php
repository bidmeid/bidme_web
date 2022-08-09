<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Api as Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kategori as model_kategori;
use Validator;

class Kategori extends Controller
{
	public function index(Request $request)
	{

		$draw   = $request->input('draw');
		$offset = $request->input('start');
		if ($offset == '') {
			$offset = 0;
		};
		$limit  = $request->input('length');
		if ($limit == '') {
			$limit = 25;
		};
		$search = $request->input('search')['value'];
		if ($search == '') {
			$search = '';
		};
		$order  = $request->input('order')[0]['column'];
		$sort   = $request->input('order')[0]['dir'];
		if ($sort == '') {
			$sort = 'DESC';
		};
		$columns = $request->input('columns')[$order]['data'];
		if ($columns == '') {
			$columns = 'id';
		};

		$data 	= model_kategori::orderBy($columns, $sort)
			->where('kategori', 'like', '%' . $search . '%')
			->offset($offset)
			->limit($limit)
			->get();

		$total  = model_kategori::where('kategori', 'like', '%' . $search . '%')
			->count();

		$result['draw']           = $draw;
		$result['recordsTotal']   = $total;
		$result['recordsFiltered'] = $total;
		$result['data']           =	$data;

		return  $this->sendResponseOk($result);
	}

	public function create(request $request)
	{

		$validator = Validator::make($request->all(), [
			'kategori' => 'required',
			'status'  => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_kategori::create([
			'kategori' => $request->kategori,
			'status'  => $request->status,
		]);

		return $this->sendResponseCreate($input);
	}

	public function update(request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'kategori' => 'required',
			'status'   => 'required',

		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_kategori::where('id', $id)->update([
			'kategori' => $request->kategori,
			'status'  => $request->status,
		]);


		return $this->sendResponseUpdate(null);
	}

	public function view($id)
	{

		$result = model_kategori::find($id);
		if (is_null($result)) {
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}

		return $this->sendResponseOk($result);
	}

	public function delete($id)
	{
		$data = model_kategori::find($id);

		$data->delete();

		return $this->sendResponseDelete($data);
	}

	public function List_all()
	{
		$result['data'] = model_kategori::get();

		return  $this->sendResponseOk($result);
	}
}
