@extends('App')

@section('content')

<div class="row justify-content-start px-3 py-0">
    <div class="col-md-8 bg-white px-3 py-4 rounded my-shadow-1" style="min-height: 350px;">
        <livewire:barang-keluar.barangkeluar-list>
    </div>
</div>

<div class="row justify-content-center px-3 py-4">
    <div class="col-md-12 bg-white px-3 py-4 rounded my-shadow-1">
        <livewire:barang-keluar.barang-keluar-index>
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
@endsection