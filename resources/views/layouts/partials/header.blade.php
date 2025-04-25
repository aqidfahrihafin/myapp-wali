<!-- resources/views/partials/header.blade.php -->
<div class="header-area" id="headerArea">
  <div class="container">
    <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
       <!-- Kiri: Tombol kembali -->
       <div class="logo-wrapper">
        @yield('backButton')
      </div>

      <div class="logo-wrapper">
          @yield('editP')
      </div>

      <div class="user-profile logo-wrapper">
        <a href="{{ url('/') }}">
          <img class="img-circle" src="{{ asset('assets/img/bg-img/user1.png') }}" alt="" style="height: 50px; border-radius: 50%; object-fit: cover;">
        </a>
      </div>
    </div>
  </div>
</div>
