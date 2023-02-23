<x-app-layout>
	@push('links')
		<style>
			.card-body table tbody tr td{
				border-right: 2px solid red;
				background: red;
			}
			table tr td {
				min-width: 50%;
			}
		</style>
	@endpush

	<x-breadcrumb parent="Kegiatan" where="Detail Permintaan">
		<li class="breadcrumb-item header-s">Permintaan Pinjaman</li>
	</x-breadcrumb>

	<div class="row mt-4">
		<div class="col-12">
			<div class="card flex-fill border-0">
				<div class="card-header border-0 bg-transparent p-0 header-s ps-4">
					Data User 
				</div>
				<div class="card-body border-0 p-0">
					<span class="text-l-medium">{{ $permintaan->user->nama }}</span>
					{{-- {{ $permintaan->user }} --}}
				</div>
			</div>
		</div>
	</div>
	<div class="row my-4">
		<div class="col-10">
			<div class="card flex-fill border-0">
				<div class="card-header border-0 bg-transparent p-0 header-s ps-4 mb-3">
					Data Barang [yang ingin dipinjam]
				</div>
				<div class="card-body border-0 p-0">
					<div class="col-12 border-neutral-40-2">
						<table class="table table-responsive table-hover table-inverse table-striped">
							<tbody>
								<tr>
									<td>Nama Barang</td>
									<td>{{ $permintaan->barang->nama_barang }}</td>
								</tr>
								<tr>
									<td>Kategori</td>
									<td>{{ $permintaan->barang->kategori->nama_kategori }}</td>
								</tr>
								<tr>
									<td>Merek Barang</td>
									<td>{{ $permintaan->barang->merek }}</td>
								</tr>
								<tr>
									<td>Warna Barang</td>
									<td>{{ $permintaan->barang->warna }}</td>
								</tr>
								<tr>
									<td>Serial Number</td>
									<td>{{ $permintaan->barang->serial_number }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>