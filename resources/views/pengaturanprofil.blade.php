<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('backButton')
  <a href="{{'/setting'}}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection
@section('content')

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
  @endsection