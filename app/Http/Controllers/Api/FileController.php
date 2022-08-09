<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\File;
use Illuminate\Http\Request;
use App\Models\Admin\File as file_model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Api as Controller;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $draw         = $request->input('draw');
        $offset        = $request->input('start');
        if ($offset == '') {
            $offset = 0;
        };
        $limit        = $request->input('length');
        if ($limit == '') {
            $limit = 25;
        };
        $search        = $request->input('search')['value'];
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
        } elseif ($columns == 'kategori') {
            $columns = 'kategori_id';
        };

        $data     = file_model::orderBy($columns, $sort)
            ->where('title', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();

        $total  = file_model::where('file_name', 'like', '%' . $search . '%')
            ->count();

        $result['draw']            = $draw;
        $result['recordsTotal']    = $total;
        $result['recordsFiltered'] = $total;
        $result['data']            = $data;

        return  $this->sendResponseOk($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'title'       => 'required',
            'file_name'   => 'required|file|max:5000|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $uploadedFile = $request->file('file_name');
        $desPath      = $uploadedFile->store('assets/file');
        $filename     = basename($desPath);
        $extension    = pathinfo($desPath, PATHINFO_EXTENSION);

        $input = file_model::create([
            'title'        => $request->title,
            'description'  => $request->description,
            'file_name'    => $filename,
            'file_type'    => $extension,
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
        $result = file_model::where('id', $id)->first();
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
            'title'       => 'required',
            'file_name'   => 'file|max:5000|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }
        if ($request->file('file_name')) { //jika userfile ada maka

            $result = file_model::find($id); //cari file berdasarkan id

            $originalPath  = base_path('/assets/file/');
            $file_path     = $originalPath . $result->nama_file;

            if (file_exists($file_path)) {
                @unlink($file_path);
            }

            $uploadedFile = $request->file('old_file');
            $desPath      = $uploadedFile->store('assets/file/');
            $filename     = basename($desPath);
            $extension    = pathinfo($desPath, PATHINFO_EXTENSION);
        } else {

            $filename     = $request->old_file;
            $extension    = $request->file_type;
        }

        $input = file_model::where('id', $id)->update([
            'title'             => $request->title,
            'description'       => $request->description,
            'file_name'         => $filename,
            'file_type'         => $extension,
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
        $data = File::where('id', $id)->first();
        $data->delete();
        return $this->sendResponseDelete($data);
    }
}
