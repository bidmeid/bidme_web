<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\User\BaseController  as Controller;

class PaymentController extends Controller
{
    public function index(request $request)
    {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required',
            'paymentMethod'  => 'required',
            'kupon'  => 'required',


        ]);

        if ($validator->fails()) {
            redirect(url('user/layanan'));
        }
        $client = new \GuzzleHttp\Client();
        $token = $_COOKIE['access_tokenku'];
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];

        try {
            $response = $client->request(
                'POST',
                env('APP_SERVER') . '/api/invoice',
                [
                    'headers' => $headers,
                    'form_params' => [
                        "orderId" => $request->orderId,
                        "paymentMethod" => $request->paymentMethod,
                        "kupon" => $request->kupon,
                    ]
                ]
            ); //request data dari url tersebut ke api/meta@index
        } catch (\GuzzleHttp\Exception\ClientException $e) {

            dd($e->getResponse());
        }

        $response = $response->getBody()->getContents(); //mengambil value dari $response yang berupa JSON
        $response = json_decode($response); //merubah $response menjadi array


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
                'order_id' => $response->data->invoice->noInvoice,
                'gross_amount' => $response->data->invoice->billing,
                'date' => $response->data->invoice->created_at,
            ),
            "item_details" =>  array(
                [
                    "id" => $response->data->invoice->orderId,
                    "price" => $response->data->invoice->billing,
                    "quantity" => 1,
                    "name" => $response->data->invoice->noInvoice
                ]
            ),
            'customer_details'  => array(
                'first_name'    =>  $response->data->user->name,
                'last_name'     =>  '',
                'email'         => $response->data->user->email,
                'phone'         => $response->data->user->no_telp,
            ),
        );


        $status = \Midtrans\Transaction::status($response->data->invoice->noInvoice);
        if ($status != false) {
            if ($status->status_code == 407) {
                return redirect('/user/notifikasi/pembayaran-gagal');
            } elseif ($status->status_code == 200) {
                return redirect('/user/notifikasi/pembayaran-sukses');
            } else {
                return redirect('/user/notifikasi/pembayaran-gagal');
            }
        }
        try {

            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (Exception) {

            throw new Exception("API Request Error unable to json_decode API response");
        }
        $data = array_merge($this->currentUser(), $params);


        return view('frontend.user.payment', [
            'snapToken' => $snapToken,
            'data'      => $data,
        ]);
    }
}
