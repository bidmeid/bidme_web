@extends('layouts.frontend.app')
@section('content')
<main>

   @component('components.frontend.breadcrumb')
   @slot('breadcrumb')
   <div class="page__title-wrapper text-center">
     
      
   </div>
   @endslot
   
   @endcomponent

    <!-- contact area start  -->
    <section class="contact__area pb-150 p-relative z-index-1">
      <div class="container">
         <div class="row">
            <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
               <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                  <div class="py-5 text-center notxxx">
                      
                     <p class="lead">Anda bisa memilih towing yang tersedia dibawah ini</p>
                   </div>
                  <div class="row" id="item-list">
                     
                     
                  
                     
                   </div>
				   <div class="py-5 text-center">
				   <span class="loader"></span>
				   </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- contact area end  -->
</main>
@endsection
@push('js')
<script>

	var image = "{{ asset('assets/frontend/images/preloaders/1.gif') }}";
	var $loading = $(".loader").html( '<img class="loading-image" src="'+image+'" alt="loading..">');
	
	var orderId = getUrlVars().orderId;
	 
	function loadBidding(){

		$.ajax({
					data: {"orderId" : orderId},
					url: ServerUrl+"/api/bidding",
                    method: 'POST',
                    complete: function(response){ 				
                        if(response.status == 200){
							var content = ''; 
							$.each(response.responseJSON.data, function(k,v){
							
								 content +='<div class="col-md-6 order-md-1">';
								  
								   content +='<div class="card-deck">';
									content +='<div class="card">';
									  content +='<img class="card-img-top" src="{{ asset('frontend/img/towing-3.jpg') }}" alt="image">';
									  content +='<div class="card-body">';
										content +='<h5 class="card-title">'+v.mitra.namaUsaha+'</h5><hr>';
										content +='<p class="card-text"><span class="fw-bold">Harga: </span>Rp. '+v.bidding+'</p>';
										content +='<p class="card-text"><span class="fw-bold">Estimasi Jemput: </span>'+v.pickupTime+'</p><hr>';
										content +='<a href="<?php echo url('/'); ?>/user/checkout?orderId='+v.orderId+'&bidId='+v.id+'" class="btn btn-primary">Pilih Towing</a>';
									  content +='</div>';
									content +='</div>';
								  content +='</div>';
								  
								 content +='</div>';
								  
							
							});
							$('.notxxx').show();
							setTimeout('$loading.hide()',1000); 
							$('#item-list').html(content);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 202){
							 $('#loadmore').remove();
							 $('.notxxx').hide();
							 $('#item-list').html('<center class="m-t-50"><h2>kami sedang mencoba mencarikan unit towing terdekat untuk anda</h2></center>');
							$loading.show();
						}else if(response.status == 203){
							  $('.notxxx').hide();
							 $('#item-list').html('<center class="mt-50"><h2>'+response.responseJSON.message+'</h2><br><a href="<?php echo url('/order'); ?>"  class="btn btn-md w-btn-purple mt-3">{{ __('Order Layanan') }}</a></center>');
							 $loading.hide();
						}
                    },
					dataType:'json'
        })
	
	};
	loadBidding();
	setInterval( function () {
		loadBidding();
	}, 10000 );

</script>
@endpush