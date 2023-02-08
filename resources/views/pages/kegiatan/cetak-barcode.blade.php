@extends('App')

@section('content')

	<x-breadcrumb parent='Kegiatan' where="Cetak Barcode">
		
	<x-breadcrumb/>

	<div class="col-12 p-2">
		<livewire:cetak.barcode />
	</div>

@endsection