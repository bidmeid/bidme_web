@extends('layouts.frontend.app')
@section('content')
<main>

   @component('components.frontend.breadcrumb')
   @slot('breadcrumb')
   <div class="page__title-wrapper text-center">
    <h3>{{ $data['title'] }}</h3>
      
   </div>
   @endslot
   @endcomponent

    <!-- contact area start  -->
    <section class="contact__area pb-150 p-relative z-index-1">
      <div class="container">
         <div class="row">
            <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
               <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                  <div class="py-5 text-center">
                      
                     <p class="lead">Anda bisa memilih towing yang tersedia dibawah ini</p>
                   </div>
                  <div class="row">
                     <div class="col-md-6 order-md-1">
                     <form action="/user/payment" method="GET">
                       <div class="card-deck">
                        <div class="card">
                          <img class="card-img-top" src="{{ asset('frontend/img/towing-3.jpg') }}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">Towing 1</h5>
                            <hr>
                            <p class="card-text"><span class="fw-bold">Harga: </span>Rp. 50.000</p>
                            <p class="card-text"><span class="fw-bold">Estimasi waktu: </span>5 Menit</p>
                            <hr>
                            <button class="btn btn-primary">Pilih Towing</button>
                          </div>
                        </div>
                      </div>
                     </div>
                  </form>
                     <div class="col-md-6 order-md-1">
                       <div class="card-deck">
                        <div class="card">
                          <img class="card-img-top" src="{{ asset('frontend/img/towing-1.jpg') }}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">Towing 2</h5>
                            <hr>
                            <p class="card-text"><span class="fw-bold">Harga: </span>Rp. 40.000</p>
                            <p class="card-text"><span class="fw-bold">Estimasi waktu: </span>8 Menit</p>
                            <hr>
                            <button class="btn btn-primary">Pilih Towing</button>
                          </div>
                        </div>
                      </div>
                     </div>
                   </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- contact area end  -->
</main>
@endsection