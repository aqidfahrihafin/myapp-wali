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
            <a href="{{ url('/') }}">
              <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
            </a>
          </div>

        <!-- Navbar Toggler -->
        <div class="user-profile logo-wrapper">
            <a href="{{ url('/') }}">
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
            <a href="{{ url('/') }}" class="text-primary fw-bold text-decoration-none"><small> Home</small></a>
        </div>

        <!-- Filter -->
        <div class="card shadow-sm border-0 rounded-2 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-dark d-flex align-items-center">
                    <i class="bi bi-funnel-fill text-primary me-2"></i>Filter
                </h6>
                <div class="d-flex gap-2">
                    <!-- Dropdown Jenis Transaksi -->
                    <select class="form-select form-select-sm shadow-sm border-light" style="max-width: 180px;">
                        <option selected>Semua Jenis</option>
                        <option value="spp">SPP</option>
                        <option value="tabungan">Tabungan</option>
                        <option value="lainnya">Lainnya</option>
                    </select>

                    <!-- Dropdown Periode -->
                    <select class="form-select form-select-sm shadow-sm border-light" style="max-width: 180px;">
                        <option selected>Semua Waktu</option>
                        <option value="bulan">Bulan Ini</option>
                        <option value="tahun">Tahun Ini</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- List Transaksi -->
        <div class="card shadow-sm border-0 rounded-2 overflow-hidden mt-3">
            <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
                <ul class="list-group list-group-flush">
                  @forelse($riwayat as $r)
                    @php
                      $jenis = strtolower($r->jenis ?? 'lainnya');   // spp | topup | tabungan
                      $tipe  = strtolower($r->tipe ?? 'keluar');     // masuk | keluar
                      $badgeClass = $tipe === 'masuk' ? 'bg-success' : 'bg-danger';
                      $iconClass  = $tipe === 'masuk' ? 'bi-heart-fill text-success'
                                    : ($jenis === 'spp' ? 'bi-cash-stack text-danger' : 'bi-lightning-fill text-warning');
                    @endphp

                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="{{ route('transaksi.show', $r->id) }}" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi {{ $iconClass }} fs-5 me-3"></i>
                            <div class="flex-grow-1">
                                <strong class="{{ $tipe === 'masuk' ? 'text-success' : ($jenis === 'spp' ? 'text-danger' : 'text-warning') }}">
                                    {{ strtoupper($r->judul ?? $r->jenis ?? 'TRANSAKSI') }}
                                </strong>
                                <small class="text-muted d-block">{{ ucfirst($tipe) }}</small>
                            </div>
                            <span class="badge {{ $badgeClass }} text-white p-2 rounded-pill">
                                Rp. {{ number_format((int)($r->jumlah ?? 0), 0, ',', '.') }}
                            </span>
                        </a>
                    </li>
                  @empty
                    <li class="list-group-item text-center text-muted">Tidak ada data transaksi</li>
                  @endforelse
                </ul>
            </div>
        </div>
    </div>

    <div class="pb-3"></div>
  </div>

  <!-- All JavaScript Files -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/slideToggle.min.js') }}"></script>
  <script src="{{ asset('assets/js/internet-status.js') }}"></script>
  <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
  <script src="{{ asset('assets/js/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/js/countdown.js') }}"></script>
  <script src="{{ asset('assets/js/rangeslider.min.js') }}"></script>
  <script src="{{ asset('assets/js/vanilla-dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/index.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/dark-rtl.js') }}"></script>
  <script src="{{ asset('assets/js/active.js') }}"></script>
  <script src="{{ asset('assets/js/pwa.js') }}"></script>
</body>

@endsection
