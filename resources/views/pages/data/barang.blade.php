@extends('App')

@section('content')

    <ol class="breadcrumb align-items-center pb-2 ms-4">
        <li class="breadcrumb-item header-m">Data</li>
        <li class="breadcrumb-item active">Barang</li>
    </ol>

    <div class="col-md-12 p-2">
        <livewire:barang-index>
    </div>


    <div class="modal fade" id="modalTambahDataBarang">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 544px; padding:20px;">
                <livewire:barang-create >
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditDataBarang">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 544px; padding:20px;">
                <livewire:barang-edit >
            </div>
        </div>
    </div>

@endsection