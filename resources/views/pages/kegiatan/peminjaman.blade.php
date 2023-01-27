@extends('App')

@section('content')

<x-breadcrumb parent='Kegiatan' where='Peminjaman' />

<div class="col-11 p-2">
    <livewire:peminjaman.data-barang />
</div>

<div class="col-12 my-4 px-2">
    <hr>
</div>

<div class="col-12 p-2">
    <livewire:peminjaman.pinjam-keranjang />
</div>

<div class="col-12">
    <livewire:peminjaman.data-peminjam />
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