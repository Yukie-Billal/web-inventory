<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    {{-- Costum Style --}}
    <style>
        body {
            background: #ededed;
        }
        .container {
            margin-top: 48px;
        }
        #navbarMenu .span {
            background: transparent;
            border: 1px solid #3334cc;
            border-radius: 30px;
            transition: .3s;
        }
        #navbarMenu .span:hover {
            background: #dfe0f3;
        }
    </style>
    <title>Web - Inventory</title>
    @livewireStyles
</head>
<body>
    @include('partials.navbar')
    <div class="container bg-white">
        <div class="row p-3">
            <div class="col-12">
                <h3>Keterangan</h3>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card flex-fill border-0">
                    <div class="card-header border-0 bg-white">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="col-8 d-flex align-items-center">
                                <div class="col-3">
                                    <input type="text" class="form-control" name="from" placeholder="From">
                                </div>
                                <span class="mx-3">s/d</span>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="to" placeholder="To">
                                </div>
                            </div>
                            <div class="col-4">
                                <input type="search" name="search" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="col-12 p-0 border" style="border-radius: 20px">
                            <table class="table table-hover table-responsive mb-0">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>JML</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row"></td>
                                            <td>asd</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td scope="row"></td>
                                            <td>asd</td>
                                            <td>asd</td>
                                            <td>asd</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @livewireScripts
</body>
</html>