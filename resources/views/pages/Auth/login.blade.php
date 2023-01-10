<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <title>Login - Web Inventory</title>
    @livewireStyles
</head>
<body style="background-color: #f5f5f5">
    <div class="container" style="height: 100vh; background-color: #f5f5f5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10">
                <div class="card bg-white shadow-lg border-0">
                    <div class="card-body p-0 d-flex">
                            <div class="col-6 my-5 p-5">
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <div class="row justify-content-center align-items-center mb-5">
                                            <div class="col-auto d-flex flex-column justify-content-center align-items-center">
                                                <span class="fs-3 fw-semibold">Selamat Datang</span>
                                                <span class="form-text" style="font-size: 12px">Silahkan Login Jika Sudah Punya Akun!!</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <livewire:login-form >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 bg-dark rounded-1">
                                <img src="" alt="..">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>


