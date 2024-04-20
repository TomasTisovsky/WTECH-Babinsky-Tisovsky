{{-- layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <title>MobileTech</title>
  <link rel="icon" href="{{ asset('icons/logo.png') }}">
</head>
<body>

  {{-- Prvý navbar --}}
  @include('partials.navbar-top')

  {{-- Druhý navbar --}}
  @include('partials.navbar-main')

  {{-- Hlavný obsah stránky --}}
  <main class="container-fluid h-100 back-ground-color">
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('components.footer')

  {{-- Skripty --}}
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>