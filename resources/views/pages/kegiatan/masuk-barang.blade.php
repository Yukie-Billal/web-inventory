@extends('App')

@section('content')
    
    <ol class="breadcrumb align-items-center pb-2 ms-4">
        <li class="breadcrumb-item header-m">Kegiatan</li>
        <li class="breadcrumb-item active">Masuk Barang</li>
    </ol>

    <livewire:barang-masuk.barang-masuk-create />

    <div class="row my-5">
        <div class="col-12">
            <livewire:masuk-barang.masuk-barang-history />
        </div>
    </div>

@endsection