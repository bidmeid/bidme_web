@extends('layouts.frontend.app')
@section('content')


<section class="services__area pt-110 pb-45">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12 offset-xl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
             <div class="section__title-wrapper section__title-wrapper-4 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                <h2 class="section__title section__title-4 section__title-4-p-2">{{ __('Rincian Pesanan') }}</h2>
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
                <input type="hidden" name="noTelp" value="{{ request('noTelp') }}">
                <input type="hidden" name="jenisKendaraanId" value="{{ request('jenisKendaraanId') }}">
                <input type="hidden" name="merekKendaraanId" value="{{ request('merekKendaraanId') }}">
                <input type="hidden" name="typeKendaraanId" value="{{ request('typeKendaraanId') }}">

                <!-- input form order-step2 -->
                <input name="latLongTujuan" type="hidden" class="latlong" value="{{ request('latLongTujuan') }}">
					 
                <!-- input form order-step2 -->
				<input name="orderType" type="hidden" value="{{ request('orderType') }}">
                <input id="ruteId" name="ruteId" type="hidden" value="">
                <input name="jarak" type="hidden" value="">
                <input name="orderCost" type="hidden" value="">
                <input name="alamatAsal" type="hidden" value="{{ request('alamatAsal') }}">
                <input name="alamatTujuan" type="hidden" value="{{ request('alamatTujuan') }}">
                <input name="asalPostcode" type="hidden" value="{{ request('asalPostcode') }}">
                <input name="tujuanPostcode" type="hidden" value="{{ request('tujuanPostcode') }}">
                <input name="kondisiKendaraanId" type="hidden" value="{{ request('kondisiKendaraanId') }}">
                <input name="orderDate" type="hidden" value="{{ request('orderDate') }}">
                <input name="orderTime" type="hidden" value="{{ request('orderTime') }}">

                    <div class="form-group row">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Lokasi Jemput') }}</label>
                        <div class="col-sm-9">
						  <label for="alamatAsal" class=" col-form-label">: {{ request('alamatAsal') }}</label>
                         
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="alamatTujuan" class="col-sm-3 col-form-label">{{ __('Lokasi Antar') }}</label>
                        <div class="col-sm-9">
                          <label for="alamatTujuan" class=" col-form-label">: {{ request('alamatTujuan') }}</label>
						</div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="jarak" class="col-sm-3 col-form-label">{{ __('Perkiraan Jarak') }}</label>
                      <div class="col-sm-9">
						: <label id="jarak" for="jarak" class="col-sm-3 col-form-label"></label>
                      </div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="Tipe Order" class="col-sm-3 col-form-label">{{ __('Tipe Order') }}</label>
                      <div class="col-sm-9">
                        : <label for="type_order" class="col-sm-3 col-form-label">{{ request('orderType') }}</label>
                      </div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="harga-dasar" class="col-sm-3 col-form-label">{{ __('Harga Dasar') }}</label>
                      <div class="col-sm-9">
                        : <label id="harga_dasar" for="total_bayar" class="col-sm-3 col-form-label"></label>
                      </div>
                    </div>
                    <hr>
                     
                    <div class="form-group row mt-3 fw-bolder">
                        <label for="total-bayar" class="col-sm-3 col-form-label">{{ __('Total Biaya') }}</label>
                        <div class="col-sm-9">
						  : <label id="total_bayar" for="total_bayar" class="col-sm-3 col-form-label"></label>
                           
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
<!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Silahkan login dulu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row text-center">
          <div class="col-md-12">
            <div class="sign__header mb-35">
              <div class=" text-center">
                <a  href="javascript:void(0) "onClick="login()" class="sign__social bg-primary btn-primary  mb-15">{{ __('Login dengan Google') }}</a>
             </div>
			<hr>
           </div>
          </div>
        </div>
        <form id="formLoginPopUp">
          @csrf
          <div class="mb-3 text-center"><p class="small">Silahkan login dengan Email dan Password Anda</p></div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="email" name="email">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" placeholder="password" name="password">
          </div>
          <div class="modal-footer">
            <button type="button" class="w-btn w-btn" data-bs-dismiss="modal">{{ __('Batal') }}</button>
            <button type="submit" class="w-btn w-btn">{{ __('Login') }}</button>
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
 
let data = {
    'orderType' : '{{ request('orderType') }}', 
    'asalPostcode' : '{{ request('asalPostcode') }}', 
    'tujuanPostcode' : '{{ request('tujuanPostcode') }}', 
    'jenisKendaraanId' : '{{ request('jenisKendaraanId') }}', 
  };
  
function getHargaDasar(){
 
 $.ajax({
   url:  ServerUrl+'/api/requestCost',
   method: 'POST',
   data: data,
   complete: (response) => {
     if(response.status == 200) {
       let data = response.responseJSON.data.RequestCost;
       $('#harga_dasar').html('Rp. '+data.totalHarga);
        
       $('#total_bayar').html('Rp. '+data.totalHarga);
       $('input[name=ruteId]').val(data.id);
       $('input[name=orderCost]').val(data.totalHarga);
     }
   }
 });
}
getHargaDasar();

function login(){
	
$.ajax({
   url:  "{{ url('/pushSession') }}",
   method: 'GET',
   data: $('#formOrder').serialize(),
   complete: (response) => {
     if(response.status == 201) {
        window.location.replace(ServerUrl+"/auth/redirects/google/customer");
     }
   }
 }); 
}

$('#formOrder').submit((event) => {
 event.preventDefault();
 
  var access_tokenku = getToken();
  
  if(access_tokenku){
    postOrder()
  }else{
    $('#staticBackdrop').modal('show');
  }
});

function postOrder(){

  let data = $('#formOrder').serialize();
   
 $.ajax({
   url:  ServerUrl+'/api/postOrder',
   data: data,
   method: 'POST',
   cache: false,
   complete: (response) => {
    if(response.status == 201){
		console.log(response.responseJSON.data.id);
            swal({
              title: '',
              text : response.responseJSON.message,
              icon :'success'
            }).then(function(){
              window.location.replace("{{url('/')}}/user/bidding?orderId="+response.responseJSON.data.id);
            });
        }else if(response.status == 404){
            swal({
              title: '',
              text : response.responseJSON.message,
              icon : 'warning',
            });    
        }else if(response.status == 401){
        alert('info','401 server conection error');
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
           //document.getElementById('jarak').value = result.routes[0].legs[0].distance.text;
		   $('#jarak').html(result.routes[0].legs[0].distance.text);
		   $('input[name=jarak]').val(result.routes[0].legs[0].distance.text);
       } else {
           return alert('Petunjuk arah gagal dimuat, masukkan alamat yang benar!');
       }
   });
}
findRoute();

  $("#formLoginPopUp").submit( function (event){
    event.preventDefault();
    $('#staticBackdrop').modal('hide');

    const form = $(this)[0];
    const data = new FormData(form);

    $.ajax({
        url: ServerUrl+'/api/auth/customer/sigin',
        data: data,
        method: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        complete: (response) => {
          if(response.status == 200) {
              // console.log(response.responseJSON.access_token);
              $token = response.responseJSON.access_token
              setcookie("access_tokenku", $token);
			  location.reload();
          }
        }
    });
  });

</script>
@endpush