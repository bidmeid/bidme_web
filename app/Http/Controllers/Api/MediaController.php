<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Http\Resources\MediaResource;
use App\Models\Admin\Media as model_media;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search    = $request->input('keyword');
        if ($search == '') {
            $search = '';
        };

        $data     = model_media::where('title', 'like', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(20);

        $data->data = MediaResource::collection($data);
        $result = $data;
        return  $this->sendResponseOk($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $img = '';
        $source = '';
        if ($request->type == 'image') {
            $originalImage = $request->file('img');
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
            'type'        => $request->type,
            'title'       => $request->title,
            'img_title'   => $request->img_title,
            'img'         => $img,
            'source'      => $source,
        ]);

        return $this->sendResponseCreate(json_encode(null));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
