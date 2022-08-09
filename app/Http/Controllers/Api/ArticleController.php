<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Article as article_model;
use App\Http\Controllers\Api\Api as Controller;
use App\Http\Resources\ArticleResource as article_collection;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category     = $request->input('kategori');
        if ($category == '') {
            $category = 'IS NOT NULL';
        } else {
            $category = '= ' . $category;
        };
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
        $search        = isset($request->input('search')['value']);
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
        } elseif ($columns == 'category') {
            $columns = 'category_id';
        };

        $data     = article_model::with('category')
            ->orderBy($columns, $sort)
            ->whereRaw('Year(`created_at`)' . $year)
            ->whereRaw('category_id ' . $category)
            ->where('title', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();

        $total  = article_model::where('title', 'like', '%' . $search . '%')
            ->whereRaw('Year(`created_at`) ' . $year)
            ->whereRaw('category_id ' . $category)
            ->count();

        $result['draw']           = $draw;
        $result['recordsTotal']   = $total;
        $result['recordsFiltered'] = $total;
        $result['data'] = article_collection::collection($data);

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
            'title'         => 'required',
            'category_id'   => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(json_encode($validator->errors()));
        }
        if ($request->file('img')) {
            $originalImage  = $request->file('img');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath  = public_path('/assets/images/artikel/thumb_');
            $originalPath   = public_path('/assets/images/artikel/');
            $time = time();

            if (!is_dir($originalPath)) {
                mkdir($originalPath, 0755, true);
            }

            $thumbnailImage->save($originalPath . $time . $originalImage->getClientOriginalName());
            $thumbnailImage->resize(400, 270);
            $thumbnailImage->save($thumbnailPath . $time . $originalImage->getClientOriginalName());
            $image    = $time . $originalImage->getClientOriginalName();
        } else {
            $image     = "";
        }

        $input              = article_model::create([
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'slug'          => Str::slug($request->title, "-"),
            'category_id'   => $request->category_id,
            'tag'           => $request->tag,
            'body'          => $request->body,
            'excerpt'       => Str::limit(strip_tags($request->body)),
            'metakey'       => $request->metakey,
            'metadesc'      => $request->metadesc,
            'main'          => $request->main,
            'date'          => $request->date,
            'caption'       => $request->caption,
            'parent'        => 0,
            'img'           => $image,
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
