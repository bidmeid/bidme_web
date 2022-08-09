@extends('layouts.frontend.app')
@section('content')
<main>
    <!-- page title area start -->
    <section class="page__title-area page__title-height d-flex align-items-center fix p-relative z-index-1" data-background="{{ asset('frontend/img/page-title/page-title.jpg') }}">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="page__title-wrapper text-center">
                   <h3>Contact | Bidme Indonesia</h3>
                      <nav aria-label="breadcrumb">
                         <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                         </ol>
                      </nav>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- page title area end -->

     <!-- contact area start  -->
     <section class="contact__area pb-150 p-relative z-index-1">
        <div class="container">
           <div class="row">
              <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                 <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                    <div class="row">
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                          <div class="contact__info pr-80">
                             <h4 class="contact__title">Butuh bantuan ?</h4>
                             <div class="contact__details mt-3">
                                <ul>
                                   <li>
                                      <h4>Lokasi Kami</h4>
                                      <p>Jalan sama aku,nikah sama dia </p>
                                   </li>
                                   <li>
                                      <h4>Alamat Email</h4>
                                      <p><a href="https://themepure.net/cdn-cgi/l/email-protection#95e6e0e5e5fae7e1f1f0e6fed5f2f8f4fcf9bbf6faf8"><span class="__cf_email__" data-cfemail="0f7c7a7f7f607d7b6b6a7c644f68626e6663216c6062">[admin@gmail.com]</span></a></p>
                                      <p><a href="https://themepure.net/cdn-cgi/l/email-protection#cda4a3aba2bfa0aca4a2a38daaa0aca4a1e3aea2a0"><span class="__cf_email__" data-cfemail="a0c9cec6cfd2cdc1c9cfcee0c7cdc1c9cc8ec3cfcd">[admin@gmail.com]</span></a></p>
                                   </li>
                                   <li>
                                      <h4>Nomor Telpon</h4>
                                      <p><a href="tel:+(046)-320-474-458">+ (+62 ) 320 474 458</a></p>
                                      <p><a href="tel:+(123)-213-147-897">+ (+62 ) 213 147 897</a></p>
                                   </li>
                                </ul>
                             </div>
                          </div>
                       </div>
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                          <div class="contact__form">
                             <form id="formContact">
                                @csrf
                                <input type="text" name="name" placeholder="Nama" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="subject" name="subject" placeholder="Subject">
                                <textarea name="message" placeholder="Pesan" required></textarea>
                                <button type="submit" class="w-btn w-btn-blue-5 w-btn-6 w-btn-14">Kirim Pesan</button>
                             </form>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- contact area end  -->

    <!-- contact support area start -->
    <section class="contact__support p-relative pb-110">
       <div class="contact__shape">
          <img src="{{ asset('frontend/img/contact/shape.png') }}" alt="">
       </div>
       <div class="container">
          <div class="row">
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="contact__item-inner hover__active mb-30">
                   <div class="contact__item text-center transition-3 white-bg">
                      <div class="contact__icon d-flex justify-content-center align-items-end">
                         <img src="{{ asset('frontend/img/contact/call.png') }}" alt="">
                      </div>
                      <div class="contact__content">
                         <h3 class="contact__title-2"><a href="#">Quick Answers</a></h3>
                         <p>Absolutely bladdered he  blimey guvnor agency. </p>
                         <a href="#" class="link-btn">Read More <i class="arrow_right"></i></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="contact__item-inner hover__active mb-30">
                   <div class="contact__item text-center transition-3 white-bg">
                      <div class="contact__icon d-flex justify-content-center align-items-end">
                         <img src="{{ asset('frontend/img/contact/message.png') }}" alt="">
                      </div>
                      <div class="contact__content">
                         <h3 class="contact__title-2"><a href="#">Customer Support</a></h3>
                         <p>Absolutely bladdered he  blimey guvnor agency. </p>
                         <a href="#" class="link-btn">Help & Support<i class="arrow_right"></i></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="contact__item-inner hover__active mb-30">
                   <div class="contact__item text-center transition-3 white-bg">
                      <div class="contact__icon d-flex justify-content-center align-items-end">
                         <img src="{{ asset('frontend/img/contact/social.png') }}" alt="">
                      </div>
                      <div class="contact__content">
                         <h3 class="contact__title-2"><a href="#">We are Social</a></h3>
                         <p>Absolutely bladdered he  blimey guvnor agency. </p>
                         <a href="#" class="link-btn">Join our Community<i class="arrow_right"></i></a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- contact support area end -->

    <!-- contact form area start -->
    {{-- <section class="contact__map">
       <div class="container-fluid p-0">
          <div class="row g-0">
             <div class="col-xxl-12">
                <div class="contact__map wow fadeInUp" data-wow-delay=".3s">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.4800810528923!2d90.36797221544877!3d23.837080434546706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c14a3366b005%3A0x901b07016468944c!2z4Kau4Ka_4Kaw4Kaq4KeB4KawIOCmoeCmvyzgppMs4KaP4KaH4KaaLOCmj-CmuCwg4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1615723408957!5m2!1sbn!2sbd"></iframe>
                </div>
             </div>
          </div>
       </div>
    </section> --}}
    <!-- contact form area end -->
 </main>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="{{ asset('frontend/js/vendor/jquery-3.5.1.min.js') }}"></script>
 <script>
   $('#formContact').submit(function(event){
    event.preventDefault();
    var form   = $(this)[0];
    var data   = new FormData(form);
    $.ajax({
       data    : data,
       url     : '{{ route('contactStore') }}',
       method  : 'POST',
       processData: false,
       contentType: false,
       cache      : false,

       complete: function(response){                
							  if(response.status == 200){
                        swal("Terimakasih", "Pesan Anda sudah terikirim", "success")
                        .then(() => {
                         window.location.replace('/');
                        });	 
							  }
							},
							dataType:'json'
    });
    
 })
</script>
@endsection