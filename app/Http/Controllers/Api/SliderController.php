<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Slider as slider_model;
use App\Http\Controllers\Api\Api as Controller;
use App\Http\Resources\SliderResource as slider_collection;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data     = slider_model::orderBy('id', 'DESC')
            ->offset(0)
            ->limit(10)
            ->get();
        $result = slider_collection::collection($data);
        $total  = slider_model::count();
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
            'img'   => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $originalImage = $request->file('img');
        $Image         = Image::make($originalImage);
        $originalPath  = public_path('/assets/images/slider/');
        $time          = time();

        if (!is_dir($originalPath)) {
            mkdir($originalPath, 0755, true);
        }

        $Image->save($originalPath . $time . $originalImage->getClientOriginalName());

        Slider::create([
            'title' => $request->title,
            'link'  => $request->link,
            'img'   => $time . $originalImage->getClientOriginalName(),
        ]);

        return $this->sendResponseCreate(json_encode($request));
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
        $data = slider_model::find($id);

        $originalPath  = public_path('/assets/images/slider/');
        $image_path    = $originalPath . $data->img;

        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        $data->delete();

        return $this->sendResponseDelete($data);
    }
}
