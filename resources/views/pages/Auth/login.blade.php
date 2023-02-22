<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastify/toastify.min.css') }}">

    <title>Login - Web Inventory</title>
    @livewireStyles
</head>
<body>
    <img src="{{ asset('img/login1.jpg') }}" alt=".." class="my-img">
    <div class="container" style="height: 100vh; ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12">
                <div class="card bg-white shadow-lg border-0">
                    <div class="card-body p-0 d-flex">
                        <div class="col-6 my-5 p-md-4 p-sm-3 py-5">
                            <div class="row justify-content-center">
                                <div class="col-8 my-2">
                                    <div class="row justify-content-center align-items-center mb-5 pt-5">
                                        <div class="col-auto d-flex flex-column justify-content-center align-items-center">
                                            <span class="header-l text-neutral-80">Selamat Datang</span>
                                            <span class="text-s-medium text-neutral-60">Silahkan Login Jika Sudah Punya Akun!!</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <livewire:auth.login-form >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 bg-dark rounded-1 p-0">
                            <img src="{{ asset('img/login1.jpg') }}" alt=".." class="w-100 h-100 img-fluid rounded-1" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/toastify/toastify.min.js') }}"></script>
    @livewireScripts

    @if (session()->has('registered'))
        @php $nama=session('registered')->nama;$email=session('registered')->email;$password=session('registered')->password; @endphp
        <script>
         document.addEventListener('DOMContentLoaded', function () {
             setTimeout(() => {
                 const nama = "{{ $nama }}";
                 const email = "{{ $email }}";
                 const password = "{{ $password }}";
                 const params = [nama, email, password];
                 Livewire.emit('isi-form', params);
             }, 500);
             Livewire.emit('toastify', ['success', 'Berhasil Melakukan Register', 3500]);
         });
        </script>
    @endif

    @stack('scripts')
    <x-toast />
</body>
</html>