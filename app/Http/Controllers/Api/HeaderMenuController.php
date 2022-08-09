<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Api as Controller;
use App\Http\Resources\HeaderMenuResource;

class HeaderMenuController extends Controller
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

        $data     = Menu::orderBy($columns, $sort)
            ->where('nama_menu', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();

        $total  = Menu::where('nama_menu', 'like', '%' . $search . '%')->count();

        $result['draw']            = $draw;
        $result['recordsTotal']    = $total;
        $result['recordsFiltered'] = $total;
        $result['data']            = HeaderMenuResource::collection($data);

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
            'id_parent' => 'required',
            'nama_menu' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $input           = Menu::create([
            'id_parent'  => $request->id_parent,
            'nama_menu'  => $request->nama_menu,
            'order_menu' => $request->order_menu,
            'link'       => $request->link,
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
        $data = Menu::find($id);
        if (is_null($data)) {
            $message     = 'Your request couldn`t be found';
            return $this->sendError($message);
        }
        return $this->sendResponseOk($data);
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
            'nama_menu' => 'required',
            'id_parent' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        Menu::where('id', $id)->update([
            'nama_menu'  => $request->nama_menu,
            'order_menu' => $request->order_menu,
            'link'       => $request->link,
            'status'     => $request->status,
            'id_parent'  => $request->id_parent,
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
        $data = Menu::where('id', $id)->first();
        $data->delete();
        return $this->sendResponseDelete($data);
    }
}
