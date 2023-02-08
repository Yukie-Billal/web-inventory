@extends('App')

@section('title')
    Data Barang
@endsection  

@section('content')

    <x-breadcrumb parent='Data' where='Barang' />

    <div class="col-md-12 p-2">
        <livewire:barang-index>
    </div>


    <div class="modal fade" id="modalTambahDataBarang">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
                <livewire:barang-create >
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditDataBarang">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
                <livewire:barang-edit >
            </div>
        </div>
    </div>

@endsection