<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web - Inventory || @yield('title')</title>

    @include('partials.source.normal-links')
    @stack('links')
    @livewireStyles
</head>
<body>
    <div class="load-state" id="loader">
        <i class="fa-solid fa-spinner load-state-item"></i>
    </div>
    <div class="container-fluid" style="min-height: calc(100vh - 80px);">
        <div class="row h-100">
            <div class="col-2 p-0 bg-white">

                @include('partials.sidebar')

            </div>
            <div class="col-10 p-0 h-100 bg-white">

                @include('partials.navbar')
                <div class="col-12 px-3 py-5 my-shadow-1" style="min-height: calc(100vh - 80px);">

                    @yield('content')
                    
                </div>
            </div>
        </div>
    </div>
    {{-- @include('partials.footer') --}}
    

    @include('partials.source.normal-script')
    @livewireScripts
    @stack('script-livewire')
    @stack('script')  
</body>
</html>