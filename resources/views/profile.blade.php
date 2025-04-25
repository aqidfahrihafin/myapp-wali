<!-- resources/views/profile.blade.php -->
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

<div class="page-content-wrapper">
<div class="pt-3"></div>

<div class="container">
  <!-- User Profile Card -->
  <div class="card shadow-sm border-0 rounded-2 mb-3">
    <div class="card-body d-flex align-items-center">
      <div class="position-relative me-3">
        <img src="{{ asset('assets/img/bg-img/user1.png') }}" class="rounded-circle border" width="80" height="80" alt="Profile">
      </div>
      <div class="user-info">
        <h6 class="mb-1">Aqid Fahri Hafin</h6>
        <p class="text-muted small mb-0">Pengurus Pusat</p>
        <span class="badge bg-success text-dark rounded-pill px-3">Aktif</span>
      </div>
    </div>
  </div>

  <!-- User Information -->
  <div class="card shadow-sm border-0 rounded-2">
    <div class="card-body">
      <table class="table table-borderless">
        <tbody>
          <tr><td><i class="bi bi-person-fill me-1 text-primary"></i></td><td>@aqidfahri170100</td></tr>
          <tr><td><i class="bi bi-person-badge-fill me-1 text-primary"></i></td><td>Aqid Fahri Hafin</td></tr>
          <tr><td><i class="bi bi-briefcase-fill me-1 text-primary"></i></td><td>Web Developer</td></tr>
          <tr><td><i class="bi bi-geo-alt-fill me-1 text-primary"></i></td><td>Gadu timur ganding sumenep madura</td></tr>
          <tr><td><i class="bi bi-envelope-fill me-1 text-primary"></i></td><td>aqidfahrihafin@gmail.com</td></tr>
          <tr><td><i class="bi bi-globe me-1 text-primary"></i></td><td><a href="#" class="text-decoration-none">apinsdigital.my.id</a></td></tr>
          <tr><td><i class="bi bi-info-circle-fill me-1 text-primary"></i></td><td>Menekuni bidang web developer sejak tahun 2019.</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="pb-3"></div>
</div>
@endsection
