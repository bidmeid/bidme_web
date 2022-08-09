<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Tag as tag_model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Api as Controller;

class TagController extends Controller
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

        $data     = tag_model::orderBy($columns, $sort)
            ->where('tag_name', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();

        $total  = tag_model::where('tag_name', 'like', '%' . $search . '%')
            ->count();

        $result['draw']             = $draw;
        $result['recordsTotal']     = $total;
        $result['recordsFiltered']  = $total;
        $result['data']             = $data;

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
            'tag_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $input = tag_model::create([
            'tag_name' => $request->tag_name,
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
        $result = tag_model::find($id);

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
            'tag_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $input = tag_model::where('id', $id)->update([
            'tag_name'  => $request->tag_name,
            'slug'      => Str::slug($request->tag_name, "-"),
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
        $data = Tag::where('id', $id)->first();
        $data->delete();
        return $this->sendResponseDelete($data);
    }
}
