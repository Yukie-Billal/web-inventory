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

	{{-- This Livewire Component Will Print where cetak is clicked --}}
	<div class="modal fade" id="modalPrintBarcode">
	  <div class="modal-dialog modal-xl">
	      <livewire:cetak.barcode-print />
	  </div>
	</div>

	{{-- <a href="javascript:printBarcode()" class="button button-info">Print</a> --}}
	<iframe id="printing-frame" name="print_frame" src="about:blank" style="display: none;"></iframe>

@endsection
@push('script')
	<script>
		function printBarcode() {
			var isi = document.querySelector('#modalPrintBarcode .modal-dialog').innerHTML;
			window.frames["print_frame"].document.title = document.title;
			window.frames["print_frame"].document.body.innerHTML = isi;
			window.frames["print_frame"].window.focus();
			window.frames["print_frame"].window.print();
		}

		// document.querySelector('#buttonPrint').onclick = printBarcode();
		$('#buttonPrint').on('click', printBarcode);
	</script>
@endpush