@extends('App')

@section('content')
    
    <ol class="breadcrumb align-items-end pb-2 ms-4">
        <li class="breadcrumb-item"><span class="header-m">Kegiatan</span></li>
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active"></li>
    </ol>

    <div class="row">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex flex-column">
                    <span class="header-m mb-2">Data Barang</span>
                    <p class="text-m-medium">Jika Barangnya Sama Silahkan Masukkan Serial Number !!!</p>
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
                                <input type="text" id="merek" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Merek Barang">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="warna" class="text-m-regular">Warna Barang</label>
                                <input type="text" id="warna" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukkan Warna Barang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 d-flex justify-content-between">
                            <div class="col-5 pe-2">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select class="select-form" name="" id="">
                                        <option selected>Elektronik</option>
                                        <option value="">Parabot Rumah</option>
                                        <option value="">Alat Kantor</option>
                                        <option value="">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5 pe-2">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="select-form" name="satuan">
                                        <option selected>Buah</option>
                                        <option value="">Lusin</option>
                                        <option value="">Katon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 pe-2">
                                <div class="form-group">
                                    <label for="jumlah" class="text-m-regular">Jumlah</label>
                                    <input type="number" id="jumlah" class="input-form w-100 placeholder-m-m" style="height: 36px" placeholder="QTY" value="0">
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
                    <span class="header-m mb-2">Data Supplier</span>
                    <p class="text-m-medium">Harap Isi data dibawah ini sebelum mengkonfirmasi barang masuk !!!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="supplier" class="text-m-regular">Nama Supplier</label>
                                <input type="text" id="supplier" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="ketik Manual Dulu">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaLengkap" class="text-m-regular">Nama Perusahaan</label>
                                <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Ketik Manual Dulu">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="namaLengkap" class="text-m-regular">No Telephone</label>
                                <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="+62 812 7062 5012">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                              <label for="alamatSupplier">Alamat Lengkap Supplier</label>
                              <textarea class="form-control" name="" id="alamatSupplier" rows="3"></textarea>
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

    <div class="row my-5">
        <div class="col-12">
            <div class="card flex-fill border-0" style="min-height: 400px">
                <div class="card-header bg-white border-0">
                    <span class="header-s mb-2">Data Barang Yang Baru Ditambahkan</span>
                </div>
                <div class="card-body p-0 border-neutral-40-2 rounded">
                    <table class="table table-hover table-responsive">
                        <thead class="border-neutral-40">
                           <tr>
                              <th>Kode Barang</th>
                              <th>Nama Barang</th>
                              <th>Serial Number</th>
                              <th>Merek</th> 
                              <th>Warna</th>
                              <th>Kategori</th>
                              <th>Satuan</th>
                           </tr>
                        </thead>
                        <tbody>
                              <tr>
                                 <td>LA001HA001E</td>
                                 <td>Laptop asus</td>
                                 <td>001927312</td>
                                 <td>Asus</td>
                                 <td>Hitam</td>
                                 <td>Elektronik</td>
                                 <td>Pcs / Buah</td>
                              </tr>
                              <tr>
                                 <td>LA001HA001E</td>
                                 <td>Laptop asus</td>
                                 <td>001927312</td>
                                 <td>Asus</td>
                                 <td>Hitam</td>
                                 <td>Elektronik</td>
                                 <td>Pcs / Buah</td>
                              </tr>
                              <tr>
                                 <td>LA001HA001E</td>
                                 <td>Laptop asus</td>
                                 <td>001927312</td>
                                 <td>Asus</td>
                                 <td>Hitam</td>
                                 <td>Elektronik</td>
                                 <td>Pcs / Buah</td>
                              </tr>
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>

    @push('body-script')
        <script>
            const inputJumlah = document.querySelector('#jumlah');
            inputJumlah.addEventListener('change', function() {
                if (inputJumlah.value < 0) {
                    inputJumlah.value = 0
                } else if (inputJumlah.value = ) {

                } else {
                    
                }
            });
        </script>
    @endpush

@endsection