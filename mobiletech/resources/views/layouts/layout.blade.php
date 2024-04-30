<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('stylesheet.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>MobileTech</title>
  <link rel="icon" href="{{ asset('icons/logo.png') }}">
</head>
<body class="back-ground-color">
    @include('partials.navbar-top')
    @include('partials.navbar-main-sb')

    <main class="py-4">
        @yield('content')
    </main>

    @yield('offcanvas')


    @include('partials.footer')
</body>
</html>
