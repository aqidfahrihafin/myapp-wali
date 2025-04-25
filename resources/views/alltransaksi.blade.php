<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('backButton')
  <a href="{{'/'}}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
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

 <!-- # Sidenav Left -->

 <div class="page-content-wrapper">

<div class="pt-3"></div>

<div class="container">
    <div class="mb-3 mt-0 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-dark">Data Transaksi</h6>
        <a href="{{'/'}}" class="text-primary fw-bold text-decoration-none"><small> Home</small></a>
    </div>

    <div class="card shadow-sm border-0 rounded-2 p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-dark d-flex align-items-center">
                <i class="bi bi-funnel-fill text-primary me-2"></i>filter
            </h6>
            <div class="d-flex gap-2">
                <!-- Dropdown Jenis Transaksi -->
                <select class="form-select form-select-sm shadow-sm border-light" style="max-width: 180px;">
                    <option selected>Semua Jenis</option>
                    <option value="1">SPP</option>
                    <option value="2">Tabungan</option>
                    <option value="3">Lainnya</option>
                </select>

                <!-- Dropdown Periode -->
                <select class="form-select form-select-sm shadow-sm border-light" style="max-width: 180px;">
                    <option selected>Semua Waktu</option>
                    <option value="1">Bulan Ini</option>
                    <option value="2">Tahun Ini</option>
                    <option value="3">Custom</option>
                </select>
            </div>
        </div>
    </div>


    <div class="card shadow-sm border-0 rounded-2 overflow-hidden mt-3">
        <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <a href="{{ url('/transaksi/spp') }}" class="d-flex align-items-center text-decoration-none w-100">
                        <i class="bi bi-cash-stack text-danger fs-5 me-3"></i>
                        <div class="flex-grow-1">
                            <strong class="text-danger">SPP</strong>
                            <small class="text-muted d-block">Saldo Keluar</small>
                        </div>
                        <span class="badge bg-danger text-white p-2 rounded-pill">Rp. 500.000</span>
                    </a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <a href="{{ url('/transaksi/topup') }}" class="d-flex align-items-center text-decoration-none w-100">
                        <i class="bi bi-heart-fill text-success fs-5 me-3"></i>
                        <div class="flex-grow-1">
                            <strong class="text-success">Top Up</strong>
                            <small class="text-muted d-block">Saldo Masuk</small>
                        </div>
                        <span class="badge bg-success text-white p-2 rounded-pill">Rp. 700.000</span>
                    </a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <a href="{{ url('/transaksi/tabungan') }}" class="d-flex align-items-center text-decoration-none w-100">
                        <i class="bi bi-lightning-fill text-warning fs-5 me-3"></i>
                        <div class="flex-grow-1">
                            <strong class="text-warning">Tabungan</strong>
                            <small class="text-muted d-block">Tabungan Santri</small>
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