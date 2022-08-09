@extends('layouts.frontend.app')
@section('content')
<main>
    @component('components.frontend.breadcrumb')
        @slot('breadcrumb')
        <div class="page__title-wrapper text-center">
         <h3>Jadilah bagian dari Bidme Indonesia</h3>
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mitra</li>
             </ol>
          </nav>
      </div>
        @endslot
    @endcomponent
    
     <section class="services__area grey-bg-3 pt-50 pb-90 p-relative">
        <div class="services__shape-2">
           <img class="services-2-circle" src="{{ asset('frontend/img/icon/services/home-2/services-circle.png') }}" alt="">
           <img class="services-2-circle-2" src="{{ asset('frontend/img/icon/services/home-2/services-circle-2.png') }}" alt="">
        </div>
        <div class="container">
           <div class="row align-items-end">
              <div class="col-xxl-4 col-lg-12 col-md-12 text-center">
                 <div class="section__title-wrapper mb-70 wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="section__title section__title-2">Pilih jenis layanan yang sesuai kebutuhan <br> usaha Anda </h2>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                 <div class="services__inner services__inner-2 hover__active mb-30">
                    <div class="services__item-2 transition-3 white-bg ">
                       <div class="services__icon-2">
                          <img src="{{ asset('frontend/img/icon/services/home-2/services-mobil.png') }}" width="50" alt="">
                       </div>
                       <div class="services__content-2">
                          <h3 class="services__title-2"><a href="services-details.html">Bengkel Mobil</a></h3>
                          <p>Absolutely bladdered he  blimey guvnor agency. </p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                 <div class="services__inner services__inner-2 hover__active active mb-30">
                    <div class="services__item-2 transition-3 white-bg ">
                       <div class="services__icon-2">
                          <img src="{{ asset('frontend/img/icon/services/home-2/services-motor.png') }}" width="50" alt="">
                       </div>
                       <div class="services__content-2">
                          <h3 class="services__title-2"><a href="services-details.html">Bengkel Motor</a></h3>
                          <p>Absolutely bladdered he  blimey guvnor agency. </p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                 <div class="services__inner services__inner-2 hover__active mb-30">
                    <div class="services__item-2  transition-3 white-bg">
                       <div class="services__icon-2">
                          <img src="{{ asset('frontend/img/icon/services/home-2/services-3.png') }}" alt="">
                       </div>
                       <div class="services__content-2">
                          <h3 class="services__title-2"><a href="services-details.html">OptimalSort</a></h3>
                          <p>Absolutely bladdered he  blimey guvnor agency. </p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="col-xxl-8 col-lg-7 col-md-5">
            <div class="services__more mb-70 text-sm-end">
               <a href="services.html" class="w-btn w-btn-blue w-btn-6 w-btn-3">view all features</a>
            </div>
         </div>
        </div>
     </section>
     <!-- services area end -->

     <!-- features area start -->
     <section class="features__area pt-80 pb-70 p-relative overflow-y-visible">
        <div class="circle-animation features">
           <span></span>
        </div>
        <div class="features__shape">
           <img class="features-circle-1" src="{{ asset('frontend/img/icon/features/home-1/circle-1.png') }}" alt="">
        </div>
        <div class="container">
           <div class="row">
              <div class="col-xxl-6 col-xl-6 col-lg-6">
                 <div class="section__title-wrapper mb-65 wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="section__title">Software is Easy Prototyping Features.</h2>
                    <p>Over the last few years, podcasts have become a role in the online landscape.</p>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                 <div class="features__item mb-30 wow fadeInUp" data-wow-delay=".3s">
                    <div class="features__icon mb-35">
                       <span class="gradient-pink"><i class="far fa-heart-rate"></i></span>
                    </div>
                    <h3 class="features__title">API management</h3>
                    <div class="features__list">
                       <ul>
                          <li>Secure Access</li>
                          <li>Connectivity</li>
                          <li>Engagement</li>
                          <li>Secure Access</li>
                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                 <div class="features__item mb-30 wow fadeInUp pl-15" data-wow-delay=".5s">
                    <div class="features__icon mb-35">
                       <span class="gradient-blue"><i class="fal fa-chart-pie-alt"></i></span>
                    </div>
                    <h3 class="features__title">Scheduled Reports</h3>
                    <div class="features__list">
                       <ul>
                          <li>Publish anywhere </li>
                          <li>Influencer</li>
                          <li>Content Creation</li>
                          <li>Prepare your brand</li>
                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                 <div class="features__item mb-30 wow fadeInUp pl-45" data-wow-delay=".7s">
                    <div class="features__icon mb-35">
                       <span class="gradient-yellow"><i class="fal fa-tag"></i></span>
                    </div>
                    <h3 class="features__title">Compliance Controls</h3>
                    <div class="features__list">
                       <ul>
                          <li>Animations</li>
                          <li>3D Viewer</li>
                          <li>Creation</li>
                          <li>Packaging Designer </li>
                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 d-lg-flex justify-content-end">
                 <div class="features__item mb-30 wow fadeInUp" data-wow-delay=".9s">
                    <div class="features__icon mb-35">
                       <span class="gradient-purple"><i class="fal fa-layer-group"></i></span>
                    </div>
                    <h3 class="features__title">Authentication</h3>
                    <div class="features__list">
                       <ul>
                          <li>Print Templates</li>
                          <li>Mockups</li>
                          <li>Statement</li>
                          <li>Recruitment</li>
                       </ul>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
  </main>
@endsection