<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Page;
use App\Models\Admin\Category;
use App\Models\Menu as menu_model;
use App\Http\Resources\PageMenuResource;
use App\Http\Resources\CategoryMenuResource;
use App\Http\Controllers\Api\Api as Controller;

class AllMenuController extends Controller
{
    public function index()
    {
        $result['data'] = menu_model::get();
        return $this->sendResponseOk($result);
    }

    public function store()
    {
        $result['pages'] =  PageMenuResource::collection(Page::get());
        $result['categories'] =  CategoryMenuResource::collection(Category::get());
        return $this->sendResponseOk($result);
    }
}
