@extends('App')

@section('content')

<div class="row justify-content-start px-4 py-5">
    <div class="col-md-8">
        <livewire:barang-keluar.barangkeluar-list>
    </div>
</div>

<div class="row justify-content-center px-4 py-5">
    <div class="col-md-10">
        <livewire:barang-keluar.barang-keluar-index>
    </div>
</div>

<div class="modal fade" id="ModalDataBarang">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: 544px; padding:20px;">
            <livewire:barang-keluar.barang-list >
        </div>
    </div>
</div>
@endsection