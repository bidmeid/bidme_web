<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController  as Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 0,
            ),
            "item_details" =>  array(
                [
                    "id" => "a01",
                    "price" => 50000,
                    "quantity" => 1,
                    "name" => "Towing 1"
                ]
            ),
            'customer_details'  => array(
                'first_name'    =>  'umaedi',
                'last_name'     =>  '',
                'email'         => 'admin@gmail.com',
                'phone'         => '085741492045',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $data = array_merge($this->currentUser());
        return view('backend.user.payment', [
            'snapToken' => $snapToken,
            'data'      => $data,
        ]);
    }
}
