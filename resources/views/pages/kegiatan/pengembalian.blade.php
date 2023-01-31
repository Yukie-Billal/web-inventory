@extends('App')

@section('content')
    
<x-breadcrumb parent='Kegiatan' where='Pengembalian' />

<div class="row my-5">
  <div class="col-12">
      <livewire:pengembalian.data-barang />
  </div>
</div>

{{-- <div class="row">
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
                          <div class="form-group">
                              <label>Kategori</label>
                              <select class="select-form" name="kategori">
                                  <option disabled>Pilih Kategori</option>
                                  <option value="">Elektronik</option>
                                  <option value="">Alat Kantor</option>
                                  <option value="">Parabot</option>
                              </select>
                          </div>                         
                      </div>               
                      <div class="col-6 pe-2">
                          <div class="form-group">
                              <label>Satuan</label>
                              <select class="select-form" name="satuan">
                                  <option disabled>Pilih Satuan</option>
                                  <option value="">Pcs / Buah</option>
                                  <option value="">Box / Dus</option>
                                  <option value="">Lusin</option>
                              </select>
                          </div>                         
                      </div>               
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> --}}

<div class="row mt-5 mb-2">
  <div class="col-12">
      <livewire:pengembalian.data-pengembali />
  </div>
</div>

@endsection