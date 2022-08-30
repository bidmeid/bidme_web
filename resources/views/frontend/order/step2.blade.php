@extends('layouts.frontend.app')
@section('content')

<!-- gmaps -->
<main>

  

     <!-- services area start -->
     <section class="services__area pt-70 pb-45">
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10">
                 <div class="section__title-wrapper section__title-wrapper-4 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="section__title section__title-4 section__title-4-p-2">{{ __('Order Mobil Derek Indonesia') }}</h2>
                    
                 </div>
              </div>
           </div>
           <div class="row justify-content-center">
              <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 wow fadeInUp" data-wow-delay=".3s">
                 <div class="services__item-4 white-bg mb-30">
                     
                    <h3 class="text-center">{{ __('Beritahu kami lokasi Anda dan tujuan Anda') }}</h3>
                    <form action="{{ route('order-step-3') }}" method="GET">

                     <!-- input form order-step1 -->
                     <input type="hidden" name="latLongAsal" value="{{ request('latLongAsal') }}">
                     <input type="hidden" name="asalPostcode" value="{{ request('asalPostcode') }}">
                     <input type="hidden" name="alamatAsal" value="{{ request('alamatAsal') }}">
                     <input type="hidden" name="detailAsal" value="{{ request('detailAsal') }}">
                     <input type="hidden" name="noTelp" value="{{ request('noTelp') }}">
                     <input type="hidden" name="jenisKendaraanId" value="{{ request('jenisKendaraanId') }}">
                     <input type="hidden" name="merekKendaraanId" value="{{ request('merekKendaraanId') }}">
                     <input type="hidden" name="typeKendaraanId" value="{{ request('typeKendaraanId') }}">
                     <input type="hidden" name="kondisiKendaraanId" value="{{ request('kondisiKendaraanId') }}">
                     <input type="hidden" name="orderType" value="{{ request('orderType') }}">
                     <input type="hidden" name="orderDate" value="{{ request('orderDate') }}">
                     <input type="hidden" name="orderTime" value="{{ request('orderTime') }}">
                     
                     <!-- input form order-step2 -->
                     <input name="latLongTujuan" type="hidden" class="latlong">
                     <input name="tujuanPostcode" type="hidden" class="pos-code">

                        <div class="services__content-4 mt-2">
                              <div class="mb-3">
                                 <label for="alamatTujuan">{{ __('Lokasi Antar') }}</label>
                                 <input name="alamatTujuan" type="text" class="form-control" id="start-search" placeholder="">
                              </div>
                           <div id="map"></div>
                           <div class="form-group mt-3">
                              <label for="exampleFormControlTextarea1">{{ __('Tambahkan detail lokasi (nama gedung, jalan dll) ') }}</label>
                              <textarea class="form-control" name="detailTujuan" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="submit" id="btn-order" class="w-btn w-btn-purple mt-3">{{ __('Selanjutnya') }}</button>
                     </form>
                 </div>
              </div>
            </div>
        </div>
     </section>
     <!-- services area end -->
  </main>
@endsection
@push('js')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD8y5ZQcuol7vxOkXii_wsHqYhCNL0uEM&libraries=places&callback=initialize"></script>
<script src="{{ asset('frontend/js/gmap2.js') }}"></script>
@endpush