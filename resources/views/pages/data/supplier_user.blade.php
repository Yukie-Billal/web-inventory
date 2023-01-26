@extends('App')

@section('content')

	<ol class="breadcrumb align-items-center pb-2 ms-4">
        <li class="breadcrumb-item header-m">Data</li>
        <li class="breadcrumb-item active text-primary">Supplier & User</li>
    </ol>

	{{-- <div class="col-md-12 p-2">
        <livewire:barang-index>
    </div> --}}

    <div class="col-11 p-2">
    	<livewire:supplier.supplier-index>
    </div>

    <div class="col-12 p-2">
        <livewire:user.user-index />
    </div>

@endsection