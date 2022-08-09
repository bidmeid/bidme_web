<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Article as article_model;
use App\Models\Admin\Category as category_model;
use App\Models\Admin\Page as page_model;
use App\Models\Admin\Tag as tag_model;
use App\Models\Admin\File as file_model;


class Home extends Controller
{
	//
	public function index()
	{

		$result['artikel'] = article_model::count();
		$result['kategori'] = category_model::count();
		$result['pages'] = page_model::count();
		$result['tags'] = tag_model::count();
		$result['files'] = file_model::count();

		return  $this->sendResponseOk($result);
	}
}
