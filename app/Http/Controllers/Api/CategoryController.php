<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Category as category_model;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $draw   = $request->input('draw');
        $offset = $request->input('start');
        if ($offset == '') {
            $offset = 0;
        };
        $limit  = $request->input('length');
        if ($limit == '') {
            $limit = 25;
        };
        $search = $request->input('search')['value'];
        if ($search == '') {
            $search = '';
        };
        $order  = $request->input('order')[0]['column'];
        $sort   = $request->input('order')[0]['dir'];
        if ($sort == '') {
            $sort = 'DESC';
        };
        $columns = $request->input('columns')[$order]['data'];
        if ($columns == '') {
            $columns = 'id';
        };

        $data     = category_model::orderBy($columns, $sort)
            ->where('category', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();

        $total  = category_model::where('category', 'like', '%' . $search . '%')
            ->count();

        $result['draw']           = $draw;
        $result['recordsTotal']   = $total;
        $result['recordsFiltered'] = $total;
        $result['data']           =    $data;

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
            'category'  => 'required|unique:categories',
            'status'    => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $input = category_model::create([
            'category' => $request->category,
            'status'   => $request->status,
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
        $result = category_model::find($id);
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
            'category'  => 'required',
            'status'    => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        category_model::where('id', $id)->update([
            'category'  => $request->category,
            'status'    => $request->status,
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
        $data = category_model::where('id', $id)->first();
        $data->delete();
        return $this->sendResponseDelete($data);
    }
}
