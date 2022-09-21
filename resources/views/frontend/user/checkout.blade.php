@extends('layouts.frontend.app')
@section('content')
<style>
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + label {
  cursor: pointer;
  background-image: linear-gradient(90deg, #747373 0%, #c0c0c1 53%, #dfdedd 100%);
}

/* CHECKED STYLES */
[type=radio]:checked + label {
  outline: 4px solid #f00;
  background-image: linear-gradient(90deg, #e69303 0%, #f3b704 53%, #ffda04 100%);
}
</style>
<main>


    <!-- contact area start  -->
    <section class="contact__area pb-150 p-relative z-index-1">
      <div class="container">
            <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
               <div class="contact__wrapper white-bg mt-50 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                  <div class="py-5 text-center">
				  <!--  <?php if($data['user']->avatar){ ?>
                     <img class="d-block mx-auto mb-4 rounded-circle" src="<?php echo $data['user']->avatar; ?>" alt="" width="72" height="72">
				  <?php }else{ ?>
					 <img class="d-block mx-auto mb-4 rounded-circle" src="{{ asset('frontend/img/avatar/avatar-5.png') }}" alt="" width="72" height="72">
				  <?php } ?>-->
					  
                   </div>
                   <div class="section-body">
                    <div class="invoice">
                      <div class="invoice-print">
                        <div class="row">
                            
                          <div class="col-lg-12">
                            
                            
                            
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="invoice-title">
                               
                              <div class="invoice-number">Ticket <span id="ticket">#xxxx</span></div>
                            </div>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-md">
                                <thead>
                                <tr>
                                   
                                  <th>Nama Layanan</th>
                                  <th class="text-center">Harga</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                
                                </tbody>
                              </table>
                            </div>
                            
                          </div>
                        </div>
                      </div>
					  <form id="payment" method="get" action="{{ url('user/payment') }}" >
                      <div class="row">
					  <div class="col-lg-7 pt-50">
							
							<!--<div class="checkout-form-list create-acc">
								<input name="cbox" id="cbox" type="checkbox">
								<label for="cbox" class="fw-bold text-primary">Tambahkan Asuransi Kendaraan</label>
							</div>
							<div id="cbox_info" class="checkout-form-list create-account" style="display: none;">
								
								<label>Masukan Harga Kendaraan Anda <span class="required">*</span></label>
								<input name="hargaKendaraan" type="number" placeholder="">
							</div>-->
							<div class="checkout-form-list create-acc">
								<input name="kupon" id="kupon" type="checkbox">
								<label for="kupon" class="fw-bold text-primary">Punya Kode Kupon ?</label>
							</div>
							<div id="kupon_info" class="checkout-form-list create-account" style="display: none;">
								<input name="kupon" type="text" placeholder="masukan kode kupon">
								<input name="subTotal" type="hidden" placeholder="">
							</div>
							<div class="order-notes">
								<div class="checkout-form-list">
									<label>Catatan Tambahan</label>
									<textarea id="checkout-mess" cols="30" rows="10" placeholder="catatan untuk driver"></textarea>
								</div>
							</div>
                               
                          </div>
						  <div class="col-lg-5 text-right pt-20">
							
							
							<div class="invoice-detail-item">
							  <div class="invoice-detail-name small">Asuransi Kendaraan</div>
							  <div id="asuransi" class="invoice-detail-value ">Rp. 0</div>
							  <div class="invoice-detail-name small">Biaya Aplikasi</div>
							  <div id="biayaApp" class="invoice-detail-value text-right">Rp. 0</div>
							</div>
							
							<div class="invoice-detail-item">
							  <div class="invoice-detail-name small">Subtotal</div>
							  <div id="subTotal" class="invoice-detail-value text-right">Rp. 0</div>
							</div>
							<div class="invoice-detail-item">
							  <div class="invoice-detail-name small">Kode Kupon</div>
							  <div  id="kodeKupon" class="invoice-detail-value text-danger">- Rp. 0</div>
							</div>
							<hr class="mt-2 mb-2">
							<div class="invoice-detail-item">
							  <div class="invoice-detail-name">Total</div>
							  <div id="total" class="invoice-detail-value invoice-detail-value-lg text-right">Rp. 0</div>
							</div>
					  </div>
					  </div>
					  
					  <div class="row">
					  
					  <input type="hidden" name="orderId">
					  <div class="col-lg-12 pt-20"><hr>
						<h5>Pilih metode pembayaran yang tersedia :</h5><br>
					  </div>
                        <div class="col-lg-4 mb-lg-0">
						<h5 class=" " for="warning-outlined">Pembayaran Transfer</h5>
						<input type="radio" class="btn-check live-order" name="paymentMethod" value="midtrans" id="midtrans" autocomplete="off"  checked>
						<label for="midtrans" class="card pt-15 pb-20 gradient-yellow mb-30 transition-3 text-center">
						   <div class="support__icon d-flex align-items-end justify-content-center">
						   
							<img width="200px" src="https://d2599kud7uucku.cloudfront.net/themes/h2/invoice/images/gateways/dlocal_apm.vs.png?v=10.3.11" alt="Pembayaran Melalui Bank Transfer">
							  
						   </div>
						</label>
                        </div>
						
						<!--<div class="col-lg-4 mb-lg-0">
						<h5 class=" " for="warning-outlined">Bayar Di Tempat</h5>
						<input type="radio" class="btn-check live-order" name="paymentMethod" value="transfer" id="transfer" autocomplete="off" required>
						<label for="transfer" class="card pt-15 pb-15 gradient-yellow mb-30 transition-3 text-center">
						   <div class="support__icon d-flex align-items-end justify-content-center">
						   
							<img width="200px" src="{{ asset('frontend/img/payment2.png') }}" alt="Pembayaran Melalui Bank Transfer">
							  
						   </div>  
						</label>
                        </div>-->
                      
					  
					  </div>
					  
					  <div class="form-group row mt-3 text-right">
					  <div class="col-sm-12" id="btnex">
					  <button type="submit" id="btn-order" class="w-btn w-btn-purple mt-3">BAYAR SEKARANG</button>
					  </div>
					  </div>
					   </form>
                    </div>
                  </div>
               </div>
            </div>
      </div>
   </section>
   <!-- contact area end  -->
</main>
<script>
	$('#cbox').on('click', function () {
		$('#cbox_info').slideToggle(500);
	});
	$('#kupon').on('click', function () {
		$('#kupon_info').slideToggle(500);
	});
	
	var orderId = getUrlVars().orderId;
	var bidId = getUrlVars().bidId;
	
	function loadView(){
		$("input[name=orderId]").val(orderId);
		$.ajax({
					data: getUrlVars(),
					url: ServerUrl+"/api/checkOut",
					crossDomain: true,
					method: 'POST',
					complete: function(response){ 				
					if(response.status == 200){
							 
							var subTotal = parseInt(response.responseJSON.data.bid.bidding) + parseInt(response.responseJSON.data.biayaApp);
							$('#ticket').html('#'+response.responseJSON.data.ticket);
							$('#biayaApp').html('Rp. '+response.responseJSON.data.biayaApp);
							$('#subTotal').html('Rp. '+subTotal);
							$('input[name=subTotal]').val(subTotal);
							$('#total').html('Rp. '+subTotal);
							var tbody	= '';
							
								tbody +='<tr>';  
                                  tbody +='<td>'+response.responseJSON.data.mitra.namaUsaha+'</td>';
                                  tbody +='<td class="text-center">Rp. '+response.responseJSON.data.bid.bidding+'</td>';
                                tbody +='</tr>';

							$('#items').html(tbody);
						}else if(response.status == 202){
							document.location.replace("{{ url('user/layanan') }}"); 
						}
					},
				dataType:'json'
				})
	
	};

	loadView();
	
	$('input[name=kupon]').bind("keyup", function(event){
		
		$.ajax({
					data: {"kupon" : $(this).val()},
					url: ServerUrl+"/api/couponVoucher",
					crossDomain: true,
					method: 'POST',
					complete: function(response){ 				
					if(response.status == 200){
							 
							if(response.responseJSON.data.status == 'valid'){
								var total = parseInt($('input[name=subTotal]').val()) - parseInt(response.responseJSON.data.potongan);
								$('#kodeKupon').html('- Rp. '+response.responseJSON.data.potongan);
								$('#total').html('Rp. '+total);
							}
						}else if(response.status == 202){
							
						}
					},
				dataType:'json'
				})
	
	});

	$("#midtrans").click( function () {
		$('#transfer').removeAttr('value');
         $(this).attr('value', 'midtrans');
	});
	
	$("#transfer").click( function () {
		$('#midtrans').removeAttr('value');
         $(this).attr('value', 'transfer');
	});

</script>




@endsection
