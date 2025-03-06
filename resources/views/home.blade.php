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
          <a href="home.html">
            <img src="{{asset('assets/img/demo-img/code.png')}}" alt="">
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


    <!-- Tiny Slider One Wrapper -->


    <div class="pt-3"></div>


    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('{{asset('assets/img/core-img/1.png')}}')">
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

    <div class="container direction-rtl">
      <div class="mb-3">
            <div class="row g-2">
                <div class="col-4">
                    <a href="#" class="btn w-100 p-2 shadow-sm border-0 d-flex flex-column align-items-center justify-content-center"
                       style="border-radius: 5px; background: linear-gradient(135deg, #007bff, #00d4ff); color: white; transition: transform 0.2s, box-shadow 0.2s;">
                        <i class="bi bi-cash-stack fs-4"></i>
                        <span class="fw-bold mt-1" style="font-size: 12px;">Tarik</span>
                    </a>
                </div>

                <div class="col-4">
                    <a href="#" class="btn w-100 p-2 shadow-sm border-0 d-flex flex-column align-items-center justify-content-center"
                       style="border-radius: 5px; background: linear-gradient(135deg, #28a745, #85e085); color: white; transition: transform 0.2s, box-shadow 0.2s;">
                        <i class="bi bi-send-fill fs-4"></i>
                        <span class="fw-bold mt-1" style="font-size: 12px;">Kirim</span>
                    </a>
                </div>

                <div class="col-4">
                    <a href="#" class="btn w-100 p-2 shadow-sm border-0 d-flex flex-column align-items-center justify-content-center"
                       style="border-radius: 5px; background: linear-gradient(135deg, #ff9800, #ffcc80); color: white; transition: transform 0.2s, box-shadow 0.2s;">
                        <i class="bi bi-credit-card-2-front-fill fs-4"></i>
                        <span class="fw-bold mt-1" style="font-size: 12px;">Kartu</span>
                    </a>
                </div>
            </div>
      </div>
    </div>
    {{-- <div class="container direction-rtl">
        <div class="row g-3">
            <div class="col-6 ">
                <a href="#" class="btn  w-100 p-3 shadow-sm border-0  align-items-center"
                style="border-radius: 8px; background: #fff; color: #333; transition: transform 0.2s, box-shadow 0.2s;">
                 <div>
                     <span class="fw-bold" style="font-size: 14px;">Total Tagihan</span>
                     <h5 class="mb-0 text-primary">Rp. 200.000</h5>
                 </div>
             </a>
            </div>

            <div class="col-6">
                <a href="#" class="btn  w-100 p-3 shadow-sm border-0  align-items-center"
                   style="border-radius: 8px; background: #fff; color: #333; transition: transform 0.2s, box-shadow 0.2s;">
                    <div>
                        <span class="fw-bold" style="font-size: 14px;">Total Pengeluaran</span>
                        <h5 class="mb-0 text-success">Rp. 200.000</h5>
                    </div>
                </a>
            </div>
        </div>

    </div> --}}

    <div class="container">
        <div class="tiny-slider-two-wrapper">
          <div class="tiny-slider-two">
            <!-- Single Hero Slide -->
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

          <!-- Do not remove this ID, this ID counts how many slides there are. -->
          <div id="totaltnsDotsCount"></div>
        </div>
      </div>


    <div class="container">

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mt-3">
            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-dark">Tagihan Santri</h6>
                <a href="#" class="text-primary fw-bold text-decoration-none"><small> Lihat Semua</small></a>
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
