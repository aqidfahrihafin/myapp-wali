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


    <!-- Tiny Slider One Wrapper -->


    <div class="pt-3"></div>


   <div class="container"> 
    <div class="card bg-primary mb-3 bg-img shadow-lg border-0"
        style="background-image: url('{{ asset('assets/img/core-img/1.png') }}'); border-radius: 6px;">
            <div class="card-body d-flex align-items-center">
                <div class="position-relative me-3">
                    <!-- Cek session dan fallback ke foto default -->
                    <img src="{{ asset(session('user_photo') ?? ($user->photo ?? 'assets/img/bg-img/user1.png')) }}" 
                        class="rounded-circle border" width="80" height="80" alt="Profile">
                </div>
                <div class="user-info">
                    <h6 class="mb-1 text-white">{{ $user->name ?? 'Ahmad Maulana' }}</h6>
                    <p class="small text-white mb-0">{{ $user->kk ?? '352910******01' }}</p>
                    <span class="badge bg-success text-white rounded-pill px-3">Wali Santri</span>
                </div>
            </div>
    </div>
</div>



    <div class="container">
        <div class="mb-3">
            <div class="row g-2">
                <!-- Total Saldo Masuk -->
                <div class="col-6">
                    <div class="card shadow-sm border-0 rounded-3 text-center py-2" style="background-color: #ffffff;">
                        <i class="bi bi-arrow-down-circle text-success fs-5"></i>
                        <p class="mb-1 text-muted fw-light" style="font-size: 13px;">Saldo Masuk</p>
                        <h6 class="fw-bold text-success mb-1">Rp. 5.000.000</h6>
                    </div>
                </div>

                <!-- Total Saldo Keluar -->
                <div class="col-6">
                    <div class="card shadow-sm border-0 rounded-3 text-center py-2" style="background-color: #ffffff;">
                        <i class="bi bi-arrow-up-circle text-danger fs-5"></i>
                        <p class="mb-1 text-muted fw-light" style="font-size: 13px;">Saldo Keluar</p>
                        <h6 class="fw-bold text-danger mb-1">Rp. 2.000.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="card shadow-sm border-0 rounded-2 overflow-hidden mt-3">
            <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="pengaturanprofil" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi bi-person text-muted fs-2 me-3"></i>
                            <div class="flex-grow-1">
                                <small  class="text-muted d-block">Pengaturan Profil</small>
                            </div>
                            <i class="bi bi-arrow-right-circle text-muted fs-5"></i>
                        </a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi bi-lock text-muted fs-2 me-3"></i>
                            <div class="flex-grow-1">
                                <small  class="text-muted d-block">Pengaturan Akun</small>
                            </div>
                            <i class="bi bi-arrow-right-circle text-muted fs-5"></i>
                        </a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none w-100">
                            <i class="bi bi-shuffle text-muted fs-2 me-3"></i>
                            <div class="flex-grow-1">
                                <small  class="text-muted d-block">Pindah Akun</small>
                            </div>
                            <i class="bi bi-arrow-right-circle text-muted fs-5"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-3">
        <div class="d-flex justify-content-center">
            <button class="btn w-100 py-1 shadow-sm text-white fw-bold d-flex align-items-center justify-content-center"
                    style="background: linear-gradient(135deg, #dc3545, #ff5f5f); border-radius: 5px; transition: 0.3s;"
                    onclick="logout()">
                <i class="bi bi-box-arrow-right me-2 fs-5"></i> Keluar
            </button>
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
