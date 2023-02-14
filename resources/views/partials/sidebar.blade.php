{{-- Sidebar Type 2 --}}
<div class="sidebar h-100 col-2 fixed-top p-0">
	<div class="sidebar-header" style="height: 80px;">
		<span class="text-dark fw-semibold header-l text-white">Inventory</span>
	</div>
	<div
		class="sidebar-body h-100"
		x-data="{
		@if (Request::is('peminjamans') || Request::is('masuk-barangs') || Request::is('pengembalians') || Request::is('cetak-barcodes'))
			data: false,
			kegiatan:true,				
		@else
			@if (Request::is('barangs') || Request::is('suppliers-users') || Request::is('barang-masuks') || Request::is('pinjams-kembalis'))
				data: true,
				kegiatan:false,
			@else				
				data: false,
				kegiatan:false,
			@endif
		@endif
			toggledata() {
				this.data = ! this.data
				if(this.data == true) {
					this.kegiatan = false
				}
			},
			togglekegiatan() {
				this.kegiatan = ! this.kegiatan
				if(this.kegiatan == true) {
					this.data = false
				}	
			}
		}"
	>
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<a href="/home" class="menu {{ Request::is('home') ? 'active' : '' }}">
				<img src="{{ asset('icon/home.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<span>Halaman Utama</span>
			</a>
		</div>
		@can('IsAdmin')			
			<div class="sidebar-menu d-flex flex-column align-items-start">
				<div 
					class="menu"
					x-on:click="toggledata"
				>
					<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
					<span>Data</span>
					<i class="fa-solid fa-chevron-down"></i>
				</div>
				<div 
					class="sub-menu"
					x-show="data"
					x-transition:enter.duration.500ms
					x-transition:leave.duration.500ms
				>
					<a href="/barangs" class="{{ Request::is('barangs') ? 'active' : '' }}">Barang</a>
					<a href="/suppliers-users" class="{{ Request::is('suppliers-users') ? 'active' : '' }}">Supplier & User</a>
					<a href="/barang-masuks" class="{{ Request::is('barang-masuks') ? 'active' : '' }}">Barang Masuk</a>
					<a href="/pinjams-kembalis" class="{{ Request::is('pinjams-kembalis') ? 'active' : '' }}">Pinjam & Kembali</a>
				</div>
			</div>
			<div class="sidebar-menu">
				<div 
					class="menu"
					x-on:click="togglekegiatan"
				>
					<img src="{{ asset('icon/list.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
					<span>Kegiatan</span>
					<i class="fa-solid fa-chevron-down"></i>		
				</div>
				
				<div 
					class="sub-menu"
					x-show="kegiatan"
					x-transition:enter.duration.500ms
					x-transition:leave.duration.500ms
	            x-transition.origin.top.left
				>
					<a href="/peminjamans" class="{{ Request::is('peminjamans') ? 'active' : '' }}">Peminjaman</a>
					<a href="/pengembalians" class="{{ Request::is('pengembalians') ? 'active' : '' }}">Pengembalian</a>
					<a href="/masuk-barangs" class="{{ Request::is('masuk-barangs') ? 'active' : '' }}">Masuk Barang</a>
					<a href="/cetak-barcodes" class="{{ Request::is('cetak-barcodes') ? 'active' : '' }}">Cetak Barcode</a>
				</div>
			</div>
		@endcan
	</div>	
</div>