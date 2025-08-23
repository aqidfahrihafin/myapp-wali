<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.partials.head')
  @stack('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>
<body>

  @include('layouts.partials.header')

  <div class="container mt-4">
    <div style="height:20px; width:100px;"></div>
    @yield('content')
  </div>

  @include('layouts.partials.footer')

  @stack('scripts')
</body>
</html>
