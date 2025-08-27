@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div id="preloader">
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<div class="page-content-wrapper">
  <div class="pt-3"></div>
  <div class="container">
{{-- card shadow-sm border-0 rounded-2 mb-3  --}}
      <!-- User Profile Card -->
      <div class="card bg-primary mb-3 bg-img" style="background-image: url('{{ asset('assets/img/core-img/1.png') }}')">
          <div class="card-body d-flex align-items-center">
              <div class="position-relative me-3">
                  <img src="{{ isset($santri['image']) ? 'http://127.0.0.1:8001/storage/' . $santri['image'] : asset('assets/img/bg-img/user1.png') }}" 
                       class="rounded-circle border" width="80" height="80" alt="Profile"
                       style="object-fit: cover;">
              </div>
              <div class="user-info">
                  <!-- Nama santri -->
                  <h6 class="mb-1 fw-bold text-white">{{ $santri['nama'] ?? 'Tidak ada nama' }}</h6>

                  <!-- Status: santri / pengurus -->
                  <p class="text-white small mb-0">
                      {{ ucfirst($santri['status'] ?? 'Santri') }}
                  </p>

                  <!-- Badge status aktif/nonaktif -->
                  <span class="badge bg-{{ ($santri['status_santri'] ?? '') == 'aktif' ? 'success' : 'danger' }} text-white rounded-pill px-3">
                      {{ ucfirst($santri['status_santri'] ?? 'Tidak Diketahui') }}
                  </span>
              </div>
          </div>
      </div>

      <!-- User Information -->
      <div class="card shadow-sm border-0 rounded-2" style="background-image: url('{{ asset('assets/img/core-img/1.png') }}')">
          <div class="card-body " >
              <table class="table table-borderless mb-0">
                  <tbody>
                      <tr>
                          <td><i class="bi bi-person-fill text-primary me-2"></i> Nama Santri</td>
                          <td>{{ $santri['nama'] ?? '-' }}</td>
                      </tr>
                      <tr>
                          <td><i class="bi bi-people-fill text-primary me-2"></i> Nama Wali</td>
                          <td>{{ $santri['nama_wali'] ?? '-' }}</td>
                      </tr>
                      <tr>
                          <td><i class="bi bi-geo-alt-fill text-primary me-2"></i> Alamat</td>
                          <td>{{ $santri['alamat'] ?? '-' }}</td>
                      </tr>
                      <tr>
                          <td><i class="bi bi-calendar-date text-primary me-2"></i> Tanggal Lahir</td>
                          <td>
                              @if(!empty($santri['tanggal_lahir']))
                                  {{ \Carbon\Carbon::parse($santri['tanggal_lahir'])->translatedFormat('d F Y') }}
                              @else
                                  -
                              @endif
                          </td>
                      </tr>
                      <tr>
                          <td><i class="bi bi-123 text-primary me-2"></i> NIS</td>
                          <td>{{ $santri['nis'] ?? '-' }}</td>
                      </tr>
                      <tr>
                          <td><i class="bi bi-credit-card text-primary me-2"></i> NIK</td>
                          <td>{{ $santri['nik'] ?? '-' }}</td>
                      </tr>
                      <tr>
                          <td><i class="bi bi-card-list text-primary me-2"></i> No KK</td>
                          <td>{{ $santri['no_kk'] ?? '-' }}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>

  </div>
  <div class="pb-5"></div>
</div>
@endsection
