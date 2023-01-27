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
                        <th>Stok</th>
                        <th style="min-width: 50px;"></th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach ($barangs as $barang)                    
                    <tr>
                        <td class="px-3 py-2">
                            {{ $barang->serial_number }}
                        </td>
                        <td class="px-2 py-2">{{ $barang->nama_barang }}</td>
                        <td class="px-2 py-2">{{ $barang->merek }}</td>
                        <td class="px-2 py-2">{{ $barang->warna }}</td>
                        @if ($barang->kategori != null)
                            <td class="px-2 py-2">{{ $barang->kategori->nama_kategori }}</td>
                        @else
                            <td class="px-2 py-2">Tidak Ada</td>
                        @endif                        
                        <td class="px-2 py-2">{{ $barang->satuan }}</td>
                        <td class="px-2 py-2">{{ $barang->stok }}</td>
                        <td style="max-width: 100px;" class="py-2">
                            <img src="{{ asset('icon/edit.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='editBarang({{ $barang->id }})' data-bs-toggle="modal" data-bs-target="#modalEditDataBarang" class="mx-2">
                            <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='deleteBarang({{ $barang->id }})'>
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
</div>