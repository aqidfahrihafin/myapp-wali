<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Affan - PWA Mobile HTML Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#0134d4">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <style>
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15);
    }
    </style>
  <!-- Title -->
  <title>B-Mall</title>

  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/core-img/favicon.ico')}}">
  <link rel="apple-touch-icon" href="{{asset('assets/img/icons/icon-96x96.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/icons/icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="167x167" href="{{asset('assets/img/icons/icon-167x167.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/icons/icon-180x180.png')}}">

  <!-- Style CSS -->
  <link rel="stylesheet" href="{{asset('assets/style.css')}}">

  <!-- Web App Manifest -->
  <link rel="manifest" href="{{asset('assets/manifest.json')}}">
</head>

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
                        <a href="#" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi bi-cash-stack text-danger fs-5 me-3"></i>
                            <div class="flex-grow-1">
                                <strong class="text-danger">SPP</strong>
                                <small class="text-muted d-block">Saldo Keluar</small>
                            </div>
                            <span class="badge bg-danger text-white p-2 rounded-pill">Rp. 500.000</span>
                        </a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi bi-heart-fill text-success fs-5 me-3"></i>
                            <div class="flex-grow-1">
                                <strong class="text-success">Top Up</strong>
                                <small class="text-muted d-block">Saldo Masuk</small>
                            </div>
                            <span class="badge bg-success text-white p-2 rounded-pill">Rp. 700.000</span>
                        </a>
                    </li>
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

  <!-- Footer Nav -->
  <div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
      <!-- Footer Content -->
      <div class="footer-nav position-relative">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
          <li class="active">
            <a href="{{'/'}}">
              <i class="bi bi-house"></i>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="{{'/profile'}}">
              <i class="bi bi-people"></i>
              <span>Data Santri</span>
            </a>
          </li>

          <li>
            <a href="{{'topup'}}">
              <i class="bi bi-wallet2"></i>
              <span>Top Up</span>
            </a>
          </li>

          <li>
            <a href="{{'/alltransaksi'}}">
              <i class="bi bi-collection"></i>
              <span>Transaksi</span>
            </a>
          </li>

          <li>
            <a href="{{'/setting'}}">
              <i class="bi bi-gear"></i>
              <span>Settings</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- All JavaScript Files -->
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/slideToggle.min.js')}}"></script>
  <script src="{{asset('assets/js/internet-status.js')}}"></script>
  <script src="{{asset('assets/js/tiny-slider.js')}}"></script>
  <script src="{{asset('assets/js/venobox.min.js')}}"></script>
  <script src="{{asset('assets/js/countdown.js')}}"></script>
  <script src="{{asset('assets/js/rangeslider.min.js')}}"></script>
  <script src="{{asset('assets/js/vanilla-dataTables.min.js')}}"></script>
  <script src="{{asset('assets/js/index.js')}}"></script>
  <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/js/dark-rtl.js')}}"></script>
  <script src="{{asset('assets/js/active.js')}}"></script>
  <script src="{{asset('assets/js/pwa.js')}}"></script>
</body>

</html>
