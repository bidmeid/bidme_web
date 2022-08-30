@extends('layouts.frontend.app')
@section('content')
<main>

   
     <!-- services area start -->
     <section class="services__area pt-70 pb-45">
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10">
                 <div class="section__title-wrapper section__title-wrapper-4 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="section__title section__title-4 section__title-4-p-2">{{ __('Order Mobil Derek Indonesia') }}</h2>
                    <p>{{ __('Beritahu kami lokasi dan tujuan Anda') }}</p>
                 </div>
              </div>
           </div>
           <div class="row justify-content-center">
              <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 wow fadeInUp" data-wow-delay=".3s">
                 <div class="services__item-4 white-bg mb-30">
                    
                    <form action="{{ route('next-order-step2') }}" method="GET">
                     <input name="latLongAsal" type="hidden" class="latlong">
                     <input name="asalPostcode" type="hidden" class="pos-code">
                     <div class="services__content-4 mt-2">
                           <div class="row mt-3">
                              <div class="col-md-3">
                                 <input type="radio" class="btn-check live-order" name="orderType" value="Live Order" id="warning-outlined" autocomplete="off" checked>
                                 <label class="btn btn-outline-warning d-flex" for="warning-outlined">{{ __('Order Towing Sekarang') }}</label>
                              </div>
                              <div class="col-md-4">
                                 <input type="radio" class="btn-check scheduled" name="orderType" id="success-outlined" autocomplete="off">
                                 <label class="btn btn-outline-success d-flex" for="success-outlined">{{ __('Jadwalkan Order Towing') }}</label>
                              </div>
                              <div class="col-md-3">
                                 <input type="date" class="form-control" name="orderDate" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d'); ?>" required>
                              </div>
                              <div class="col-md-2">
                                 <input type="time" class="form-control" name="orderTime" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i:s'); ?>" required>
                              </div>
                             </div>

                           <div class="my-3">
                              <div class="form-group">
                                 <label for="alamatAsal">{{ __('Lokasi Jemput') }}</label>
                                 <input name="alamatAsal" type="text" class="form-control mb-3" id="start-search" placeholder="" required>
                              </div>
                           <div id="map"></div>
                           <div class="form-group my-3">
                              <label for="detailLokasi">{{ __('Tambahkan detail lokasi (nama gedung, jalan dll)') }}</label>
                              <textarea name="detailAsal" class="form-control" id="detailLokasi" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                              <div class="form-group">
                              <label for="telp">{{ __('Nomor Telpon') }}</label>
                              <input name="noTelp" type="number" class="form-control" value="<?php if(isset($data['user']->no_telp)){ echo $data['user']->no_telp; }?>">
                           </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="jenisKendaraan">{{ __('Pilih jenis kendaraan') }}</label>
                                 <select name="jenisKendaraanId" class="form-control" id="jenisKendaraan">
                                   
                                 </select>
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="merekKendaraan">{{ __('Pilih merek kendaraan') }}</label>
                                 <select name="merekKendaraanId" class="form-control" id="merekKendaraan">
          
                                 </select>
                               </div>
                           </div>
                          </div>
                        <div class="row mt-3">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="typeKendaraanId">{{ __('Pilih type kendaraan') }}</label>
                                 <select name="typeKendaraanId" class="form-control" id="typeKendaraanId">
             
                                 </select>
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="kondisiKendaraanId">{{ __('Kondisi Kendaraan') }}</label>
                                 <select name="kondisiKendaraanId" class="form-control" id="kondisiKendaraanId">
           
                                 </select>
                               </div>
                           </div>
                          </div>
                        <button type="submit" id="btn-order" class="w-btn w-btn-purple mt-3">{{ __('Selanjutnya') }}</button>
                     </form>
                 </div>
              </div>
            </div>
        </div>
     </section>
  </main>
@endsection

@push('js')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD8y5ZQcuol7vxOkXii_wsHqYhCNL0uEM&libraries=places&callback=initialize"></script>
<script src="{{ asset('frontend/js/gmap.js') }}"></script>
<script>
      function getJenisKendaraan(){
         $.ajax({
            url: ServerUrl+'/api/app/jenisKendaraan',
            method: 'GET',
            processData: false,
            contentType: false,
            cache: false,
            complete: (response) => {
               if(response.status == 200) {
                  let data = response.responseJSON.data.JenisKendaraan;
                  let append = '';
                  $.each(data, (k, v) => {
                     append +='<option value='+ v.id +'>' + v.jenisKendaraan + '</option>'
                  });
                  $('select[name=jenisKendaraanId]').html(append);
                  getMerekKendaraan();
                  
               }else if(response.status == 401){
							 e('info','401 server conection error');
					}
            },
         });
      };

      function getMerekKendaraan(){
         $.ajax({
            url: ServerUrl+'/api/app/merekKendaraan',
            method: 'GET',
            processData: false,
            contentType: false,
            cache: false,
            complete: (response) => {
               if(response.status == 200) {
                  let data = response.responseJSON.data.MerekKendaraan;
                  let append = '';
				  append += '<option>Pilih Merek Kendaraan</option>';
                  $.each(data, (k, v) => {
                     append +='<option value='+ v.id +'>' + v.merekKendaraan + '</option>'
                  });
                  $('select[name=merekKendaraanId]').html(append);
                   
               }else if(response.status == 401){
						e('info','401 server conection error');
					}
            }
            
         });
      };
	$("select[name=merekKendaraanId]").on("change", function() {
         $.ajax({
         url: ServerUrl+'/api/app/typeKendaraan',
         method: 'GET',
		 data: {'merek' : $(this).find('option:selected').val()},
         complete: (response) => {
            if(response.status == 200) {
               let data = response.responseJSON.data.TypeKendaraan;
               var append = '';
               
               $.each(data, (k, v) => {
                  append +='<option value='+ v.id +'>' + v.typeKendaraan + '</option>'
               });
               $('select[name=typeKendaraanId]').html(append);
               getKondisiKendaraan();
            }else if(response.status == 401){
					e('info','401 server conection error');
				}
         }
         });
      });

      function getKondisiKendaraan(){
         $.ajax({
            url: ServerUrl+'/api/app/kondisiKendaraan',
            method: 'GET',
            processData: false,
            contentType: false,
            cache: false,
            complete: (response) => {
               if(response.status == 200) {
                  let data = response.responseJSON.data.KondisiKendaraan;
                  let append = '';
                  $.each(data, (k, v) => {
                     append +='<option value='+ v.id +'>' + v.kondisiKendaraan + '</option>'
                  });
                  $('select[name=kondisiKendaraanId]').html(append);
               }
            }
         });
      }
      getJenisKendaraan();

      //type order
      $('.btn-outline-success').on('click', () => {
         $('.live-order').removeAttr('value');
         $('.scheduled').attr('value', 'Scheduled');
      });

      $('.btn-outline-warning').on('click', () => {
         $('.live-order').attr('value', 'Live Order');
         $('.scheduled').removeAttr('value');
      });
</script>
@endpush