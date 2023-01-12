<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web - Inventory</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    {{-- Costum Style --}}
    <link rel="stylesheet" href="{{ asset('css/costum.css') }}">

    <link rel="stylesheet" href="{{ asset('js/sweetalert2.min.css') }}">
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    
    @livewireStyles
</head>
<body>
    @include('partials.navbar')
    <div class="container bg-white">
        @yield('content')
    </div>
    
    @stack('body-script')
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    @livewireScripts
</body>
</html>