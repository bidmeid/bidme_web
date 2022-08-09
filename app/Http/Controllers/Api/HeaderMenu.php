<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\HeaderMenu as model_header;
use App\Models\Admin\Pages as model_page;
use App\Http\Resources\PagesMenu as collection_pages_menu;
use App\Models\Admin\Kategori as model_kategori;
use App\Http\Resources\KategoriMenu as collection_kategori_menu;
use App\Http\Resources\Menu as collection_menu;
use Validator;
use Illuminate\Support\Arr;

class HeaderMenu extends Controller
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

		$data 	= model_header::orderBy($columns, $sort)
			->where('nama_menu', 'like', '%' . $search . '%')
			->offset($offset)
			->limit($limit)
			->get();

		$total  = model_header::where('nama_menu', 'like', '%' . $search . '%')->count();

		$result['draw']            = $draw;
		$result['recordsTotal']    = $total;
		$result['recordsFiltered'] = $total;
		$result['data']            = collection_menu::collection($data);

		return  $this->sendResponseOk($result);
	}

	public function view($id)
	{
		$result = model_header::find($id);

		if (is_null($result)) {
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}
		return $this->sendResponseOk($result);
	}

	public function create(request $request)
	{

		$validator = Validator::make($request->all(), [
			'id_parent' => 'required',
			'nama_menu' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input          = model_header::create([
			'id_parent'  => $request->id_parent,
			'nama_menu'  => $request->nama_menu,
			'order_menu' => $request->order_menu,
			'link'       => $request->link,
			'status'     => $request->status,
		]);

		return $this->sendResponseCreate($input);
	}

	public function update(request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'nama_menu' => 'required',
			'id_parent' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_header::where('id', $id)->update([
			'nama_menu'  => $request->nama_menu,
			'order_menu' => $request->order_menu,
			'link'       => $request->link,
			'status'     => $request->status,
			'id_parent'  => $request->id_parent,
		]);
		return $this->sendResponseUpdate(null);
	}

	public function delete($id)
	{
		$data = model_header::where('id', $id)->first();

		$data->delete();

		return $this->sendResponseDelete($data);
	}

	public function list_all()
	{
		$result['data'] = model_header::get();

		return $this->sendResponseOk($result);
	}

	public function list_create()
	{
		$result['pages'] =  collection_pages_menu::collection(model_page::get());
		$result['kategori'] =  collection_kategori_menu::collection(model_kategori::get());

		return $this->sendResponseOk($result);
	}
}
