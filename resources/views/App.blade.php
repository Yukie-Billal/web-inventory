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
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('js/sweetalert2.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    @livewireStyles
</head>
<body>
    @include('partials.navbar')
    <div class="container bg-transparent py-0">
        @yield('content')
    </div>
    @include('partials.footer')

    
    @stack('body-script')
    {{-- <script type="text/javascript">
        window.onscroll = function() {myFunction()};

        function myFunction() {
          if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 0) {
            document.querySelector(".container").className = "d-none";
          }
        }
    </script> --}}
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    @livewireScripts
    @stack('script-livewire')
</body>
</html>