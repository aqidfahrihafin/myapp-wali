<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Transaksi</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

  <!-- Header -->
  <div class="header-area" id="headerArea">
    <div class="container">
      <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
        <div class="logo-wrapper">
          <a href="{{ url()->previous() }}">
            <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
          </a>
        </div>
        <div class="user-profile logo-wrapper">
          <a href="{{ url('/') }}">
            <img class="img-circle" src="{{ asset('assets/img/bg-img/user1.png') }}" alt="" style="height: 50px; border-radius: 50%; object-fit: cover;">
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="page-content-wrapper">
    <div class="pt-3"></div>
    <div class="container">
      <div class="mb-3">
        <h5 class="fw-bold text-dark">Detail Transaksi</h5>
      </div>

      <div class="card shadow-sm border-0 rounded-2 p-3">
        <h6 class="fw-bold text-primary mb-3">
          <i class="bi bi-receipt me-2"></i> {{ $transaksi['judul'] }}
        </h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item px-0 d-flex justify-content-between">
            <span class="text-muted">Tanggal</span>
            <span>{{ $transaksi['tanggal'] }}</span>
          </li>
          <li class="list-group-item px-0 d-flex justify-content-between">
            <span class="text-muted">Jumlah</span>
            <span class="fw-bold text-success">Rp {{ number_format($transaksi['jumlah']) }}</span>
          </li>
          <li class="list-group-item px-0 d-flex justify-content-between">
            <span class="text-muted">Tipe</span>
            <span>{{ $transaksi['tipe'] }}</span>
          </li>
          <li class="list-group-item px-0">
            <span class="text-muted d-block">Keterangan</span>
            <p class="mb-0">{{ $transaksi['keterangan'] }}</p>
          </li>
        </ul>

        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3 w-100">
          <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
        <a href="{{ route('cetak.transaksi', ['id' => 1]) }}" class="btn btn-outline-primary mt-2 w-100">
          <i class="bi bi-printer me-2"></i>Cetak Transaksi (PDF)
        </a>

      </div>
    </div>
    <div class="pb-3"></div>
  </div>

  <!-- Footer Nav -->
  <div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
      <div class="footer-nav position-relative">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
          <li>
            <a href="{{ url('/') }}">
              <i class="bi bi-house"></i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/profile') }}">
              <i class="bi bi-people"></i>
              <span>Data Santri</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/topup') }}">
              <i class="bi bi-wallet2"></i>
              <span>Top Up</span>
            </a>
          </li>
          <li class="active">
            <a href="{{ url('/alltransaksi') }}">
              <i class="bi bi-collection"></i>
              <span>Transaksi</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/setting') }}">
              <i class="bi bi-gear"></i>
              <span>Settings</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Script JS -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/active.js') }}"></script>

</body>
</html>
