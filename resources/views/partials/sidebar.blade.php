<div class="sidebar h-100 col-2 fixed-top p-0" style="background: #EDEDED; border-radius: 0 30px 30px 0; border: 2px solid #C2C2C2; border-left: 0;">
	<div class="sidebar-header" style="height: 80px;">
		<span class="text-dark fw-semibold header-l">B - TAK</span>
	</div>
	<div class="sidebar-body h-100">
		<div class="sidebar-menu">
			<div class="menu">
				<img src="{{ asset('icon/home.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<a href="/home" class="{{ Request::is('home') ? 'text-primary' : 'text-dark' }}">Halaman Utama</a>
			</div>
		</div>
		<div class="sidebar-menu d-flex flex-column align-items-start">
			<div class="menu">
				<img src="{{ asset('icon/data.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
				<span>Data</span>
				<i class="fa-solid fa-chevron-down"></i>
			</div>
			@if (Request::is('barangs') || Request::is('suppliers-users') || Request::is('barang-masuks') || Request::is('pinjams-kembalis'))
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
				<a href="/suppliers-users" class="{{ Request::is('suppliers-users') ? 'text-primary' : '' }}">Supplier & User</a>
				<a href="/barang-masuks" class="{{ Request::is('barang-masuks') ? 'text-primary' : '' }}">Barang Masuk</a>
				<a href="/pinjams-kembalis" class="{{ Request::is('pinjams-kembalis') ? 'text-primary' : '' }}">Pinjam & Kembali</a>
			</div>
		</div>
		<div class="sidebar-menu">
			<div class="menu">
				<img src="{{ asset('icon/list.png') }}" alt=".." class="me-2" style="width: 20px; height: 20px;">
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