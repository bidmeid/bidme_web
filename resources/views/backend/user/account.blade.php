@extends('layouts.backend.user.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Riwayat Order</h4>
              </div>
              <div class="card-body">
                10
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Mitra Online</h4>
              </div>
              <div class="card-body">
                47
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Bidding</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <form action="{{ url('/user/payment') }}" method="GET">
                      <div class="card-deck">
                       <div class="card">
                         <img class="card-img-top" src="{{ asset('frontend/img/towing-3.jpg') }}" alt="Card image cap">
                         <div class="card-body">
                           <h5 class="card-title">Towing 1</h5>
                           <hr>
                           <p class="card-text"><span class="fw-bold">Harga: </span>Rp. 50.000</p>
                           <p class="card-text"><span class="fw-bold">Estimasi waktu: </span>5 Menit</p>
                           <hr>
                           <button class="btn btn-primary">Pilih Towing</button>
                         </div>
                       </div>
                     </div>
                </div>
                <div class="col-md-6 order-md-1">
                  <div class="card-deck">
                   <div class="card">
                     <img class="card-img-top" src="{{ asset('frontend/img/towing-1.jpg') }}" alt="Card image cap">
                     <div class="card-body">
                       <h5 class="card-title">Towing 2</h5>
                       <hr>
                       <p class="card-text"><span class="fw-bold">Harga: </span>Rp. 40.000</p>
                       <p class="card-text"><span class="fw-bold">Estimasi waktu: </span>8 Menit</p>
                       <hr>
                       <button class="btn btn-primary">Pilih Towing</button>
                     </div>
                   </div>
                 </div>
                </div>
              </div>
              <div class="bidding text-center">
                <h6>Mohon Tunggu...</h6>
                <p>Kami sedang mencarikan mitra terbaik untuk Anda</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Mitra Online</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="{{ asset('backend/user') }}/img/avatar/avatar-1.png" alt="avatar">
                  <div class="media-body">
                    <div class="float-right text-primary">Now</div>
                    <div class="media-title">Farhan A Mujib</div>
                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="{{ asset('backend/user') }}/img/avatar/avatar-2.png" alt="avatar">
                  <div class="media-body">
                    <div class="float-right">12m</div>
                    <div class="media-title">Ujang Maman</div>
                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="{{ asset('backend/user') }}/img/avatar/avatar-3.png" alt="avatar">
                  <div class="media-body">
                    <div class="float-right">17m</div>
                    <div class="media-title">Rizal Fakhri</div>
                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                  </div>
                </li>
              </ul>
              <div class="text-center pt-1 pb-1">
                <a href="#" class="btn btn-primary btn-lg btn-round">
                  Lihat semua
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
