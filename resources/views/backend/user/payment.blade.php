@extends('layouts.backend.user.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Invoice</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Invoice</div>
        </div>
      </div>

      <div class="section-body">
        <div class="invoice">
          <div class="invoice-print">
            <div class="row">
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
                        Ujang Maman<br>
                        1234 Main<br>
                        Apt. 4B<br>
                        Bogor Barat, Indonesia
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong>Dikirim Ke:</strong><br>
                      Muhamad Nauval Azhar<br>
                      1234 Main<br>
                      Apt. 4B<br>
                      Bogor Barat, Indonesia
                    </address>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong>Payment Method:</strong><br>
                      Visa ending **** 4242<br>
                      ujang@maman.com
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong>Tanggal Order:</strong><br>
                      September 19, 2018<br><br>
                    </address>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-12">
                <div class="section-title">Ringkasan Pesanan</div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <tr>
                      <th data-width="40">#</th>
                      <th>Jenis Towing</th>
                      <th class="text-center">Harga</th>
                      <th class="text-center">Bantuan Orang</th>
                      <th class="text-right">Total</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Mobil Derek</td>
                      <td class="text-center">Rp. 500.000</td>
                      <td class="text-center">0</td>
                      <td class="text-right">Rp. 500.000</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
              <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
              <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
            </div>
            <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection