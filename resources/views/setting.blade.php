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
@endsection