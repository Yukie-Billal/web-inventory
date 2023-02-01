@extends('App')

@section('content')
    
    <x-breadcrumb parent='Kegiatan' where='Masuk Barang' />

    <livewire:barang-masuk.barang-masuk-create />

    <div class="row my-5">
        <div class="col-12">
            <livewire:masuk-barang.masuk-barang-history />
        </div>
    </div>

@endsection