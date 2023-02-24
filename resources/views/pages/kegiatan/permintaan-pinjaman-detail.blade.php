<x-app-layout>
	@push('links')
		<style>
			.min-w-auto {
				min-width: none;
			}
		</style>
	@endpush

	<x-breadcrumb parent="Kegiatan" where="Detail Permintaan">
		<li class="breadcrumb-item header-s">Permintaan Pinjaman</li>
	</x-breadcrumb>

	<livewire:kegiatan.permintaan-pinjaman.detail-permintaan :permintaan="$permintaan" :key="$permintaan" />

	<x-toast />
</x-app-layout>