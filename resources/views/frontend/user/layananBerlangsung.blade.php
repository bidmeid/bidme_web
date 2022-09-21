@extends('layouts.frontend.app')
@section('content')
<main>

  

    <!-- price area start -->
         <section class="price__area pt-120 pb-90">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
                     <div class="section__title-wrapper section__title-wrapper-3 section-padding-p-0 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                        
                        <h2 class="section__title section__title-3">Layanan Berlangsung</h2>
                        
                     </div>
                  </div>
               </div>
               <div class="row" id="item-list">
                  
				  
				 </div>
            </div>
         </section>
         <!-- platform area end -->
		 
</main>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

function loadLayanan(){

		$.ajax({
					data: {"orderStatus" : "process"},
					url: ServerUrl+"/api/myOrder",
                    method: 'POST',
                    complete: function(response){ 				
                        if(response.status == 200){
							var content = ''; 
							$.each(response.responseJSON.data, function(k,v){
								  
								 content +='<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">';
									 content +='<div class="price__item-3 white-bg mb-30 text-center fix">';
										content +='<div class="price__heading free">';
										   content +='<h4>'+v.regionAsal.distric+' - '+v.regionTujuan.distric+'</h4>';
										content +='</div>';
										content +='<div class="price__body">';
											
										   content +='<div class="price__tag-3">';
										   if(v.orderCost == 0){
											  content +='<h2>Belum Ditentukan</h2>';
										   }else{
											  content +='<h2>Rp.'+v.orderCost+'</h2>';
										   }
										   content +='</div>';
										   content +='<div class="price__features-2">';
											  content +='<ul>';
												 content +='<li>Kendaraan '+v.typeKendaraan.typeKendaraan+' </li>';
												 content +='<li>Status : <span class="text-primary">Dalam Pesanan</span></li>';
											  content +='</ul>';
										   content +='</div><hr>';
										   content +='<p class="small">Pesanan anda tidak dapat dibatalkan, silahkan lihat informasi selengkapnya.</p>';
										   content +='<div class="price__btn">';
											  content +='<a href="<?php echo url('/'); ?>/user/layanan/detail?orderId='+v.id+'" class="w-btn w-btn-10">Lihat Detail</a>';
										   content +='</div>';
										content +='</div>';
									 content +='</div>';
								  content +='</div>';
								  
							
							});
							 
							$('#item-list').html(content);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 202){
							 $('#loadmore').remove();
							 $('#item-list').html('<center class="m-t-50"><h2>Anda tidak memiliki layanan</h2></center>');
						}
                    },
					dataType:'json'
        })
	
	};
	loadLayanan();


</script>
@endsection