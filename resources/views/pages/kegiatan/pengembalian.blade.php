@extends('App')

@section('content')
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-l-medium">Kegiatan</li>
        <li class="breadcrumb-item"><a href="#"></a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

    {{-- <div class="row">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="barcode">Scan Barcode</label>
                            <input type="text" id="barcode" class="input-form text-m-regular w-100" placeholder="Masukkan Kode">
                        </div>
                    </div>
                    <div class="col-9 d-flex justify-content-end align-items-end">
                        <div class="col-3 d-flex justify-content-end align-items-center" style="height: 55%">
                            <button class="button button-white px-2">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </button>
                            <span class="d-inline-block mx-2">1 / 12</span>
                            <button class="button button-outline button-white px-2">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center h-50 pb-1 mx-1 text-m-medium">
                            Go To
                        </div>
                        <div class="col-1">
                            <input type="text" class="input-form w-100" placeholder="Page">
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 rounded border-neutral-40-2">
                    <x-table />
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex flex-column">
                    <span class="header-m mb-2">Data Barang</span>
                    <p>Data - Data barang yang akan Dipinjam !!</p>
                </div>
                <div class="card-body p-0 border-neutral-40-2 rounded">
                    <x-table />
                </div>
            </div>
        </div>
    </div>     --}}

    <div class="row">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex flex-column">
                    <span class="header-m mb-2">Data Barang</span>
                    <p class="text-m-medium">Silahkan Scan serial number untuk data barang !!!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaBarang" class="text-m-regular">Nama Barang</label>
                                <input type="text" id="namaBarang" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Nama Barang">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="serialNumber" class="text-m-regular">Serial Number</label>
                                <input type="text" id="serialNumber" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Number Serial">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="merek" class="text-m-regular">Merek Barang</label>
                                <input type="text" id="merek" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Merek">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="warna" class="text-m-regular">Warna</label>
                                <input type="text" id="warna" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 d-flex justify-content-between">
                            <div class="col-6 pe-2">
                                {{-- <div class="form-group">
                                    <label for="namaLengkap" class="text-m-regular">No Telephone</label>
                                    <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 36px" placeholder="Masukan Nama Lengkap">
                                </div> --}}
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select class="select-form" name="" id="">
                                        <option selected>Select one</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>                         
                            </div>               
                            <div class="col-6 pe-2">
                                {{-- <div class="form-group">
                                    <label for="namaLengkap" class="text-m-regular">No Telephone</label>
                                    <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 36px" placeholder="Masukan Nama Lengkap">
                                </div>                             --}}
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <select class="select-form" name="" id="">
                                        <option selected>Select one</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>                         
                            </div>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-2">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex flex-column">
                    <span class="header-m mb-2">Data Pengembali</span>
                    <p class="text-m-medium">Harap mengisi data dibawah ini sebelum mengkonfirmasi !!!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            {{-- <div class="form-group">
                                <label for="namaLengkap" class="text-m-regular">Nama Peminjam</label>
                                <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Nama Lengkap">
                            </div> --}}
                            <div class="form-group">
                                <label for="">Nama Pengembali</label>
                                <select class="select-form" name="" id="">
                                    <option disabled>Pilih Nama Peminjam</option>
                                    <option value="">Fauzi Rizky</option>
                                    <option value="">Yukie M Billal</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaLengkap" class="text-m-regular">Lama Pinjam</label>
                                <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="5 Hari">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-2">
                            <button class="button button-success text-white">
                                <i class="fa fa-clipboard me-1" aria-hidden="true"></i>
                                Konfirmasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row my-5">
        <div class="col-12">
            <div class="card flex-fill border-0" style="min-height: 400px">
                <div class="card-header bg-white border-0">
                    <span class="header-s mb-2">Barang Yang Baru Di Pinjam</span>
                </div>
                <div class="card-body p-0 border-neutral-40-2 rounded">
                    <table class="table table-hover table-responsive">
                        <thead class="border-neutral-40">
                           <tr>
                              <th>Nama Barang</th>
                              <th>Merek</th> 
                              <th>Warna</th>
                              <th>Nama Peminjam</th>
                              <th>No Telepon</th>
                              <th>Alamat</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                              <tr>
                                 <td>Laptop asus</td>
                                 <td>Asus</td>
                                 <td>Hitam</td>
                                 <td>Fauzi Rizky</td>
                                 <td>+62 844210298</td>
                                 <td>kelurahan Baros Rw 12 Rt 02</td>
                                 <td>Pinjam</td>
                              </tr>
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div> --}}

@endsection