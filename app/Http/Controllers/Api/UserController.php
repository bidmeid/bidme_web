<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User as user_model;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Api as Controller;
use App\Http\Resources\UserResource as user_collection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data     = user_model::get();
        $total    = user_model::count();

        $result['recordsTotal']       = $total;
        $result['recordsFiltered']    = $total;
        $result['data']               = $data;
        $result['data']               = user_collection::collection($data);

        return $this->sendResponseOk($result);
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
            'name'      => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()), $validator->errors());
        }

        $input = user_model::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'email'     => $request->email,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'isAdmin'   => $request->isAdmin,
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
        $result = user_model::find($id);
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
        $data = user_model::where('id', $id);
        $data->delete();
        return $this->sendResponseDelete($data);
    }
}
