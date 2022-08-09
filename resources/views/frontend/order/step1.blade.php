@extends('layouts.frontend.app')
@section('content')
<main>

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

     <!-- services area start -->
     <section class="services__area pt-70 pb-45">
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10">
                 <div class="section__title-wrapper section__title-wrapper-4 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="section__title section__title-4 section__title-4-p-2">{{ __('Order Bengkel Bidme Indonesia') }}</h2>
                    <p>{{ __('Kami siap membantu Anda') }}</p>
                 </div>
              </div>
           </div>
           <div class="row justify-content-center">
              <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 wow fadeInUp" data-wow-delay=".3s">
                 <div class="services__item-4 white-bg mb-30">
                    <div class="services__thumb-4 mb-3 text-center d-flex align-items-end justify-content-center">
                       <img class="lazyload" data-src="{{ asset('frontend/img/services/home-4/services-1.png') }}" alt="">
                    </div>
                    <div class="text-center">
                        <h3>{{ __('Beritahu kami lokasi Anda dan tujuan Anda') }}</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                     </div>
                    <form action="{{ route('next-order-step2') }}" method="GET">
                     <input name="latLongAsal" type="hidden" class="latlong">
                     <input name="asalPostcode" type="hidden" class="pos-code">
                     <div class="services__content-4 mt-2">
                           <div class="row mt-3">
                              <div class="col-md-3">
                                 <input type="radio" class="btn-check live-order" name="typeOrder" value="Live Order" id="warning-outlined" autocomplete="off" checked>
                                 <label class="btn btn-outline-warning d-flex" for="warning-outlined">{{ __('Order Towing Sekarang') }}</label>
                              </div>
                              <div class="col-md-4">
                                 <input type="radio" class="btn-check scheduled" name="typeOrder" id="success-outlined" autocomplete="off">
                                 <label class="btn btn-outline-success d-flex" for="success-outlined">{{ __('Jadwalkan Order Towing') }}</label>
                              </div>
                              <div class="col-md-3">
                                 <input type="date" class="form-control" name="orderDate" required>
                              </div>
                              <div class="col-md-2">
                                 <input type="time" class="form-control" name="orderTime" required>
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
                              <textarea name="detail-lokasi" class="form-control" id="detailLokasi" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                              <div class="form-group">
                              <label for="telp">{{ __('Nomor Telpon') }}</label>
                              <input name="telp" type="number" class="form-control">
                           </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="jenisKendaraan">{{ __('Pilih jenis kendaraan') }}</label>
                                 <select name="jenisKendaraan" class="form-control" id="jenisKendaraan">
                                   
                                 </select>
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="merekKendaraan">{{ __('Pilih merek kendaraan') }}</label>
                                 <select name="jenisKendaraanId" class="form-control" id="merekKendaraan">
          
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
            url: 'https://services.bidme.id/api/app/jenisKendaraan',
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
                  $('select[name=jenisKendaraan]').html(append);
                  getMerekKendaraan();
                  
               }else if(response.status == 401){
							 e('info','401 server conection error');
					}
            },
         });
      };

      function getMerekKendaraan(){
         $.ajax({
            url: 'https://services.bidme.id/api/app/typeKendaraan',
            method: 'GET',
            processData: false,
            contentType: false,
            cache: false,
            complete: (response) => {
               if(response.status == 200) {
                  let data = response.responseJSON.data.TypeKendaraan;
                  let append = '';
                  $.each(data, (k, v) => {
                     append +='<option value='+ v.merekKendaraanId +'>' + v.typeKendaraan + '</option>'
                  });
                  $('select[name=typeKendaraanId]').html(append);
                  getTyepKendaraan();
               }else if(response.status == 401){
						e('info','401 server conection error');
					}
            }
            
         });
      };

      function getTyepKendaraan(){
         $.ajax({
         url: 'https://services.bidme.id/api/app/merekKendaraan',
         method: 'GET',
         processData: false,
         contentType: false,
         cache: false,
         complete: (response) => {
            if(response.status == 200) {
               let data = response.responseJSON.data.MerekKendaraan;
               let append = '';
               $.each(data, (k, v) => {
                  append +='<option value='+ v.jenisKendaraanId +'>' + v.merekKendaraan + '</option>'
               });
               $('select[name=jenisKendaraanId]').html(append);
               getKondisiKendaraan();
            }else if(response.status == 401){
					e('info','401 server conection error');
				}
         }
         });
      }

      function getKondisiKendaraan(){
         $.ajax({
            url: 'https://services.bidme.id/api/app/kondisiKendaraan',
            method: 'GET',
            processData: false,
            contentType: false,
            cache: false,
            complete: (response) => {
               if(response.status == 200) {
                  let data = response.responseJSON.data.KondisiKendaraan;
                  let append = '';
                  $.each(data, (k, v) => {
                     append +='<option value='+ v.kondisiKendaraanId +'>' + v.kondisiKendaraan + '</option>'
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