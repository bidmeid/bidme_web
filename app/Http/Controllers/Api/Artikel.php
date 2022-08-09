<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Artikel as model_artikel;
use App\Http\Resources\Artikel as collection_artikel;
use Validator;
use Illuminate\Support\Arr;
use Image;
use Illuminate\Support\Str;

class Artikel extends Controller
{
	//
	public function index(Request $request)
	{

		$kategori 	= $request->input('kategori');
		if ($kategori == '') {
			$kategori = 'IS NOT NULL';
		} else {
			$kategori = '= ' . $kategori;
		};
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
		$search		= isset($request->input('search')['value']);
		if ($search == '') {
			$search = '';
		};
		$order		= isset($request->input('order')[0]['column']);
		$sort 		= isset($request->input('order')[0]['dir']);
		if ($sort == '') {
			$sort = 'DESC';
		};
		$columns	= isset($request->input('columns')[$order]['data']);
		if ($columns == '') {
			$columns = 'id';
		} elseif ($columns == 'kategori') {
			$columns = 'kategori_id';
		};

		$data 	= model_artikel::with('kategori')
			->orderBy($columns, $sort)
			->whereRaw('Year(`created_at`)' . $year)
			->whereRaw('kategori_id ' . $kategori)
			->where('judul_artikel', 'like', '%' . $search . '%')
			->offset($offset)
			->limit($limit)
			->get();

		$total  = model_artikel::where('judul_artikel', 'like', '%' . $search . '%')
			->whereRaw('Year(`created_at`) ' . $year)
			->whereRaw('kategori_id ' . $kategori)
			->count();

		$result['draw']           = $draw;
		$result['recordsTotal']   = $total;
		$result['recordsFiltered'] = $total;
		$result['data'] = collection_artikel::collection($data);

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
			'judul' => 'required',
			'idkat' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()));
		}
		if ($request->file('userfile')) {
			$originalImage  = $request->file('userfile');
			$thumbnailImage = Image::make($originalImage);
			$thumbnailPath  = public_path('/assets/images/artikel/thumb_');
			$originalPath   = public_path('/assets/images/artikel/');
			$time = time();

			if (!is_dir($originalPath)) {
				mkdir($originalPath, 0755, true);
			}

			$thumbnailImage->save($originalPath . $time . $originalImage->getClientOriginalName());
			$thumbnailImage->resize(400, 270);
			$thumbnailImage->save($thumbnailPath . $time . $originalImage->getClientOriginalName());
			$image	= $time . $originalImage->getClientOriginalName();
		} else {
			$image 	= "";
		}

		$input          = model_artikel::create([
			'user_id'       => 0,
			'slug'          => Str::slug($request->judul, "-"),
			'judul_artikel' => $request->judul,
			'kategori_id'   => $request->idkat,
			'tag'           => $request->tags,
			'isi_artikel'   => $request->isi_artikel,
			'metakey'       => $request->metakey,
			'metadesc'      => $request->metadesc,
			'utama'         => $request->utama,
			'tanggal'       => $request->tanggal,
			'caption'       => $request->caption,
			'parent'        => 0,
			'img'           => $image,
		]);

		return $this->sendResponseCreate($input);
	}

	public function update(request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'judul' => 'required',
			'idkat' => 'required',

		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()));
		}
		if ($request->file('userfile')) {
			$result = model_artikel::find($id);


			$originalImage  = $request->file('userfile');
			$thumbnailImage = Image::make($originalImage);
			$time           = time();

			$thumbnailPath  = public_path('/assets/images/artikel/thumb_');
			$originalPath   = public_path('/assets/images/artikel/');

			$image_path     = $originalPath . $result->img;

			if (file_exists($image_path)) {
				@unlink($image_path);
				@unlink($thumbnailPath . $result->img);
			}

			$thumbnailImage->save($originalPath . $time . $originalImage->getClientOriginalName());
			$thumbnailImage->resize(400, 270);
			$thumbnailImage->save($thumbnailPath . $time . $originalImage->getClientOriginalName());
			$image = $time . $originalImage->getClientOriginalName();
		} else {
			$image = $request->img;
		}
		$input = model_artikel::where('id', $id)->update([
			'user_id'       => 0,
			'slug'          => Str::slug($request->judul, "-"),
			'judul_artikel' => $request->judul,
			'kategori_id'   => $request->idkat,
			'tag'           => $request->tags,
			'isi_artikel'   => $request->isi_artikel,
			'metakey'       => $request->metakey,
			'metadesc'      => $request->metadesc,
			'utama'         => $request->utama,
			'tanggal'       => $request->tanggal,
			'caption'       => $request->caption,
			'parent'        => 0,
			'img'           => $image,
		]);
		return $this->sendResponseUpdate(null);
	}

	public function delete($id)
	{
		$data = model_artikel::find($id);

		$originalPath  = public_path('/assets/images/artikel/');
		$thumbnailPath = public_path('/assets/images/artikel/thumb_');
		$image_path    = $originalPath . $data->img;
		$image_thumb   = $thumbnailPath . $data->img;

		$thumbnailPath  = public_path('/assets/images/artikel/thumb_');
		$originalPath   = public_path('/assets/images/artikel/');

		if (!is_dir($originalPath)) {
			mkdir($originalPath, 0755, true);
		}

		if (file_exists($image_path)) {
			@unlink($image_path);
			@unlink($image_thumb);
		}

		$data->delete();

		return $this->sendResponseDelete($data);
	}

	public function List_all()
	{
		$result['data'] = model_artikel::orderBy('id')->get();
		return $result;
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
		$originalPath   = public_path('/assets/images/artikel/');
		$time = time();

		if (!is_dir($originalPath)) {
			mkdir($originalPath, 0755, true);
		}

		$thumbnailImage->save($originalPath . $time . $originalImage->getClientOriginalName());
		$result['image'] = url('/assets/images/artikel/' . $time . $originalImage->getClientOriginalName());

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


		$originalPath   = public_path('/assets/images/artikel/');

		$image_path     = $originalPath . $request->file;
		if (file_exists($image_path)) {
			@unlink($image_path);
		}

		return $this->sendResponseOk(null);
	}
}
