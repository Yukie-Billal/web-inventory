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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('js/sweetalert2.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>

    <style>
        table tbody tr {
            height: 36px;
        }
        table tbody tr td {
            height: 36px;
        }
    </style>
    @livewireStyles
</head>
<body>
    <div class="container-fluid" style="min-height: calc(100vh - 80px);">
        <div class="row h-100">
            <div class="col-2 p-0 bg-white">
                @include('partials.sidebar')
            </div>
            <div class="col-10 p-0 h-100 bg-white">
                @include('partials.navbar')
                <div class="col-12 px-3 py-4 my-shadow-1" style="min-height: calc(100vh - 80px);">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    {{-- @include('partials.footer') --}}
    
    @stack('body-script')
    {{-- <script type="text/javascript">
        window.onscroll = function() {myFunction()};

        function myFunction() {
          if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 0) {
            document.querySelector(".container").className = "d-none";
          }
        }
    </script> --}}
    <script type="text/javascript">
        let menu = document.querySelectorAll('.sidebar-menu .menu');
        function myFunction() {
            menu.forEach((item) => {
                const sidebarMenuItem = item.parentNode;
                const subMenuItem = sidebarMenuItem.querySelector('.sub-menu');
                if(subMenuItem != null) {
                    subMenuItem.classList.add('hide');
                }
            });
            const sidebarMenu = this.parentNode;
            const subMenu = sidebarMenu.querySelector('.sub-menu');
            // setTimeout(() => {
                if(subMenu != null) {
                    subMenu.classList.toggle('hide');
                    subMenu.classList.toggle('show');
                }
            // }, 300);
        }
        menu.forEach((item) => {
            item.addEventListener('click', myFunction);
        });
    </script>
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    @livewireScripts
    @stack('script-livewire')
</body>
</html>