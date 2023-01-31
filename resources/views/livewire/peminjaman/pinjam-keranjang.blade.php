<div class="card flex-fill border-0">
    <div class="card-header bg-white border-0 d-flex flex-column">
        <span class="header-m mb-2">Data Barang</span>
        <p class="text-l-medium">Data - Data barang yang akan Dipinjam !!</p>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
                <thead>
                    <tr>
                        <th class="px-3">Serial Number</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Warna</th>
                        <th>Kategori</th>
                        <th>Satuan</th>                        
                        {{-- <th>Qty</th> --}}
                        <th style="min-width: 40px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pinjam_keranjangs->count() <= 0)
                    <tr class="text-center">
                        <td colspan="7" style="font-size: 16px">Keranjang Kosong</td>
                    </tr>
                    @else
                    @foreach ($pinjam_keranjangs as $pinjam_keranjang)                    
                    <tr>
                        <td class="px-3 py-2">
                            {{ $pinjam_keranjang->barang->serial_number }}
                        </td>
                        <td class="px-2 py-2">{{ $pinjam_keranjang->barang->nama_barang }}</td>
                        <td class="px-2 py-2">{{ $pinjam_keranjang->barang->merek }}</td>
                        <td class="px-2 py-2">{{ $pinjam_keranjang->barang->warna }}</td>
                        @if ($pinjam_keranjang->barang->kategori != null)
                            <td class="px-2 py-2">{{ $pinjam_keranjang->barang->kategori->nama_kategori }}</td>
                        @else
                            <td class="px-2 py-2">Tidak Ada</td>
                        @endif                        
                        <td class="px-2 py-2">{{ $pinjam_keranjang->barang->satuan }}</td>
                        {{-- <td class="px-2 py-2">{{ $pinjam_keranjang->barang->stok }}</td> --}}
                        <td style="max-width: 40px;" class="py-2">
                            <img src="{{ asset('icon/edit.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='editKeranjangPinjam({{ $pinjam_keranjang->id }})' data-bs-toggle="modal" data-bs-target="#modalEditDataBarang" class="mx-2">
                            <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='deleteKeranjangPinjam({{ $pinjam_keranjang->id }})'>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>