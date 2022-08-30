@extends('layouts.frontend.app')
@section('content')
<main>

  @component('components.frontend.breadcrumb')
  @slot('breadcrumb')
  <div class="page__title-wrapper text-center">
   <h3>{{ __('Bidme | Pembayaran') }}</h3>
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="/">{{ __('Beranda') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Pembayaran') }}</li>
       </ol>
    </nav>
  </div>
  @endslot
  @endcomponent

    <!-- contact area start  -->
    <section class="contact__area pb-150 p-relative z-index-1">
      <div class="container">
            <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
               <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                  <div class="py-5 text-center">
                     <img class="d-block mx-auto mb-4 rounded-circle" src="{{ asset('frontend/img/avatar/avatar-5.png') }}" alt="" width="72" height="72">
                     <h2>Umaedi KH</h2>
                     <p class="lead">Berikut rincian order dan pembyaran Anda</p>
                   </div>
                   <div class="section-body">
                    <div class="invoice">
                      <div class="invoice-print">
                        <div class="row">
                            <hr>
                          <div class="col-lg-12">
                            <div class="invoice-title">
                              <h2>Invoice</h2>
                              <div class="invoice-number">Order #12345</div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-6">
                                <address>
                                  <strong>Ditagih Ke:</strong><br>
                                    Umaedi<br>
                                    Tiuh Tohou Tulang Bawang
                                </address>
                              </div>
                              <div class="col-md-6 text-right">
                                <address>
                                  <strong>Tanggal Order:</strong><br>
                                  Juli 14, 2022<br><br>
                                </address>
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="section-title">Rincian Order</div>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-md">
                                <tr>
                                  <th data-width="40">#</th>
                                  <th>Jasa towing</th>
                                  <th class="text-center">Harga</th>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>Towing mobil</td>
                                  <td class="text-center">Rp. 50.000</td>
                                </tr>
                              </table>
                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-8">
                                <div class="section-title">Metode pembayaran</div>
                                <p class="section-lead">Metode pembayaran yang kami berikan adalah untuk memudahkan Anda dalam melakukan pembayaran tagihan.</p>
                                <div class="d-flex">
                                  <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                                  <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                                  <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                                  <div class="bg-paypal" data-width="61" data-height="38"></div>
                                </div>
                              </div>
                              <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Subtotal</div>
                                  <div class="invoice-detail-value">Rp. 50.000</div>
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                  <div class="invoice-detail-name">Total</div>
                                  <div class="invoice-detail-value invoice-detail-value-lg">Rp. 50.000</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                          <button id="pay-button" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Proses pembayaran</button>
                          <a href="/order" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Batal</a>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
      </div>
   </section>
   <!-- contact area end  -->
</main>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-J7cekns-oASkj5b7">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result)
      },
      onPending: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result)
      },
      onError: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result)
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });
</script>
@endsection
