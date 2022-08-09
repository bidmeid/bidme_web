<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Admin\Setting as setting_model;
use App\Http\Controllers\Api\Api as Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = setting_model::first();

        if (!is_null($result->logo)) {
            $result->logo = url('/assets/images/web/') . '/' . $result->logo;
        }

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
        //
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
        $result = setting_model::where('id', $id)->first();
        if ($request->file('userfile')) {


            $originalImage  = $request->file('userfile');
            $imageFile      = Image::make($originalImage);
            $originalPath   = base_path('/assets/images/web/');
            $time           = time();
            $image_path     = $originalPath . $result->logo;

            if (!is_dir($originalPath)) {
                mkdir($originalPath, 0755, true);
            }

            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            $imageFile->save($originalPath . $time . $originalImage->getClientOriginalName());
            $image = $time . $originalImage->getClientOriginalName();
        } else {
            $image = $result->logo;
        }

        setting_model::where('id', $id)->update([
            'judul'      => $request->judul,
            'deskripsi'  => $request->deskripsi,
            'googlecode' => $request->googlecode,
            'metatag'    => $request->metatag,
            'metadesc'   => $request->metadesc,
            'metakey'    => $request->metakey,
            'footer'     => $request->footer,
            'alamat'     => $request->alamat,
            'telp'       => $request->telp,
            'telp2'      => $request->telp2,
            'email'      => $request->email,
            'logo'       => $image,
            'fb'         => $request->fb,
            'twitter'    => $request->twitter,
            'linked'     => $request->linked,
            'google'     => $request->google,
            'youtube'    => $request->youtube,
        ]);
        return $this->sendResponseUpdate(null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
