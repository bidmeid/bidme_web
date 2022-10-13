@extends('layouts.frontend.app')
@section('content')

<style>
#map {
    height: 500px;
}</style>
<section class="services__area pt-110 pb-45">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12 offset-xl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
             <div class="section__title-wrapper section__title-wrapper-4 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                <h3 class="">{{ $data['title'] }} Towing</h3>
				<h2 class="text-warning" id="subTitle"></h2>
             </div>
          </div>
       </div>
       <div class="row">
           
		  <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".3s">
             <div class="services__item-4 white-bg mb-30">
                <div class="mb-4" id="map"></div>
				<div id="alert"></div>
             </div>
          </div>
          
		  <div id="mitra" class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".5s">
             <div class="services__item-4 white-bg mb-10">
                <form id="formOrder">

					<div class="form-group row"><h4>Informasi Driver</h4> <hr>
					 
                    </div>
					
                    <div class="form-group row">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Mitra Towing') }}</label>
                        <div class="col-sm-9">
						  <label id="namaUsaha" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					<div class="form-group row mt-3">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Nama Driver Towing') }}</label>
                        <div class="col-sm-9">
						  <label id="namaDriver" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					<div class="form-group row mt-3">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('No. TNKB Towing') }}</label>
                        <div class="col-sm-9">
						  <label id="noTnkbTowing" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					<div class="form-group row mt-3">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Kontak Driver') }}</label>
                        <div class="col-sm-9">
						  <label id="noTlpDriver" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					
                  </form>
             </div>
          </div>
		  
		  <div class="col-sm-12" id="btnex2">
                             
          </div>
       </div>
    </div>

 </section>
@endsection

@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD8y5ZQcuol7vxOkXii_wsHqYhCNL0uEM&libraries=places"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
 
function loadView(){
		
		$.ajax({
					data: getUrlVars(),
					url: ServerUrl+"/api/tracking",
					crossDomain: true,
					method: 'GET',
					complete: function(response){ 				
					if(response.status == 200){
							 
							$('#namaUsaha').html(response.responseJSON.data.mitra.namaUsaha);
							$('#alert').html('<div class="alert alert-secondary" role="alert">'+response.responseJSON.data.msg+', Download aplikasi android untuk informasi detail traking kendaraan.</div>');
							$('#namaDriver').html(response.responseJSON.data.driver.nameDriver);
							$('#noTnkbTowing').html(response.responseJSON.data.noTnkbTowing);
							$('#noTlpDriver').html(response.responseJSON.data.driver.noTlpDriver);
							
							var tbody	= '';
							 
							tbody +='<a onclick="finishOrder(`'+response.responseJSON.data.orderId+'`)" href="javacript:void(0);" id="btnrder" class="btn btn-lg btn-success col-sm-12 mt-3">{{ __('Pesanan Selesai') }}</a>';
							tbody +='<a href="<?php echo url('/'); ?>/user/layanan/detail??orderId='+response.responseJSON.data.orderId+'" id="btnrder" class="btn btn-lg btn-secondary col-sm-12 mt-3">{{ __('Kembali') }}</a>';
							$('#btnex2').html(tbody);
							if(response.responseJSON.data.latLongDriver == "0.0,0.0"){
							 //$('#alert').html('<div class="alert alert-secondary" role="alert">'+response.responseJSON.data.msg+', Download aplikasi android untuk informasi detail traking.</div>');
							}
							findRoute(response.responseJSON.data.latLongDriver, response.responseJSON.data.latLongTujuan)
						}else if(response.status == 202){
							window.location.replace("{{ url('/user/layanan'); }}");
						}
					},
				dataType:'json'
				})
	
	};

loadView();

function finishOrder(id){
	swal({
	  text: "Yakin bahwa layanan telah selesai !",
	  buttons: true,
	  dangerMode: true,
	})
	.then((ok) => {
	  if (ok) {
		  
		  $.ajax({
			   url:  ServerUrl+'/api/finishOrder',
			   method: 'POST',
			   data: {"orderId" : id},
			   complete: (response) => {
				 if(response.status == 201) {
					 swal("pesanan anda telah sampai tujuan!", {
						  icon: "success",
						});
					window.location.replace("{{ url('/user/layanan'); }}");
				 };
			   }
			 }); 
			}
	});
}
// Maps js
var map;
let directionsService = new google.maps.DirectionsService();
let directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

   var icons = {
	  start: new google.maps.MarkerImage(
	   // URL
	   'http://maps.google.com/mapfiles/kml/pal4/icon7.png',
	   // (width,height)
	   new google.maps.Size( 44, 32 ),
	   // The origin point (x,y)
	   new google.maps.Point( 0, 0 ),
	   // The anchor point (x,y)
	   new google.maps.Point( 22, 32 )
	  ),
	  end: new google.maps.MarkerImage(
	   // URL
	   'http://maps.google.com/mapfiles/kml/pal2/icon2.png',
	   // (width,height)
	   new google.maps.Size( 44, 32 ),
	   // The origin point (x,y)
	   new google.maps.Point( 0, 0 ),
	   // The anchor point (x,y)
	   new google.maps.Point( 22, 32 )
	  )
	 };
	 
var mapOptions = {
    zoom: 5,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(-2.2496319,109.9386476)
  };

var map = new google.maps.Map(document.getElementById('map'),
      mapOptions);
	  
directionsDisplay.setMap(map);

function findRoute(latLongAsal, latLongTujuan) {
	if(latLongAsal != "0.0,0.0"){
	

   let startAddress = latLongAsal;
   let endAddress = latLongTujuan;
   let request = {
       origin: startAddress,
       destination: endAddress,
       travelMode: 'DRIVING'
   };



   directionsService.route(request, function (result, status) {
       if (status == 'OK') {
           directionsDisplay.setDirections(result);
		   
		   console.log(result);
           //document.getElementById('jarak').value = result.routes[0].legs[0].distance.text;
		   makeMarker( result.routes[0].legs[0].start_location, icons.start, "Posisi Driver" );
		   makeMarker( result.routes[0].legs[0].end_location, icons.end, "Alamat Tujuan" );
		 
		map.setZoom(15);
		    
       } else {
           return alert('Petunjuk arah gagal dimuat, masukkan alamat yang benar!');
       }
   });
   }
}

function makeMarker( position, icon, title ) {
 new google.maps.Marker({
  position: position,
  map: map,
  icon: icon,
  title: title
 });
}
 
 	setInterval( function () {
		loadView();
	}, 20000 );

</script>
@endpush