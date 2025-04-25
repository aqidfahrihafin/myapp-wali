<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/') }}">
    <img src="{{ asset('assets/img/demo-img/code.png') }}" alt="Logo">
  </a>
@endsection
@section('content')

<!-- Preloader -->
<div id="preloader">
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<!-- Internet Connection Status -->
<div class="internet-connection-status" id="internetStatus"></div>

<!-- Header Area sudah dipanggil dari partial -->

<!-- Page Content Wrapper -->
<div class="page-content-wrapper">

  <div class="pt-3"></div>

  <!-- Saldo Card -->
  <div class="container">
    <div class="card bg-primary mb-3 bg-img" style="background-image: url('{{ asset('assets/img/core-img/1.png') }}')">
      <div class="card-body direction-rtl p-4">
        <div class="row g-3">
          <div class="col-6">
            <div class="feature-card mx-auto text-right">
              <p class="mb-3 text-white">Total Saldo</p>
              <h6 class="text-white"><b>Rp. 50.000.000</b></h6>
            </div>
          </div>
          <div class="col-6 d-flex justify-content-end align-items-center">
            <div class="feature-card">
              <a href="#" class="btn text-white fw-bold shadow-lg px-3 py-2 d-flex align-items-center"
                 style="background: linear-gradient(45deg, #007bff, #00d4ff); border: none; border-radius: 50px;">
                <i class="bi bi-lightning-charge me-2"></i> Top Up
              </a>
            </div>
          </div>
        </div>
        <hr>
        <small class="mb-0 text-white">Selamat Datang di <b>B-Mall</b> PPA. Latee Annuqayah</small>
      </div>
    </div>
  </div>

  <!-- Menu Buttons -->
  <div class="container direction-rtl">
    <div class="mb-3">
      <div class="row g-2">
        <div class="col-4">
          <a href="#" class="btn w-100 p-2 shadow-sm border-0 d-flex flex-column align-items-center justify-content-center"
             style="border-radius: 5px; background: linear-gradient(135deg, #007bff, #00d4ff); color: white;">
            <i class="bi bi-cash-stack fs-4"></i>
            <span class="fw-bold mt-1" style="font-size: 12px;">Tarik</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="btn w-100 p-2 shadow-sm border-0 d-flex flex-column align-items-center justify-content-center"
             style="border-radius: 5px; background: linear-gradient(135deg, #28a745, #85e085); color: white;">
            <i class="bi bi-send-fill fs-4"></i>
            <span class="fw-bold mt-1" style="font-size: 12px;">Kirim</span>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="btn w-100 p-2 shadow-sm border-0 d-flex flex-column align-items-center justify-content-center"
             style="border-radius: 5px; background: linear-gradient(135deg, #ff9800, #ffcc80); color: white;">
            <i class="bi bi-credit-card-2-front-fill fs-4"></i>
            <span class="fw-bold mt-1" style="font-size: 12px;">Kartu</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Slider Artikel -->
  <div class="container">
    <div class="tiny-slider-two-wrapper">
      <div class="tiny-slider-two">
        <div>
          <div class="single-hero-slide bg-img bg-overlay" style="background-image: url('{{ asset('assets/img/bg-img/3.jpg') }}'); height: 120px;">
            <div class="h-100 d-flex align-items-center">
              <div class="slide-text">
                <p class="text-white">Kumpulan Artikel Ramadhan.</p>
                <a class="btn btn-creative btn-sm btn-warning" href="#">Read More</a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="single-hero-slide bg-img bg-overlay" style="background-image: url('{{ asset('assets/img/bg-img/6.jpg') }}'); height: 120px;">
            <div class="h-100 d-flex align-items-center">
              <div class="slide-text">
                <p class="text-white">Kumpulan Berita Ramadhan.</p>
                <a class="btn btn-creative btn-sm btn-warning" href="#">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="totaltnsDotsCount"></div>
    </div>
  </div>

  <!-- Tagihan Santri -->
  <div class="container">
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mt-3">
      <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-dark">Tagihan Santri</h6>
        <a href="#" class="text-primary fw-bold text-decoration-none"><small>Lihat Semua</small></a>
      </div>
      <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <a href="#" class="d-flex align-items-center text-decoration-none w-100">
              <i class="bi bi-cash-stack text-primary fs-5 me-3"></i>
              <div class="flex-grow-1">
                <strong>SPP</strong>
                <small class="text-muted d-block">Tahun ini</small>
              </div>
              <span class="badge bg-danger text-white p-2 rounded-pill">Rp. 500.000</span>
            </a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <a href="#" class="d-flex align-items-center text-decoration-none w-100">
              <i class="bi bi-heart-fill text-success fs-5 me-3"></i>
              <div class="flex-grow-1">
                <strong>Infaq Pesantren</strong>
                <small class="text-muted d-block">Bulan ini</small>
              </div>
              <span class="badge bg-success text-white p-2 rounded-pill">Rp. 50.000</span>
            </a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <a href="#" class="d-flex align-items-center text-decoration-none w-100">
              <i class="bi bi-lightning-fill text-warning fs-5 me-3"></i>
              <div class="flex-grow-1">
                <strong>Tagihan Listrik</strong>
                <small class="text-muted d-block">Minggu ini</small>
              </div>
              <span class="badge bg-warning text-dark p-2 rounded-pill">Rp. 150.000</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="pb-3"></div>
</div>

@endsection
