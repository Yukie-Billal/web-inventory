<div class="card flex-fill border-0">
	<div class="card-header bg-white border-0 p-0">
		<div class="row justify-content-end align-items-center">
			<div class="col-12 d-flex justify-content-center align-items-end pb-2">
				<div class="col-6 d-flex justify-content-center">
					<div class="col-5 pe-2 d-flex align-items-end">
						<div class="form-group">
							<label for="barcode" class="text-s-medium">Scan Barcode</label>
							<input type="text" id="barcode" class="input-form text-m-regular input-form-sm" placeholder="Masukkan Kode">
						</div>
					</div>
					<div class="col-1 d-flex align-items-end justify-content-center text-m-medium pb-2" style="height: inherit;">
						OR
					</div>
					<div class="col-5 ps-2 d-flex align-items-end">
						<div class="form-group">
							<label for="serialNumber" class="text-s-medium">Serial Number</label>
							<input type="text" id="serialNumber" class="input-form text-m-regular input-form-sm" placeholder="Masukkan Kode">
						</div>
					</div>
				</div>
				<livewire:pagination-view :col='6' :page='$page' :pageName='$pageName' :pageCount='$pageCount' />
			</div>
		</div>
	</div>
	<div class="card-body p-0">
		<div class="col-12 p-0 rounded border-neutral-40-2">
			<table class="table table-hover table-responsive mb-0">
				<thead>
					<tr>
						<th>Nama Barang</th>
						<th>Merek</th>
						<th>Warna</th>
						<th>Kategori</th>
						<th>Satuan</th>
						<th>Stok</th>
						<th style="min-width: 18px;"></th>
					</tr>
				</thead>
				<tbody>
					@if ($barangs->count() == 0)
					<tr class="text-center">
						<td colspan="8" style="font-size: 16px;">Barang Kosong</td>
					</tr>
					@else
					@foreach ($barangs as $barang )
					<tr>
						<td>{{ $barang->nama_barang }}</td>
						<td>{{ $barang->merek }}</td>
						<td>{{ $barang->warna }}</td>
						@if ($barang->kategori != null)
						<td>{{ $barang->kategori->nama_kategori }}</td>
						@else
						<td><i>Null</i></td>
						@endif
						<td>{{ $barang->satuan }}</td>
						<td>{{ $barang->stok }}</td>
						<td style="max-width: 18px;">
							<img src="{{ asset('icon/check.png') }}" alt=".." class="icon-normal">
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>