@extends('App')

@section('content')

	<x-breadcrumb parent='Data' where='Supplier & User' />

    <div class="col-11 p-2">
    	<livewire:supplier.supplier-index>
    </div>

    <hr class="text-neutral-60 my-5">

    <div class="col-12 p-2">
        <livewire:user.user-index />
    </div>

@endsection