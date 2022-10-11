@extends('layouts.frontend.app')
@section('content')


<section class="services__area pt-110 pb-45">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12 offset-xl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
             <div class="section__title-wrapper section__title-wrapper-4 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                <h3 class="">{{ $data['title'] }} </h3>
				<h2 class="text-warning" id="subTitle"></h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".3s">
             <div class="services__item-4 white-bg mb-30">
                <div id="map"></div>
             </div>
          </div>
          <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".5s">
             <div class="services__item-4 white-bg mb-20">
                <form id="formOrder">

					<div class="form-group row"><h4>Informasi Pesanan</h4> <hr>
					<span class="text-right">
                        <p class="col-form-label">Ticket Order:</p>
                        <h2 id="ticket" class="col-form-label">#XXXXXXX</h2>
						</span>
                        
                    </div>
					
                    <div class="form-group row">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Tanggal Order') }}</label>
                        <div class="col-sm-9">
						  <label id="orderDate" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					<div class="form-group row mt-3">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Nomor Telpon') }}</label>
                        <div class="col-sm-9">
						  <label id="telp" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					<div class="form-group row mt-3">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Lokasi Jemput') }}</label>
                        <div class="col-sm-9">
						  <label id="alamatAsal" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					
                    <div class="form-group row mt-3">
                        <label for="alamatTujuan" class="col-sm-3 col-form-label">{{ __('Lokasi Antar') }}</label>
                        <div class="col-sm-9">
                          <label id="alamatTujuan" class=" col-form-label">: </label>
						</div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="jarak" class="col-sm-3 col-form-label">{{ __('Unit') }}</label>
                      <div class="col-sm-9">
						<label id="unit" for="jarak" class="col-sm-3 col-form-label">: </label>
                      </div>
                    </div>
					<div class="form-group row mt-3">
                      <label for="jarak" class="col-sm-3 col-form-label">{{ __('Kondisi Kendaraan') }}</label>
                      <div class="col-sm-9">
						<label id="kondisi" for="jarak" class="col-form-label">: </label>
                      </div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="Tipe Order" class="col-sm-3 col-form-label">{{ __('Layanan') }}</label>
                      <div class="col-sm-9">
                        <label id="type_order" class="col-sm-3 col-form-label">: </label>
                      </div>
                    </div>
					
                    <div class="form-group row mt-3">
                      <label for="harga-dasar" class="col-sm-3 col-form-label">{{ __('Total Biaya') }}</label>
                      <div class="col-sm-9">
                        <label id="cost" for="total_bayar" class="col-sm-3 col-form-label">: </label>
                      </div>
                    </div>
					<div class="form-group row mt-3">
                      <label for="harga-dasar" class="col-sm-3 col-form-label">{{ __('Status Pesanan') }}</label>
                      <div class="col-sm-9 fw-bold">
                        <label id="status" for="total_bayar" class="col-sm-3 col-form-label">: </label>
                      </div>
                    </div>
                     
                     
                    <div class="form-group row mt-3 text-right">
                         
                        <div class="col-sm-12" id="btnex">
                             
                        </div>
                    </div>
                  </form>
             </div>
          </div>
		  
		  <div id="mitra" class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".5s">
             <div class="services__item-4 white-bg mb-10">
                <form id="formOrder">

					<div class="form-group row"><h4>Informasi Mitra Towing</h4> <hr>
					 
                    </div>
					
                    <div class="form-group row">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Mitra Towing') }}</label>
                        <div class="col-sm-9">
						  <label id="namaUsaha" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					<div class="form-group row mt-3">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Alamat Towing') }}</label>
                        <div class="col-sm-9">
						  <label id="alamatUsaha" class=" col-form-label">: </label>
                         
                        </div>
                    </div>
					<div class="form-group row mt-3">
                        <label for="alamatAsal" class="col-sm-3 col-form-label">{{ __('Kontak Telp.') }}</label>
                        <div class="col-sm-9">
						  <label id="no_telp" class=" col-form-label">: </label>
                         
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
					url: ServerUrl+"/api/getOrderById",
					crossDomain: true,
					method: 'GET',
					complete: function(response){ 				
					if(response.status == 200){
							 if(response.responseJSON.data.status =='paid'){ response.responseJSON.data.status='Telah dibayar';};
							$('#ticket').html('#'+response.responseJSON.data.ticket);
							$('#orderDate').append(response.responseJSON.data.orderDate+' '+response.responseJSON.data.orderTime);
							$('#telp').append(response.responseJSON.data.telp);
							$('#alamatAsal').append(response.responseJSON.data.alamatAsal);
							$('#alamatTujuan').append(response.responseJSON.data.alamatTujuan);
							$('#type_order').append(response.responseJSON.data.orderType);
							$('#unit').append(response.responseJSON.data.jenisKendaraan.jenisKendaraan+' '+response.responseJSON.data.typeKendaraan.typeKendaraan);
							$('#kondisi').append(response.responseJSON.data.kondisiKendaraan.kondisiKendaraan);
							$('#status').append(response.responseJSON.data.status);
							$('#cost').append('Rp.'+response.responseJSON.data.orderCost);
							$('#subTitle').html(response.responseJSON.data.regionAsal.distric+' - '+response.responseJSON.data.regionTujuan.distric);
							 if(response.responseJSON.data.mitra != null){
								 $('#namaUsaha').append(response.responseJSON.data.mitra.namaUsaha);
								 $('#alamatUsaha').append(response.responseJSON.data.mitra.alamatUsaha);
								 $('#no_telp').append(response.responseJSON.data.mitra.no_telp);
								  
							 }else{
								 $('#mitra').remove();
							 }
							var tbody	= '';
							if(response.responseJSON.data.status == 'unpaid'){
							//tbody +='<hr><a href="<?php echo url('/'); ?>/user/cancelOrder?orderId='+response.responseJSON.data.id+'" type="button" id="cancelOrder" class="btn btn-sm text-primary mt-3 mr-10">Batalkan Pesanan ?</a>';
                            tbody +='<a href="<?php echo url('/'); ?>/user/bidding?orderId='+response.responseJSON.data.id+'" id="btnrder" class="btn btn-md w-btn-purple mt-3">{{ __('Lihat Penawaran Mitra') }}</a>';
							if(response.responseJSON.data.bidId != null){
							//tbody +='<a href="<?php echo url('/'); ?>/user/checkout?orderId='+response.responseJSON.data.id+'" id="btnrder" class="btn btn-md w-btn-purple mt-3">{{ __('Pembayaran') }}</a>';
							}else{
							tbody +='<a href="<?php echo url('/'); ?>/user/bidding?orderId='+response.responseJSON.data.id+'" id="btnrder" class="btn btn-md w-btn-purple mt-3">{{ __('Lihat Penawaran Mitra') }}</a>';
							}
							$('#btnex').html(tbody);
							}else{
							tbody +='<a href="<?php echo url('/'); ?>/user/tracking?orderId='+response.responseJSON.data.id+'" id="btnrder" class="btn btn-lg w-btn-purple col-sm-12 mt-3">{{ __('Tracking Pengiriman') }}</a>';
							$('#btnex2').html(tbody);
							}
							findRoute(response.responseJSON.data.latLongAsal, response.responseJSON.data.latLongTujuan)
						}else if(response.status == 202){
							
						}
					},
				dataType:'json'
				})
	
	};

loadView();

// Maps js
let map;
let directionsService = new google.maps.DirectionsService();
let directionsDisplay = new google.maps.DirectionsRenderer();

map = new google.maps.Map(document.getElementById('map'), {
   center: {
       lat: -5.450000,
       lng: 105.266670
   },
   
});
directionsDisplay.setMap(map);

function findRoute(latLongAsal, latLongTujuan) {
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
		   map.setZoom(15);
           //document.getElementById('jarak').value = result.routes[0].legs[0].distance.text;
		    
       } else {
           return alert('Petunjuk arah gagal dimuat, masukkan alamat yang benar!');
       }
   });
}


 

</script>
@endpush