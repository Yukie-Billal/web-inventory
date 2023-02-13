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

	<hr class="text-neutral-50 my-2">

	<livewire:cetak.keranjang-barcode />

	{{-- <a href="javascript:printBarcode()" class="button button-info">Print</a> --}}
	<div class="row justify-content-center">
		<div class="col-10 d-flex mb-3" style="gap: 3px;">
			<button type="button" x-on:click="$wire.emit('404')" class="button button-info text-white">
				Update
			</button>
			<button type="button" x-on:click="$wire.emit('404')" class="button button-danger text-white">
				Reset
			</button>
			<button type="button" onclick="printBarcode()" class="button button-success text-white">
				Print
			</button>
		</div>
		<div class="col-10 border-neutral-40-2 d-flex justify-content-center bg-danger" id="previewBarcode">
		   	<livewire:cetak.barcode-preview />
		</div>
	</div>
	<iframe id="printing-frame" class="d-none" name="print_frame"></iframe>

@endsection

@push('script')
	<script>
		function printBarcode() {
			var isi = document.querySelector('#previewBarcode').innerHTML;
			window.frames["print_frame"].document.title = document.title;
			window.frames["print_frame"].document.body.innerHTML = isi;
			window.frames["print_frame"].window.focus();
			window.frames["print_frame"].window.print();
		}

		// document.querySelector('#buttonPrint').onclick = printBarcode();
		$('#buttonPrint').on('click', printBarcode);
	</script>
@endpush