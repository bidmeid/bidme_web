@extends('layouts.frontend.app')
@section('content')

  @component('components.frontend.breadcrumb')
  @slot('breadcrumb')
  <div class="page__title-wrapper text-center">
  <h3>{{ __('Bidme | Order') }}</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">{{ __('Beranda') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Order') }}</li>
      </ol>
    </nav>
  </div>
  @endslot
  @endcomponent

<section class="services__area pt-110 pb-45">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12 offset-xl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
             <div class="section__title-wrapper section__title-wrapper-4 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                <h2 class="section__title section__title-4 section__title-4-p-2">{{ __('Rincian Order') }}</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
             <div class="services__item-4 white-bg mb-10">
                <div id="map"></div>
             </div>
          </div>
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
             <div class="services__item-4 white-bg mb-30">
                <form id="formOrder">

                <!-- input form order-step1 -->
                <input type="hidden" name="latLongAsal" value="{{ request('latLongAsal') }}">
                <input type="hidden" name="telp" value="{{ request('telp') }}">
                <input type="hidden" name="jenisKendaraan" value="{{ request('jenisKendaraan') }}">
                <input type="hidden" name="jenisKendaraanId" value="{{ request('jenisKendaraanId') }}">
                <input type="hidden" name="typeKendaraanId" value="{{ request('jenisKendaraanId') }}">

                <!-- input form order-step2 -->
                <input name="latLongTujuan" type="hidden" class="latlong" value="{{ request('latLongTujuan') }}">

                <!-- input form order-step2 -->
                <input id="ruteId" name="ruteId" type="hidden" value="1">
                <input name="userToken" type="hidden" value="{{ csrf_token() }}">
                <input name="customerId" type="hidden" value="1">
                <input name="orderDate" type="hidden" value="{{ request('orderDate') }}">
                <input name="orderTime" type="hidden" value="{{ request('orderTime') }}">

                    <div class="form-group row">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Lokasi Jemput') }}</label>
                        <div class="col-sm-9">
                          <input name="alamatAsal" type="text" class="form-control" id="alamatAsal" value="{{ request('alamatAsal') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="alamatTujuan" class="col-sm-3 col-form-label">{{ __('Lokasi Antar') }}</label>
                        <div class="col-sm-9">
                          <input name="alamatTujuan" type="text" class="form-control" id="alamatTujuan" value="{{ request('alamatTujuan') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="jarak" class="col-sm-3 col-form-label">{{ __('Perkiraan Jarak') }}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="jarak" value="" readonly>
                      </div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="Tipe Order" class="col-sm-3 col-form-label">{{ __('Tipe Order') }}</label>
                      <div class="col-sm-9">
                        <input name="orderType" type="text" class="form-control" id="jadwal" value="{{ request('typeOrder') }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="harga-dasar" class="col-sm-3 col-form-label">{{ __('Harga Dasar') }}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga-dasar" value="" readonly>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row mt-2">
                        <label for="layanan" class="col-sm-6 col-form-label">{{ __('Layanan Tambahan') }}</label>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="bantuan" class="col-sm-3 col-form-label">{{ __('Bantuan Orang') }}</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="bantuan" value="0">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="asuransi" class="col-sm-3 col-form-label">{{ __('Biaya Asuransi') }}</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="asuransi" value="0">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row mt-3">
                        <label for="total-bayar" class="col-sm-3 col-form-label">{{ __('Total Bayar') }}</label>
                        <div class="col-sm-9">
                          <input name="orderCost" type="number" class="form-control" id="total-bayar" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-sm-3">
                            <a href="{{ route('order') }}" id="btnOrder" class="w-btn w-btn-purple mt-3">{{ __('Batal') }}</a>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" id="btnrder" class="w-btn w-btn-purple mt-3">{{ __('Konfirmasi') }}</button>
                        </div>
                    </div>
                  </form>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD8y5ZQcuol7vxOkXii_wsHqYhCNL0uEM&libraries=places"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function getHargaDasar(){
  let data = {
    'orderType' : '{{ request('typeOrder') }}', 
    'asalPostcode' : '{{ request('asalPostcode') }}', 
    'tujuanPostcode' : '{{ request('tujuanPostcode') }}', 
    'jenisKendaraanId' : '{{ request('jenisKendaraanId') }}', 
  };

 $.ajax({
   url: 'https://services.bidme.id/api/requestCost',
   method: 'POST',
   data: data,
   complete: (response) => {
     if(response.status == 200) {
       let data = response.responseJSON.data.RequestCost;
       $('#harga-dasar').val(data.totalHarga);
       $('#total-bayar').val(data.totalHarga);
     }else {
       console.log('gagal');
     }
   }
 });
}
getHargaDasar();

$('#formOrder').submit((event) => {
 event.preventDefault();
 
  var access_tokenku = getToken();
  
  if(access_tokenku){
    postOrder()
  }else{
    console.log('login');
  }
});

function postOrder(){

  let form = $('#formOrder')[0];
  let data = new FormData(form);

 $.ajax({
   url: 'https://services.bidme.id/api/postOrder',
   data: data,
   method: 'POST',
   processData: false,
   contentType: false,
   cache: false,
   complete: (response) => {
    if(response.status == 201){
            swal({
              title: '',
              text : response.responseJSON.message,
              icon :'success'
            }).then(function(){
              window.location.replace('/user/bidding');
            });
        }else if(response.status == 404){
            swal({
              title: '',
              text : response.responseJSON.message,
              icon : 'warning',
            });    
        }else if(response.status == 401){
        e('info','401 server conection error');
        }else{
            swal({
              title: '',
              text : response.responseJSON.message,
              icon :'warning',
            });	 
        }
    }
 });

};

// Maps js
let map;
let directionsService = new google.maps.DirectionsService();
let directionsDisplay = new google.maps.DirectionsRenderer();

map = new google.maps.Map(document.getElementById('map'), {
   center: {
       lat: -5.450000,
       lng: 105.266670
   },
   zoom: 16
});
directionsDisplay.setMap(map);

function findRoute() {
   let startAddress = '{{ request('latLongAsal') }}';
   let endAddress = '{{ request('latLongTujuan') }}';
   let request = {
       origin: startAddress,
       destination: endAddress,
       travelMode: 'DRIVING'
   };
   directionsService.route(request, function (result, status) {
       if (status == 'OK') {
           directionsDisplay.setDirections(result);
           document.getElementById('jarak').value = result.routes[0].legs[0].distance.text;
       } else {
           return alert('Petunjuk arah gagal dimuat, masukkan alamat yang benar!');
       }
   });
}
findRoute();
</script>
@endpush