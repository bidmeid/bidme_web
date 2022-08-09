<section class="hero__area hero__height-3 hero__bg p-relative d-flex align-items-center" data-background="{{ asset('frontend/img/hero/home-3/hero-bg.jpg') }}">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
             <div class="hero__thumb-3 ">
                <img class="hero-phone wow fadeInLeft lazyload" data-wow-delay=".3s" data-src="{{ asset('frontend/img/hero/home-3/hero-phone.png') }}" alt="">
                <img class="hero-3-gradient lazyload" data-src="{{ asset('frontend/img/icon/hero/home-3/hero-gradient-circle.png') }}" alt="">
                <img class="hero-3-dot-2 lazyload" data-src="{{ asset('frontend/img/icon/hero/home-3/hero-dot-2.png') }}" alt="">
             </div>
          </div>
          <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-6">
             <div class="hero__content-3 mb-100 pl-70">
                <h3 class="hero__title-3 wow fadeInUp" data-wow-delay=".3s">{{ __('Aplikasi untuk Perangkat Anda') }}</h3>
                <p class="wow fadeInUp" data-wow-delay=".5s">{{ __('Dapatkan aplikasi untuk perangkat Anda. Semua pelayanan dalam satu genggaman') }}</p>

                <div class="hero__app wow fadeInUp" data-wow-delay=".7s">
                   <ul>
                      <li>
                         <a href="#" class="d-flex align-items-center active">
                            <div class="hero__app-icon">
                               <i class="fab fa-google-play"></i>
                            </div>
                            <div class="hero__app-content">
                               <h5>{{ __('Available on the') }}</h5>
                               <span>{{ __('App Store') }}</span>
                            </div>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex align-items-center">
                            <div class="hero__app-icon">
                               <i class="fab fa-apple"></i>
                            </div>
                            <div class="hero__app-content">
                               <h5>{{ __('Available on the') }}</h5>
                               <span>{{ __('Apple Store') }}</span>
                            </div>
                         </a>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>