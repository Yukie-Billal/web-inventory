<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web - Inventory || {{ $title }}</title>

    @include('layouts.source.normal-links')
    @stack('styles')
    @livewireStyles
</head>
<body>
    <div class="load-state" id="loader">
        <i class="fa-solid fa-spinner load-state-item"></i>
    </div>

    @can('IsAdmin')        
        <div class="container-fluid" style="min-height: calc(100vh - 80px);">
            <div class="row h-100">
                <div class="col-2 p-0 bg-white">

                    @include('layouts.sidebar')

                </div>
                <div class="col-10 p-0 h-100 bg-white">

                    @include('layouts.navbar')

                    <div class="col-12 px-3 py-5 my-shadow-1" style="min-height: calc(100vh - 80px);">

                        {{ $slot }}
                        
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('IsUser')
        <div class="container-fluid" style="min-height: calc(100vh - 80px);">
            <div class="row h-100">
                <div class="col-12 p-0">
                    @include('layouts.navbar')
                    <div class="col-12 px-4">                        
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    @endcan
    

    @include('layouts.source.normal-script')
    @livewireScripts
    @stack('scripts')
</body>
</html>