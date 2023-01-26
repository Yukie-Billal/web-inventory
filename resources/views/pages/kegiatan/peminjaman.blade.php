@extends('App')

@section('content')
    
    <ol class="breadcrumb align-items-center pb-2 ms-4">
        <li class="breadcrumb-item header-m">Kegiatan</li>
        <li class="breadcrumb-item text-primary">Peminjaman</li>
    </ol>

    <div class="row">
        <div class="col-11">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex">
                    <div class="col-3 pe-2">
                        <div class="form-group">
                            <label for="barcode" class="text-s-medium">Scan Barcode</label>
                            <input type="text" id="barcode" class="input-form text-m-regular w-100" placeholder="Masukkan Kode">
                        </div>
                    </div>
                    <div class="col-3 ps-2">
                        <div class="form-group">
                            <label for="serialNumber" class="text-s-medium">Serial Number</label>
                            <input type="text" id="serialNumber" class="input-form text-m-regular w-100" placeholder="Masukkan Kode">
                        </div>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-end">
                        <div class="col-5 d-flex justify-content-end align-items-center" style="height: 55%">
                            <button class="button button-white px-2">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </button>
                            <span class="d-inline-block mx-2">1 / 12</span>
                            <button class="button button-outline button-white px-2">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center h-50 pb-1 mx-1 text-m-medium">
                            Go To
                        </div>
                        <div class="col-2">
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
        <div class="col-11">
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
    </div>    

    <div class="row">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex flex-column">
                    <span class="header-m mb-2">Data Peminjam</span>
                    <p class="text-m-medium">Harap Isi data dibawah ini sebelum mengkonfirmasi !!!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaLengkap" class="text-m-regular">Nama Peminjam</label>
                                <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 48px" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="noTlp" class="text-m-regular">No Telephone</label>
                                <input type="text" id="noTlp" class="input-form w-100 placeholder-m-m" style="height: 48px" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="alamat" class="text-m-regular">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" aria-describedby="helpId" placeholder="Alamat Lengkap"></textarea>
                                <small id="helpId" class="text-neutral-80 text-s-regular">Boleh Kosong !!</small>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
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

    <div class="row my-5">
        <div class="col-11">
            <div class="card flex-fill border-0" style="min-height: 400px">
                <div class="card-header bg-white border-0">
                    <span class="header-s mb-2">Barang Yang Baru Di Pinjam</span>
                </div>
                <div class="card-body p-0 border-neutral-40-2 rounded">
                    {{-- <x-table /> --}}
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
                           {{-- @foreach ($barangs as $barang )  --}}
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
    </div>

@endsection