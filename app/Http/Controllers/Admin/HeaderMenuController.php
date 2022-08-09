<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HeaderMenuResource;
use App\Http\Controllers\Admin\AdminController as Controller;

class HeaderMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.header-menu.index', [
            'title' => 'List Header Menu'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.header-menu.create', [
            'title' => 'List Header Menu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id_parent'     => 'required',
            'nama_menu'     => 'required',
            'order_menu'    => 'required',
            'status'        => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors());
        }

        $menu = Menu::create([
            'id_parent'     => $request->id_parent,
            'nama_menu'     => $request->nama_menu,
            'order_menu'    => $request->order_menu,
            'link'          => $request->link,
            'status'        => $request->status
        ]);
        return response()->json(['Menu has been created.', new HeaderMenuResource($menu)]);
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
        return view('backend.header-menu.edit', [
            'id' =>  $id,
        ]);
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
        $menu = Menu::findOrfail($id);
        $validation = Validator::make($request->all(), [
            'id_parent'     => 'required',
            'nama_menu'     => 'required',
            'order_menu'    => 'required',
            'status'        => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors());
        }
        $validation['link'] = $request->link;
        $menu = Menu::where('id', $id)->update($validation);
        return response()->json(['Menu has been updated.', new HeaderMenuResource($menu)]);
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
