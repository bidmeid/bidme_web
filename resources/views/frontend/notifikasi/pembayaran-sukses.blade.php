@extends('layouts.frontend.app')
@section('content')
<main>



    <!-- blog area start -->
    <section class="blog__area pt-120 pb-60">
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="text-center align-items-center p-3 my-1 text-white bg-primary rounded shadow-sm">
                <div class="lh-1 ">
                    <h1 class="h4 mb-0 text-white lh-1">Pembayaran Anda sukses</h1>
                </div>
            </div>
            <div class="my-3 p-3 bg-body rounded shadow-sm text-center">
              <img class="lazyload" src="{{ asset('frontend') }}/img/pay-success.png" alt="" width="50%">
                <p class="text-center mt-3">Terimakasih pembayaran Anda sudah kami terima. Anda tidak perlu melakukan pembyaran lagi untuk order ini</p>
                <a href="{{ url('/') }}" class="w-btn w-btn">Kembali</a>
            </div>
        </div>
       </div>
    </section>
    <!-- blog area end -->

 </main>
@endsection