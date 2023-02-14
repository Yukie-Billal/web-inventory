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

	<div class="row justify-content-center">
		<div class="col-10 d-flex mb-3" style="gap: 3px;">
			<button type="button" id="buttonUpdate"  class="button button-info">
				<i class="fa-solid fa-rotate-right me-1"></i>
			  	Update
			</button>
			<button type="button" id="buttonReset" class="button button-danger">
				<i class="fa-solid fa-power-off me-1"></i>
			   Reset
			</button>
			<button type="button" id="buttonPrint" class="button button-success">
				<i class="fa fa-print me-1"></i>
			   Print
			</button>
		</div>
		<livewire:cetak.barcode-preview />
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

		$(document).ready(function(e) {
			$('#buttonPrint').on('click', printBarcode);
			$('#buttonUpdate').on('click', function(e) {
				e.preventDefault();
				Livewire.emit('updatePreview');
			});
			$('#buttonReset').on('click', function(e) {
				e.preventDefault();
				setTimeout(() => {
					Livewire.emit('resetBarcode');
				}, 500);
			});
		});
	</script>
@endpush