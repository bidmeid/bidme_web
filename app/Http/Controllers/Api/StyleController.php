<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Style as style_model;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index()
    {
        $result = style_model::first();
        if (is_null($result)) {
            $message     = 'Your request couldn`t be found';
            return $this->sendError($message);
        }
        return $this->sendResponseOk($result);
    }

    public function update(Request $request, $id)
    {
        style_model::where('id', $id)->update([
            $request->name => $request->value,
        ]);
        return $this->sendResponseUpdate(null);
    }
}
