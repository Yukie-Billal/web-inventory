@extends('App')

@section('title')
	
	Barcode

@endsection

@section('content')

	<x-breadcrumb parent='Kegiatan' where="Cetak Barcode" />

	<div class="row justify-content-center">
		<div class="col-10 p-2">
			<livewire:cetak.barcode-create />
		</div>
	</div>

	<hr class="text-neutral-50 my-4">

	<livewire:barcode-preview />

@endsection