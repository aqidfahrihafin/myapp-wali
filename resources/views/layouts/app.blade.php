<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.partials.head')
  @stack('styles')
</head>
<body>

  @include('layouts.partials.header')

  <div class="container mt-4">
    @yield('content')
  </div>

  @include('layouts.partials.footer')

  @stack('scripts')
</body>
</html>
