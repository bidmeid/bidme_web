<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\Bannerads;
use App\Http\Resources\AdsResource;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Api as Controller;

class BannerAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $draw           = $request->input('draw');
        $offset         = $request->input('start');
        if ($offset == '') {
            $offset = 0;
        };
        $limit          = $request->input('length');
        if ($limit == '') {
            $limit = 25;
        };
        $search         = $request->input('search')['value'];
        if ($search == '') {
            $search = '';
        };
        $order        = $request->input('order')[0]['column'];
        $sort         = $request->input('order')[0]['dir'];
        if ($sort == '') {
            $sort = 'DESC';
        };
        $columns    = $request->input('columns')[$order]['data'];
        if ($columns == '') {
            $columns = 'id';
        } elseif ($columns == 'posisi') {
            $columns = 'id';
        };

        $data     = Bannerads::orderBy($columns, $sort)
            ->where('posisi', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();

        $total  = Bannerads::where('link', 'like', '%' . $search . '%')
            ->count();

        $result['draw']           = $draw;
        $result['recordsTotal']   = $total;
        $result['recordsFiltered'] = $total;
        $result['data'] = AdsResource::collection($data);
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
            'posisi' => 'required',


        ]);
        if ($request->link) {
            $request->link = $request->link;
        } else {
            $request->link = '';
        };
        if ($request->keterangan) {
            $request->keterangan = $request->keterangan;
        } else {
            $request->keterangan = '';
        };
        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $originalImage  = $request->file('img');
        $thumbnailImage = Image::make($originalImage);
        $originalPath   = public_path('/assets/images/bannerads/');
        $time = time();

        if (!is_dir($originalPath)) {
            mkdir($originalPath, 0755, true);
        }

        $thumbnailImage->save($originalPath . $time . $originalImage->getClientOriginalName());


        $input           = Bannerads::create([
            'posisi'     => $request->posisi,
            'link'       => $request->link,
            'keterangan' => $request->keterangan,
            'img'        => $time . $originalImage->getClientOriginalName(),
            'status'     => $request->status,
        ]);

        return $this->sendResponseCreate($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result          = Bannerads::find($id);
        $result->url_img = url('/assets/images/bannerads/') . '/' . $result->img;

        if (is_null($result)) {
            $message     = 'Your request couldn`t be found';
            return $this->sendError($message);
        }

        return $this->sendResponseOk($result);
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
        $validator = Validator::make($request->all(), [
            'posisi' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }
        if ($request->file('userfile')) {
            $result = Bannerads::find($id);

            $originalImage  = $request->file('userfile');
            $thumbnailImage = Image::make($originalImage);
            $time           = time();

            $originalPath   = public_path('/assets/images/bannerads/');
            $image_path     = $originalPath . $result->img;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            $thumbnailImage->save($originalPath . $time . $originalImage->getClientOriginalName());

            $image = $time . $originalImage->getClientOriginalName();
        } else {
            $image = $request->img;
        }

        Bannerads::where('id', $id)->update([
            'posisi'     => $request->posisi,
            'link'       => $request->link,
            'keterangan' => $request->keterangan,
            'img'        => $image,
            'status'     => $request->status,
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
        $data = Bannerads::where('id', $id)->first();
        $data->delete();
        return $this->sendResponseDelete($data);
    }
}
