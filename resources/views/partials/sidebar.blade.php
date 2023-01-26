<div class="sidebar h-100 col-2 fixed-top" style="background: #F5F5F5; border-radius: 0 30px 30px 0; border: 2px solid #C2C2C2; border-left: 0;">
	<div class="sidebar-header" style="height: 80px;">
		<span class="text-dark fw-semibold header-l">Kodet</span>
	</div>
	<div class="sidebar-body h-100">
		<div class="sidebar-menu">
			<div class="menu">
				<i class="fa fa-box me-2"></i>
				<a href="/home" class="text-dark">Halaman Utama</a>
			</div>
		</div>
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<div class="menu">
				<i class="fa fa-box me-2"></i>
				<span>Data</span>
				<i class="fa-solid fa-chevron-down"></i>
			</div>
			@if (Request::is('barangs') || Request::is('barang-keluars') || Request::is('barang-masuks') || Request::is('suppliers') || Request::is('users'))
				@php
					$data = '';
				@endphp
			@else
				@php
					$data = 'hide';
				@endphp
			@endif
			<div class="sub-menu {{ $data }}">
				<a href="/barangs" class="{{ Request::is('barangs') ? 'text-primary' : '' }}">Barang</a>
				<a href="/barang-keluars" class="{{ Request::is('barang-keluars') ? 'text-primary' : '' }}">Barang keluar</a>
				<a href="/barang-masuks" class="{{ Request::is('barang-masuks') ? 'text-primary' : '' }}">Barang Masuk</a>
				<a href="/suppliers" class="{{ Request::is('suppliers') ? 'text-primary' : '' }}">Supplier</a>
				<a href="/users" class="{{ Request::is('users') ? 'text-primary' : '' }}">User</a>
			</div>
		</div>
		<div class="sidebar-menu">
			<div class="menu">
				<i class="fa fa-box me-2"></i>
				<span>Kegiatan</span>
				<i class="fa-solid fa-chevron-down"></i>		
			</div>
			@if (Request::is('peminjamans') || Request::is('masuk-barangs') || Request::is('pengembalians'))
				@php
					$kegiatan = '';
				@endphp
			@else
				@php
					$kegiatan = 'hide';
				@endphp
			@endif
			<div class="sub-menu {{ $kegiatan }}">
				<a href="/peminjamans" class="{{ Request::is('peminjamans') ? 'text-primary' : '' }}">Peminjaman</a>
				<a href="/pengembalians"  class="{{ Request::is('pengembalians') ? 'text-primary' : '' }}">Pengembalian</a>
				<a href="/masuk-barangs"  class="{{ Request::is('masuk-barangs') ? 'text-primary' : '' }}">Masuk Barang</a>
			</div>
		</div>
	</div>
</div>