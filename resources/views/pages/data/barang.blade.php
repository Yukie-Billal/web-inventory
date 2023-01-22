@extends('App')

@section('content')

    <div class="row justify-content-center px-4 py-0">
        <div class="col-md-10 bg-white py-4 px-4">
            <livewire:barang-index>
        </div>
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