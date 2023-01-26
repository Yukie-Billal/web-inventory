@extends('App')

@section('content')

{{-- <div class="row justify-content-start px-3 py-0">
    <div class="col-md-8 bg-white px-3 py-4 my-shadow-1"  style="min-height: 350px;">
        <livewire:barang-masuk.barang-masuk-list>
    </div>
</div> --}}

<div class="row justify-content-center px-3 py-4">
    <div class="col-md-12 bg-white px-3 py-4 my-shadow-1">
        <livewire:barang-masuk.barang-masuk-index >
    </div>
</div>

<div class="modal fade" id="ModalDataBarang">
    <div class="modal-dialog">
        @php
            Request::is('barang/masuk') ? $where = 'm' : $where = 'k';
        @endphp
        <div class="modal-content rounded-1" style="width: 544px; padding:20px;">
            <livewire:barang-keluar.barang-list :where='$where'>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahDataBarang">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: 544px; padding:20px;">
            <livewire:barang-create >
        </div>
    </div>
</div>

<div class="modal fade" id="dataNotFound">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-1" style="width: 544px; padding:20px;">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-triangle-exclamation text-danger mb-2" style="font-size: 90px;"></i>
                        <span class="header-m d-block">Barang Tidak Ditemukan !!</span>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center mt-3">
                    <button class="button button-primary text-white d-flex align-items-center text-m-medium" style="width: 174px;" data-bs-toggle="modal" data-bs-target="#modalTambahDataBarang">
                        <i class="fa fa-plus fs-6 me-1"></i>
                        <span class="fs-6">Buat Data Baru</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection