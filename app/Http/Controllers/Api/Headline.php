<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Headline as model_headline;
use App\Http\Resources\Headlines as collection_headline;
use Validator;
use Illuminate\Support\Arr;
use Image;

class Headline extends Controller
{
	//
	public function index(Request $request)
	{
		$year 		= $request->input('year');
		if ($year == '') {
			$year = 'IS NOT NULL';
		} else {
			$year = '= ' . $year;
		};
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
		};
		$headlineVal = 1;

		$data 	= model_headline::with('kategori')
			->orderBy($columns, $sort)
			->whereRaw('Year(`created_at`)' . $year)
			->where('judul_artikel', 'like', '%' . $search . '%')
			->where('headlines', '=', $headlineVal)
			->offset($offset)
			->limit($limit)
			->get();

		$total  = model_headline::where('judul_artikel', 'like', '%' . $search . '%')
			->whereRaw('Year(`created_at`) ' . $year)
			->where('headlines', '=', $headlineVal)
			->count();

		$result['draw']           = $draw;
		$result['recordsTotal']   = $total;
		$result['recordsFiltered'] = $total;
		$result['data'] = collection_headline::collection($data);

		return  $this->sendResponseOk($result);
	}

	public function view($id)
	{

		$result          = model_artikel::find($id);
		$result->url_img = url('/assets/images/artikel/') . '/' . $result->img;

		if (is_null($result)) {
			$message 	= 'Your request couldn`t be found';
			return $this->sendError($message);
		}

		return $this->sendResponseOk($result);
	}

	public function create(request $request)
	{
		$validator = Validator::make($request->all(), [
			'id_artikel' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$input = model_headline::where('id', $request->id_artikel)->update([
			'headlines' => 1,
		]);
		return $this->sendResponseCreate(null);
	}

	public function update($id)
	{
		$input = model_headline::where('id', $id)->update([
			'headlines' => 0,
		]);
		return $this->sendResponseDelete($input);
	}

	public function list_modal()
	{
		$result = model_headline::where('headlines', '=', 0)->limit(20)->get();
		return  $this->sendResponseOk($result);
	}
}
