<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Category  as category_model;
use App\Http\Controllers\Api\Api as Controller;

class CategoryListController extends Controller
{
    public function categories()
    {
        $result['data'] = category_model::get();
        return  $this->sendResponseOk($result);
    }
}
