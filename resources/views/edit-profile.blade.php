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
  <title>B-Mall</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/img/icons/icon-96x96.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/icons/icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets/img/icons/icon-167x167.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icons/icon-180x180.png') }}">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <style>
    .form-control {
        border-radius: 10px;
        padding: 10px;
    }

    .btn {
        width: 48%;
    }

    .form-label {
        font-weight: bold;
    }

    #preview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        margin: 0 auto 10px;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header-area" id="headerArea">
    <div class="container">
      <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
        <div class="logo-wrapper">
          <a href="{{ url('/pengaturanprofil') }}">
            <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
          </a>
        </div>
        <div class="logo-wrapper">
          <span class="fw-bold">Edit Profil</span>
        </div>
        <div class="user-profile logo-wrapper">
          <img class="img-circle" src="{{ asset('assets/img/bg-img/user1.png') }}" alt="" style="height: 45px; border-radius: 50%; object-fit: cover;">
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="page-content-wrapper">
    <div class="container py-3">
      @if(session('no_changes'))
        <div class="alert alert-warning">{{ session('no_changes') }}</div>
      @endif

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <!-- Form Start -->
      <form id="editProfileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Upload Foto -->
        <div class="mb-3 text-center">
          <label for="photo" class="form-label d-block">Foto Profil</label>
          <img id="preview" src="{{ asset($user->photo ?? 'assets/img/bg-img/user1.png') }}" alt="Foto Profil">
          <input type="file" class="form-control" id="photo" name="photo" accept="image/*" onchange="previewImage(event)">
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Nomor HP</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
        </div>

        <div class="mb-3">
          <label for="dob" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $user->dob) }}">
        </div>

        <div class="mb-3">
          <label for="kk" class="form-label">Nomor Kartu Keluarga</label>
          <input type="text" class="form-control" id="kk" name="kk" value="{{ old('kk', $user->kk) }}">
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="{{ url('/pengaturanprofil') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- JS -->
  <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function(){
        const output = document.getElementById('preview');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('editProfileForm').addEventListener('submit', function(event) {
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

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/active.js') }}"></script>
</body>
</html>
