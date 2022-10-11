<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function pembayaranGagal()
    {
        return view('frontend.notifikasi.pembayaran-gagal');
    }

    public function pembayaranSukses()
    {
        return view('frontend.notifikasi.pembayaran-sukses');
    }
}
