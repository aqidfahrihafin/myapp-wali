<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Apins">
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
      <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
        <div class="logo-wrapper">
          <a href="{{'/setting'}}">
            <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
          </a>
        </div>

        <div class="user-profile logo-wrapper">
          <a href="home.html">
            <img class="img-circle" src="{{ asset('assets/img/bg-img/user1.png') }}" alt="" style="height: 50px; border-radius: 50%; object-fit: cover;">
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="page-content-wrapper">
    <div class="pt-3"></div>

    <div class="container">
      <!-- User Profile Card -->
      <div class="card shadow-sm border-0 rounded-2 mb-3">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="position-relative me-3">
              <img src="{{asset('assets/img/bg-img/user1.png')}}" class="rounded-circle border" width="80" height="80" alt="Profile">
            </div>
            <div class="user-info">
            <h6 class="mb-1">{{ $user->name }}</h6>
              <p class="text-muted small mb-0">Wali</p>
              <span class="badge bg-success text-dark rounded-pill px-3">Aktif</span>
            </div>
          </div>
          <!-- Button Edit -->
          <a href="{{ url('/edit-profile') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
        </div>
      </div>

      <!-- User Information -->
      <div class="card shadow-sm border-0 rounded-2">
        <div class="card-body">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td><i class="bi bi-envelope-fill me-1 text-primary"></i></td>
                <td>{{ $user->email }}</td> <!-- Email -->
              </tr>
              <tr>
                <td><i class="bi bi-geo-alt-fill me-1 text-primary"></i></td>
                <td>{{ $user->address }}</td> <!-- Address -->
              </tr>
              <tr>
                <td><i class="bi bi-phone-fill me-1 text-primary"></i></td>
                <td>{{ $user->phone }}</td> <!-- Phone -->
              </tr>
              <tr>
                <td><i class="bi bi-calendar-event-fill me-1 text-primary"></i></td>
                <td>{{ \Carbon\Carbon::parse($user->dob)->format('d F Y') }}</td><!-- Tanggal Lahir -->
              </tr>
              <tr>
                <td><i class="bi bi-card-list me-1 text-primary"></i></td>
                <td>{{ $user->kk }}</td> <!-- Kartu Keluarga -->
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="pb-3"></div>
  </div>

  <!-- Footer Nav -->
  <div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
      <div class="footer-nav position-relative">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
          <li class="active">
            <a href="{{ '/' }}">
              <i class="bi bi-house"></i>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="{{ '/profile' }}">
              <i class="bi bi-people"></i>
              <span>Data Santri</span>
            </a>
          </li>

          <li>
            <a href="{{ 'topup' }}">
              <i class="bi bi-wallet2"></i>
              <span>Top Up</span>
            </a>
          </li>

          <li>
            <a href="{{ '/alltransaksi' }}">
              <i class="bi bi-collection"></i>
              <span>Transaksi</span>
            </a>
          </li>

          <li>
            <a href="{{ '/setting' }}">
              <i class="bi bi-gear"></i>
              <span>Settings</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
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

</html>
