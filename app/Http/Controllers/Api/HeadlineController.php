<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\HeadlineResource as collection_headline;
use App\Models\Admin\Headline as model_headline;
use App\Http\Controllers\Api\Api as Controller;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year         = $request->input('year');
        if ($year == '') {
            $year = 'IS NOT NULL';
        } else {
            $year = '= ' . $year;
        };
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
        };
        $headlineVal = 1;

        $data     = model_headline::with('categories')
            ->orderBy($columns, $sort)
            ->whereRaw('Year(`created_at`)' . $year)
            ->where('judul_artikel', 'like', '%' . $search . '%')
            ->where('headlines', '=', $headlineVal)
            ->offset($offset)
            ->limit($limit)
            ->get();

        $total  = model_headline::where('judul_artikel', 'like', '%' . $search . '%')
            ->whereRaw('Year(`created_at`) ' . $year)
            ->where('headlines', '=', $headlineVal)
            ->count();

        $result['draw']           = $draw;
        $result['recordsTotal']   = $total;
        $result['recordsFiltered'] = $total;
        $result['data'] = collection_headline::collection($data);
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
        //
    }
}
