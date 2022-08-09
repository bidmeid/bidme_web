<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Tag as tag_model;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function tags()
    {
        $result['data'] = tag_model::get();
        return $this->sendResponseOk($result);
    }
}
