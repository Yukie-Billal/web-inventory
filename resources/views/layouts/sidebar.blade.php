<div class="sidebar h-100 col-2 fixed-top p-0" style="background: #4ca1af">
	<div class="sidebar-header" style="height: 80px;">
		<span class="text-dark fw-semibold header-l text-white">Inventory</span>
	</div>
	<div class="sidebar-body h-100">
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<a href="/home" class="menu {{ Request::is('home*') ? 'active' : '' }}">
				<img src="{{ asset('icon/home.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<span>Halaman Utama</span>
			</a>
		</div>
		@can('IsAdmin')			
			<div class="sidebar-menu d-flex flex-column align-items-start">
				<div class="menu" data-bs-toggle="collapse" data-bs-target="#dataSubMenu">
					<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
					<span>Data</span>
					<i class="fa-solid fa-chevron-down"></i>
				</div>
				<div class="collapse w-100 {{ Request::is('barangs') || Request::is('suppliers-users') || Request::is('barang-masuks') || Request::is('pinjams-kembalis*') ? 'show' : '' }}" id="dataSubMenu">
					<div class="sub-menu">						
						<a href="/barangs" class="{{ Request::is('barangs*') ? 'active' : '' }}">Barang</a>
						<a href="/suppliers-users" class="{{ Request::is('suppliers-users*') ? 'active' : '' }}">Supplier & User</a>
						<a href="/barang-masuks" class="{{ Request::is('barang-masuks*') ? 'active' : '' }}">Barang Masuk</a>
						<a href="/pinjams-kembalis" class="{{ Request::is('pinjams-kembalis*') ? 'active' : '' }}">Pinjam & Kembali</a>
					</div>
				</div>
			</div>
			<div class="sidebar-menu">
				<div class="menu" data-bs-toggle="collapse" data-bs-target="#kegiatanSubMenu">
					<img src="{{ asset('icon/list.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
					<span>Kegiatan</span>
					<i class="fa-solid fa-chevron-down"></i>		
				</div>
				
				<div class="collapse w-100  class="{{ Request::is('peminjamans') || Request::is('pengembalians') || Request::is('masuk-barangs') ||Request::is('cetak-barcodes*') ? 'show' : '' }} id="kegiatanSubMenu">
					<div class="sub-menu">						
						<a href="/peminjamans" class="{{ Request::is('peminjamans*') ? 'active' : '' }}">Peminjaman</a>
						<a href="/pengembalians" class="{{ Request::is('pengembalians*') ? 'active' : '' }}">Pengembalian</a>
						<a href="/masuk-barangs" class="{{ Request::is('masuk-barangs*') ? 'active' : '' }}">Masuk Barang</a>
						<a href="/cetak-barcodes" class="{{ Request::is('cetak-barcodes*') ? 'active' : '' }}">Cetak Barcode</a>
						<a href="/permintaan-pinjamans" class="{{ Request::is('permintaan-pinjamans*') ? 'active' : '' }}">Permintaan Pinjaman</a>
					</div>
				</div>
			</div>
		@endcan
	</div>	
</div>