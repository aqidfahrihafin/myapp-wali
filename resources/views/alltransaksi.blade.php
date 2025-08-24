@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/') }}">
    <img src="{{ asset('assets/img/demo-img/code.png') }}" alt="Logo">
  </a>
@endsection

@section('content')
<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="spinner-grow text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <!-- Internet Connection Status -->
  <div class="internet-connection-status" id="internetStatus"></div>

  <!-- Header Area -->
  <div class="header-area" id="headerArea">
    <div class="container">
      <!-- Header Content -->
      <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper -->
        <div class="logo-wrapper">
            <a href="{{'/'}}">
              <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
            </a>
          </div>

        <!-- Navbar Toggler -->
        <div class="user-profile logo-wrapper">
            <a href="home.html">
                <img class="img-circle" src="{{ asset('assets/img/bg-img/user1.png') }}" alt="" style="height: 50px; border-radius: 50%; object-fit: cover;">
            </a>
        </div>
      </div>
    </div>
  </div>

  <!-- # Sidenav Left -->

  <div class="page-content-wrapper">

    <div class="pt-3"></div>

    <div class="container">
        <div class="mb-3 mt-0 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-dark">Data Transaksi</h6>
            <a href="#" class="text-primary fw-bold text-decoration-none"><small> Home</small></a>
        </div>

        <div class="card shadow-sm border-0 rounded-2 p-3">
            <form method="GET" action="{{ route('transaksi.index') }}">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 text-dark d-flex align-items-center">
                        <i class="bi bi-funnel-fill text-primary me-2"></i>Filter
                    </h6>
                    <div class="d-flex gap-2">
                        <!-- Dropdown Jenis Transaksi -->
                        <select name="jenis" class="form-select form-select-sm shadow-sm border-light" style="max-width: 180px;" onchange="this.form.submit()">
                            <option value="">Semua Jenis</option>
                            <option value="spp" {{ request('jenis')=='spp' ? 'selected' : '' }}>SPP</option>
                            <option value="Tabungan" {{ request('jenis')=='Tabungan' ? 'selected' : '' }}>Tabungan</option>
                            <option value="topup" {{ request('jenis')=='topup' ? 'selected' : '' }}>Topup</option>
                            <option value="Kirim" {{ request('jenis')=='Kirim' ? 'selected' : '' }}>Kirim</option>
                            <option value="Terima" {{ request('jenis')=='Terima' ? 'selected' : '' }}>Terima</option>
                            
                        </select>

                        <!-- Dropdown Periode -->
                        <select name="periode" class="form-select form-select-sm shadow-sm border-light" style="max-width: 180px;" onchange="this.form.submit()">
                            <option value="">Semua Waktu</option>
                            <option value="bulan" {{ request('periode')=='bulan' ? 'selected' : '' }}>Bulan Ini</option>
                            <option value="tahun" {{ request('periode')=='tahun' ? 'selected' : '' }}>Tahun Ini</option>
                            <option value="custom" {{ request('periode')=='custom' ? 'selected' : '' }}>Custom</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>



        <div class="card shadow-sm border-0 rounded-2 overflow-hidden mt-3">
            <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
                <ul class="list-group list-group-flush">
                    @foreach ($riwayat as $item)
                    @if ($item->tipe=='Masuk')
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi bi-heart-fill text-success fs-5 me-3"></i>
                            <div class="flex-grow-1">
                                <strong class="text-success">{{ $item->jenis }} </strong>
                                <small class="text-muted d-block">Saldo Masuk</small>
                            </div>
                            <span class="badge bg-success text-white p-2 rounded-pill">Rp. {{ number_format($item->jumlah) }}</span>
                        </a>
                    </li>
                    @elseif ($item->tipe=='Keluar')
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi bi-cash-stack text-danger fs-5 me-3"></i>
                            <div class="flex-grow-1">
                                <strong class="text-danger">{{ $item->jenis }}</strong>
                                <small class="text-muted d-block">Saldo Keluar</small>
                            </div>
                            <span class="badge bg-danger text-white p-2 rounded-pill">Rp. {{ number_format($item->jumlah) }}</span>
                        </a>
                    </li>
                    @endif  
                    @endforeach
                    
              
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none w-100">
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
