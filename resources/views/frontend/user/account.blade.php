@extends('layouts.frontend.app')
@section('content')
<main>

  @component('components.frontend.breadcrumb')
        @slot('breadcrumb')
        <div class="page__title-wrapper text-center">
         <h3>{{ __('Bidme | Bidding') }}</h3>
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="/">{{ __('Beranda') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Bidding') }}</li>
             </ol>
          </nav>
      </div>
        @endslot
    @endcomponent

    <!-- contact area start  -->
    <section class="contact__area pb-150 p-relative z-index-1">
      <div class="container">
         <div class="row">
            <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
               <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                  <div class="py-5 text-center">
                     <h2>Hallo, <?php echo $data['user']->name; ?></h2>
                     <p class="lead">Anda bisa mengedit akun dan melihat riwayat order disini</p>
                   </div>
                  <div class="row">
                     <div class="col-md-4 order-md-2 mb-4">
                       <h4 class="d-flex justify-content-between align-items-center mb-3">
                         <span class="text-muted">Pintasan</span>
                       </h4>
                       <ul class="list-group mb-3">
                         <li class="list-group-item d-flex justify-content-between lh-condensed">
                           <div>
                             <h6 class="my-0 text-success">Product name</h6>
                             <small class="text-muted">Brief description</small>
                           </div>
                           <span class="text-muted">$12</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between lh-condensed">
                           <div>
                             <h6 class="my-0">Second product</h6>
                             <small class="text-muted">Brief description</small>
                           </div>
                           <span class="text-muted">$8</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between lh-condensed">
                           <div>
                             <h6 class="my-0">Third item</h6>
                             <small class="text-muted">Brief description</small>
                           </div>
                           <span class="text-muted">$5</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between bg-light">
                           <div class="text-success">
                             <h6 class="my-0">Promo code</h6>
                             <small>EXAMPLECODE</small>
                           </div>
                           <span class="text-success">-$5</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between">
                           <span>Total (USD)</span>
                           <strong>$20</strong>
                         </li>
                       </ul>
                     </div>
                     <div class="col-md-8 order-md-1">
                       <h4 class="mb-3">Data diri</h4>
                       <form class="needs-validation" novalidate>          
                         <div class="mb-3">
                           <label for="email">Nama</label>
                           <input type="email" class="form-control" value="<?php echo $data['user']->name; ?>">
                           <div class="invalid-feedback">
                             Please enter a valid email address for shipping updates.
                           </div>
                         </div>
             
                         <div class="mb-3">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" value="<?php echo $data['user']->email; ?>" disabled>
                           <div class="invalid-feedback">
                             Please enter a valid email address for shipping updates.
                           </div>
                         </div>

                         <div class="mb-3">
                           <label for="email">No Telpon</label>
                           <input type="number" class="form-control" >
                           <div class="invalid-feedback">
                             Please enter a valid email address for shipping updates.
                           </div>
                         </div>
             
                         <div class="mb-3">
                           <label for="address">Address</label>
                           <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                           <div class="invalid-feedback">
                             Please enter your shipping address.
                           </div>
                         </div>
                         <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Perubahan</button>
                       </form>
                     </div>
                   </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection