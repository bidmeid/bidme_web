<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function currentUser()
    {
        $access = '';
        $serve = env('APP_URL');
        $client = new \GuzzleHttp\Client();
        $token = $_COOKIE['access_tokenku'];
        $headers = [
            'Origin' => url('/'),
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];

        try {
            $response = $client->request('GET', $serve . '/api/admin/user', ['headers' => $headers]); //request data dari url tersebut ke api/meta@index
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            abort(404, $e->getResponse()->getStatusCode());
        }

        $response = $response->getBody()->getContents(); //mengambil value dari $response yang berupa JSON
        $response = json_decode($response); //merubah $response menjadi array
        $access = $response->hak_akses;
        if ($access == 'super admin' || $access == 'admin view') {
            $user = $response;
            $data = array(); //set variabel data untuk menampung hasil response

            foreach ($user as $key => $val) { //setiap data $instansi dijadikan menjadi $key
                if ($key != 'id'); //jika key bukan bernilai string 'id' maka
                $data[$key] = $val; //atur variabel $key untuk menjadi array key pada variabel $data
            }
        } else { //jika user pada response->data = null maka akan tampil pesan error 404
            setcookie("access_tokenku", null);
            return abort(404, 'user not found.');
        }
        $data['user'] = $data;
        return $data;
    }
}
