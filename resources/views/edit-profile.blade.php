@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/pengaturanprofil') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('editP')
  <span class="fw-bold">Edit Profil</span>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container pt-3">

    <!-- Notifikasi -->
    @if(session('no_changes'))
      <div class="alert alert-warning">{{ session('no_changes') }}</div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Kartu Form Edit -->
    <div class="card shadow-sm border-0 rounded-2 mb-3">
      <div class="card-body">
        <form id="editProfileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- Foto -->
          <div class="mb-3 text-center">
            <label for="photo" class="form-label d-block">Foto Profil</label>
            <img id="preview" 
              src="{{ $user['photo'] }}" 
              alt="Foto Profil"
              style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%; display: block; margin: 0 auto 10px; border: 2px solid #ddd;">
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="previewImage(event)">
          </div>

          <!-- Field Input -->
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user['name']) }}">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user['email']) }}">
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user['phone']) }}">
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user['address']) }}">
          </div>

          <div class="mb-3">
            <label for="dob" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $user['dob']) }}">
          </div>

          <div class="mb-3">
            <label for="kk" class="form-label">Nomor Kartu Keluarga</label>
            <input type="text" class="form-control" id="kk" name="kk" value="{{ old('kk', $user['kk']) }}">
          </div>

          <!-- Tombol -->
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ url('/pengaturanprofil') }}" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="pb-3"></div>
@endsection

@section('scripts')
<script>
  // Preview Foto
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
      document.getElementById('preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  // Cek perubahan sebelum submit
  document.getElementById('editProfileForm').addEventListener('submit', function (event) {
    const form = event.target;
    const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="date"]');
    let hasChanges = false;

    inputs.forEach(input => {
      if (input.defaultValue !== input.value) {
        hasChanges = true;
      }
    });

    if (!hasChanges && !form.photo.value) {
      event.preventDefault();
      alert('Tidak ada perubahan yang dilakukan.');
    }
  });
</script>
@endsection
