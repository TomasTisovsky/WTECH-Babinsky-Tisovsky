<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('stylesheet.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>MobileTech</title>
  <link rel="icon" href="{{ asset('icons/logo.png') }}">
</head>
<body class="back-ground-color">
    @include('partials.navbar-top')
    @include('partials.navbar-main')

    <main class="py-4">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>