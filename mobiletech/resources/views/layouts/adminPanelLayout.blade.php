<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('stylesheet.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>MobileTech</title>
    <link rel="icon" href="resources/icons/logo.png">
</head>

<body>
    @include('partials.adminPanelNavbarTop')
    @include('partials.adminPanelNavbarMain')

    <div class="container-fluid back-ground-color">
        @yield('content')    
    </div>
    
    <script></script>

</body>

</html>