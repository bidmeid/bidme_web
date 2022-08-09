<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Media as model_media;
use App\Http\Resources\Media as collection_media;
use Validator;
use Illuminate\Support\Arr;
use Image;

class Media extends Controller
{
	//
	public function index(Request $request)
	{
		$search	= $request->input('keyword');
		if ($search == '') {
			$search = '';
		};

		$data 	= model_media::where('judul_media', 'like', '%' . $search . '%')
			->orderBy('id', 'DESC')
			->paginate(20);

		$data->data = collection_media::collection($data);
		$result = $data;
		return  $this->sendResponseOk($result);
	}


	public function upload(request $request)
	{
		$validator = Validator::make($request->all(), [
			'judul_media' => 'required',
			'type' => 'required'
		]);

		if ($validator->fails()) {
			return $this->sendError(json_encode($validator->errors()), $validator->errors());
		}

		$img = '';
		$source = '';
		if ($request->type == 'image') {
			$originalImage = $request->file('files');
			$Image         = Image::make($originalImage)->encode('jpg', 50);
			$originalPath  = public_path('assets/images/media/');
			$time          = time();

			if (!is_dir($originalPath)) {
				mkdir($originalPath, 0755, true);
			}

			$Image->save($originalPath . $time . $originalImage->getClientOriginalName());
			$img = $time . $originalImage->getClientOriginalName();
		} else if ($request->type == 'embed') {
			$source = $request->source;
		};

		$input = model_media::create([
			'type' 		  => $request->type,
			'judul_media' => $request->judul_media,
			'judul_img'   => $request->judul_img,
			'img'         => $img,
			'source'      => $source,
		]);

		return $this->sendResponseCreate(json_encode(null));
	}


	public function delete($id)
	{
		$data = model_media::find($id);

		$originalPath  = public_path('/assets/images/media/');
		$image_path    = $originalPath . $data->img;

		if (file_exists($image_path)) {
			@unlink($image_path);
		}

		$data->delete();

		return $this->sendResponseDelete($data);
	}
}
