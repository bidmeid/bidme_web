@extends('layouts.frontend.app')
@section('content')
      <main>
         @include('layouts.frontend.partials.hero')
         <section class="services__area pt-100 pb-10 p-relative">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-8 offset-xxl-2 col-xl-10 offset-xl-1">
                     <div class="section__title-wrapper section__title-wrapper-3 text-center section-padding-3 mb-80 wow fadeInUp" data-wow-delay=".3s">
                        <span class="section__pre-title-img"><img class="lazyload" data-src="{{ asset('frontend/img/icon/title/services.png') }}" alt=""></span>
                        @if (session()->has('token'))
                            {{ session('token') }}
                        @endif
                        <h2 class="section__title section__title-3">{{ __('Tentang Kami Bidme Indonesia') }}</h2>
                        <p>{{ __('Bidme Indonesia adalah aplikasi booking servis motor dan mobil yang memudahkan kamu menemukan bengkel terdekat maupun layanan seperti ganti oli, ganti ban, dan tune-up') }}</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="price__area pt-10 pb-90">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
                     <div class="section__title-wrapper section__title-wrapper-3 section-padding-p-0 text-center mb-65 wow fadeInUp" data-wow-delay=".3s">
                        <span class="section__pre-title-img"><img class="lazyload" data-src="{{ asset('frontend/img/icon/title/price.png') }}" alt=""></span>
                        <h2 class="section__title section__title-3">{{ __('Mengapa harus booking bengkel di Bidme Indonesia ?') }}</h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                     <div class="price__item-3 white-bg mb-30 text-center fix">
                        <div class="price__heading free">
                           <h4>{{ __('Murah') }}</h4>
                        </div>
                        <div class="price__body">
                           <div class="price__icon mb-15">
                              <img class="lazyload" data-src="{{ asset('frontend/img/icon/pricing/home-3/pricing-1.png') }}" alt="">
                           </div>
                           <div class="price__features-2">
                              <ul>
                                 <li>{{ __('Harga transparan dan lebih murah dibandingkan bengkel resmi') }}</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                     <div class="price__item-3 white-bg mb-30 text-center fix">
                        <div class="price__heading basic">
                           <h4>{{ __('Terjamin') }}</h4>
                        </div>
                        <div class="price__body">
                           <div class="price__icon mb-15">
                              <img class="lazyload" data-src="{{ asset('frontend/img/icon/pricing/home-3/pricing-2.png') }}" alt="">
                           </div>
                           <div class="price__features-2">
                              <ul>
                                 <li>{{ __('Jaminan servis selama 3 hari untuk bengkel kami') }}</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                     <div class="price__item-3 white-bg mb-30 text-center fix">
                        <div class="price__heading premium">
                           <h4>{{ __('Fleksibel') }}</h4>
                        </div>
                        <div class="price__body">
                           <div class="price__icon mb-15">
                              <img class="lazyload" data-src="{{ asset('frontend/img/icon/pricing/home-3/pricing-3.png') }}" alt="">
                           </div>
                           <div class="price__features-2">
                              <ul>
                                 <li>{{ __('Metode pembayaran fleksibel baik online / offline') }}</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="about__area pt-20 pb-30 grey-bg-5">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-8 col-sm-10 order-last order-lg-first">
                     <div class="about__wrapper-3">
                        <div class="section__title-wrapper section__title-wrapper-3 mb-25 wow fadeInUp" data-wow-delay=".3s">
                           <span class="section__pre-title-img lazyload"><img data-src="{{ asset('frontend/img/icon/title/about.png') }}" alt=""></span>
                           <h2 class="section__title section__title-3">{{ __('Cara Mendaftar Bidme Indonesia') }}</h2>
                           <p>{{ __('Berikut ini panduan bagi sahabat bidme yang ingin mendaftar menjadi mitra Bidme Indonesia') }}</p>
                        </div>
                        <div class="about__content-4">
                           <ul>
                              <li>{{ __('Buka services.bidme.id atau unduh aplikasi Bidme di Play Store') }}</li>
                              <li>{{ __('Isikan nomor ponsel kamu') }}</li>
                              <li>{{ __('Tunggu kode verifikasi masuk ke nomor ponsel tersebut') }}</li>
                              <li>{{ __('Selamat, akun mu berhasil terdaftar') }}</li>
                           </ul>

                           <a href="#" class="w-btn w-btn-purple w-btn-6 w-btn-9 w-btn-1-3">{{ __('Mulai Sekarang') }}</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-6 offset-xxl-1 col-xl-6 col-lg-6 col-md-8 col-sm-10">
                     <div class="about__thumb-4 p-relative text-end">
                        <img class="mr-95 about-phone wow fadeInRight lazyload" data-wow-delay=".7s" data-src="{{ asset('frontend/img/about/home-3/about-phone.png') }}" alt="">
                        <img class="about-4-circle lazyload" data-src="{{ asset('frontend/img/about/home-3/about-circle.png') }}" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="platform__area pt-30 pb-110 grey-bg-5">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-6 offset-xxl-3">
                     <div class="section__title-wrapper section__title-wrapper-3 text-center mb-45 wow fadeInUp" data-wow-delay=".3s">
                        <span class="section__pre-title-img"><img class="lazyload" data-src="{{ asset('frontend/img/icon/title/platform.png') }}" alt=""></span>
                        <h2 class="section__title section__title-3">{{ __('Unduh Aplikasi Bidme Indonesia') }}</h2>
                        <p>{{ __('Aplikasi Bidme Indonesia bisa di unduh di Play Store Maupun App Stroe.') }}</p>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                     <div class="platform__item white-bg mb-30 text-center">
                        <h3 class="platform__title">{{ __('Unduh <br> dari Play Store') }}</h3>
                        <p>{{ __('Bidme untuk Android') }}</p>
                        <div class="platform__name">
                           <a href="#" class="app-store">
                              <div class="platform__name-wrapper d-flex align-items-center">
                                 <div class="platform__name-icon">
                                    <i class="fab fa-google-play"></i>
                                 </div>
                                 <div class="platform__name-content">
                                    <h5>{{ __('Available on the') }}</h5>
                                    <span>{{ __('App Store') }}</span>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                     <div class="platform__item white-bg mb-30 text-center">
                        <h3 class="platform__title">{{ _('Unduh <br> dari Apple Store') }}}</h3>
                        <p>{{ __('Bidme untuk iOS') }}</p>

                        <div class="platform__name">
                           <a href="#" class="apple-store">
                              <div class="platform__name-wrapper d-flex align-items-center">
                                 <div class="platform__name-icon">
                                    <i class="fab fa-apple"></i>
                                 </div>
                                 <div class="platform__name-content">
                                    <h5>{{ __('Available on the') }}</h5>
                                    <span>{{ __('Apple Store') }}</span>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="cta__area pb-140 p-relative">
            <div class="container">
               <div class="cta__inner-3 p-relative fix wow fadeInUp" data-wow-delay=".4s" data-background="{{ asset('frontend/img/cta/home-3/cta-3-bg.jpg') }}">
                  <div class="row align-items-center">
                     <div class="col-xxl-7 col-xl-8 col-lg-10 col-md-9">
                        <div class="cta__content-3">
                           <h3 class="cta__title cta__title-3">{{ __('Promo bidme khusus booking hari ini') }}</h3>
                           <p>{{ __('Dapatkan promo menarik bagi kamu yang melakukan booking bengkel di Bidme Indonesia hari ini') }}</p>
                        </div>
                     </div>
                     <div class="col-xxl-5 col-xl-4 col-lg-2 col-md-3">
                        <div class="cta__btn text-md-end">
                           <a href="contact.html" class="w-btn w-btn-white-3">{{ __('Lihat promo') }}</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="testimonial__area grey-bg-5 pb-175 overflow-y-visible">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-8 offset-xxl-2">
                     <div class="section__title-wrapper section__title-wrapper-3 text-center section-padding-4 mb-55 wow fadeInUp" data-wow-delay=".3s">
                        <span class="section__pre-title-img"><img class="lazyload" data-src="{{ asset('frontend/img/icon/title/testimonial.png') }}" alt=""></span>
                        <h2 class="section__title section__title-3 section-mb-15">{{ __('Apa kata mereka tentang Bidme Indonesia') }}</h2>
                        <p>{{ __('Ini kata mereka yang sudah menggunakan pelayanan Bidme Indonesia') }}</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="testimonial__slider-3 owl-carousel wow fadeInUp" data-wow-delay=".4s">
                        <div class="testimonial__item-3 white-bg mb-30">
                           <div class="rating">
                              <ul>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                              </ul>
                           </div>
                           <div class="testimonial__text-3">
                              <p>‘’Cobblers posh cras victoria sponge some dodgy chaverat barney only a quid, boot bubble and squeak wind up bits and boes bleeding up the duff brolly. ’’ </p>
                           </div>

                           <div class="testimonial__person d-flex align-items-center">
                              <div class="testimonial__avater mr-20">
                                 <img class="lazyload" data-src="{{ asset('frontend/img/testimonial/home-1/testi-1.png') }}" alt="">
                              </div>
                              <div class="testimonial__author-3">
                                 <h4>Hilary Ouse</h4>
                                 <span>Developer</span>
                              </div>
                           </div>
                        </div>
                        <div class="testimonial__item-3 white-bg mb-30">
                           <div class="rating">
                              <ul>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                              </ul>
                           </div>
                           <div class="testimonial__text-3">
                              <p>‘’Cobblers posh cras victoria sponge some dodgy chaverat barney only a quid, boot bubble and squeak wind up bits and boes bleeding up the duff brolly. ’’ </p>
                           </div>

                           <div class="testimonial__person d-flex align-items-center">
                              <div class="testimonial__avater mr-20">
                                 <img class="lazyload" data-src="{{ asset('frontend/img/testimonial/home-1/testi-2.png') }}" alt="">
                              </div>
                              <div class="testimonial__author-3">
                                 <h4>INNA Gomz</h4>
                                 <span>Designer</span>
                              </div>
                           </div>
                        </div>
                        <div class="testimonial__item-3 white-bg mb-30">
                           <div class="rating">
                              <ul>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                              </ul>
                           </div>
                           <div class="testimonial__text-3">
                              <p>‘’Cobblers posh cras victoria sponge some dodgy chaverat barney only a quid, boot bubble and squeak wind up bits and boes bleeding up the duff brolly. ’’ </p>
                           </div>

                           <div class="testimonial__person d-flex align-items-center">
                              <div class="testimonial__avater mr-20">
                                 <img class="lazyload" data-src="{{ asset('frontend/img/testimonial/home-1/testi-3.png') }}" alt="">
                              </div>
                              <div class="testimonial__author-3">
                                 <h4>Shahnewaz Sakil</h4>
                                 <span>Web Developer</span>
                              </div>
                           </div>
                        </div>
                        <div class="testimonial__item-3 white-bg mb-30">
                           <div class="rating">
                              <ul>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                              </ul>
                           </div>
                           <div class="testimonial__text-3">
                              <p>‘’Cobblers posh cras victoria sponge some dodgy chaverat barney only a quid, boot bubble and squeak wind up bits and boes bleeding up the duff brolly. ’’ </p>
                           </div>

                           <div class="testimonial__person d-flex align-items-center">
                              <div class="testimonial__avater mr-20">
                                 <img class="lazyload" data-src="{{ asset('frontend/img/testimonial/home-1/testi-4.png') }}" alt="">
                              </div>
                              <div class="testimonial__author-3">
                                 <h4>Charlie</h4>
                                 <span>Business Man</span>
                              </div>
                           </div>
                        </div>
                        <div class="testimonial__item-3 white-bg mb-30">
                           <div class="rating">
                              <ul>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                              </ul>
                           </div>
                           <div class="testimonial__text-3">
                              <p>‘’Cobblers posh cras victoria sponge some dodgy chaverat barney only a quid, boot bubble and squeak wind up bits and boes bleeding up the duff brolly. ’’ </p>
                           </div>

                           <div class="testimonial__person d-flex align-items-center">
                              <div class="testimonial__avater mr-20">
                                 <img class="lazyload" data-src="{{ asset('frontend/img/testimonial/home-1/testi-4.png') }}" alt="">
                              </div>
                              <div class="testimonial__author-3">
                                 <h4>Decaprio Helson</h4>
                                 <span>Digital Marketer</span>
                              </div>
                           </div>
                        </div>
                        <div class="testimonial__item-3 white-bg mb-30">
                           <div class="rating">
                              <ul>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                              </ul>
                           </div>
                           <div class="testimonial__text-3">
                              <p>‘’Cobblers posh cras victoria sponge some dodgy chaverat barney only a quid, boot bubble and squeak wind up bits and boes bleeding up the duff brolly. ’’ </p>
                           </div>

                           <div class="testimonial__person d-flex align-items-center">
                              <div class="testimonial__avater mr-20">
                                 <img class="lazyload" data-src="{{ asset('frontend/img/testimonial/home-1/testi-5.png') }}" alt="">
                              </div>
                              <div class="testimonial__author-3">
                                 <h4>Thomas Edison</h4>
                                 <span>Inventor</span>
                              </div>
                           </div>
                        </div>
                        <div class="testimonial__item-3 white-bg mb-30">
                           <div class="rating">
                              <ul>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                                 <li><i class="icon_star"></i></li>
                              </ul>
                           </div>
                           <div class="testimonial__text-3">
                              <p>‘’Cobblers posh cras victoria sponge some dodgy chaverat barney only a quid, boot bubble and squeak wind up bits and boes bleeding up the duff brolly. ’’ </p>
                           </div>

                           <div class="testimonial__person d-flex align-items-center">
                              <div class="testimonial__avater mr-20">
                                 <img class="lazyload" data-src="{{ asset('frontend/img/testimonial/home-1/testi-6.png') }}" alt="">
                              </div>
                              <div class="testimonial__author-3">
                                 <h4>Robert Downey Jr.</h4>
                                 <span>Inventor</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
@endsection