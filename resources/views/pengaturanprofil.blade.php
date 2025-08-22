@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/setting') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="pt-3"></div>

  <div class="container">
    <!-- Header Profil -->
    <div class="card bg-primary shadow-sm border-0 rounded-2 mb-3"
         style="background-image: url('{{ asset('assets/img/core-img/1.png') }}'); border-radius: 6px;">
      <div class="card-body d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center">
          <div class="position-relative me-3">
            <img src="{{ $user->photo }}" 
              class="rounded-circle border" 
              width="100" 
              height="100" 
              style="object-fit: cover;" 
              alt="Profile">
          </div>
          <div class="user-info">
            <h6 class="mb-1 text-white fw-bold">{{ $user->name ?? 'Nama tidak tersedia' }}</h6>
            <p class="text-light small mb-0">Wali</p>
            <span class="badge bg-success text-white rounded-pill px-3">Aktif</span>
          </div>
        </div>

        <a href="{{ url('/edit-profile') }}" class="btn btn-success btn-sm">
          <i class="bi bi-pencil-square"></i> Edit
        </a>
      </div>
    </div>

    <!-- Detail Profil -->
    <div class="card shadow-sm border-0 rounded-2">
      <div class="card-body p-0">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex align-items-center py-3">
            <i class="bi bi-envelope text-primary fs-5 me-3"></i>
            <span>{{ $user->email ?? '-' }}</span>
          </li>
          <li class="list-group-item d-flex align-items-center py-3">
            <i class="bi bi-geo-alt text-primary fs-5 me-3"></i>
            <span>{{ $user->address ?? '-' }}</span>
          </li>
          <li class="list-group-item d-flex align-items-center py-3">
            <i class="bi bi-phone text-primary fs-5 me-3"></i>
            <span>{{ $user->phone ?? '-' }}</span>
          </li>
          <li class="list-group-item d-flex align-items-center py-3">
            <i class="bi bi-calendar text-primary fs-5 me-3"></i>
            <span>
              @if(!empty($user->dob))
                {{ \Carbon\Carbon::parse($user->dob)->translatedFormat('d F Y') }}
              @else
                -
              @endif
            </span>
          </li>
          <li class="list-group-item d-flex align-items-center py-3">
            <i class="bi bi-credit-card text-primary fs-5 me-3"></i>
            <span>{{ $user->kk ?? '-' }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="pb-3"></div>
</div>
@endsection
