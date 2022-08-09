<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Api as Controller;
use App\Models\Admin\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required',
            'message'   => 'required'
        ]);

        if ($validateData->fails()) {
            return $this->sendError(json_encode($validateData->errors()), $validateData->errors());
        }

        $data = Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'subject'   => $request->subject,
            'message'   => $request->message
        ]);

        return $this->sendResponseCreate($data);
    }
}
