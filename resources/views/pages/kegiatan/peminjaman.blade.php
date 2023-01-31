@extends('App')

@section('content')

<x-breadcrumb parent='Kegiatan' where='Peminjaman' />

<div class="col-11 p-2">
    <livewire:peminjaman.data-barang />
</div>

<div class="col-12 my-4 px-2">
    <hr>
</div>

<div class="col-12 p-2" id="#keranjangPinjam">
    <livewire:peminjaman.pinjam-keranjang />
</div>

<div class="col-12">
    <livewire:peminjaman.data-peminjam />
</div>

<div class="row my-5">
    <div class="col-11">
        <livewire:peminjaman.peminjaman-history />
    </div>
</div>

@endsection