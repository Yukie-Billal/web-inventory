<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        <div class="col-12 header-s ps-3">
            Permintaan Peminjaman Dari User
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
                <thead>
                    <tr>
                        <th class="px-3">Nama Pengaju</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Warna</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        {{-- <th style="min-width: 30px;"></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($permintaans->count() == 0)
                        <tr class="text-center">
                            <td colspan="9" style="font-size: 16px;">Tidak Ada Ajuan Pinjaman</td>
                        </tr>
                    @else
                        @foreach ($permintaans as $permintaan)
                        <tr>
                            <td class="px-3 py-2">
                                {{ $permintaan->user->nama }}
                            </td>
                            <td class="px-2 py-2">{{ $permintaan->barang->nama_barang }}</td>
                            <td class="px-2 py-2">{{ $permintaan->barang->merek }}</td>
                            <td class="px-2 py-2">{{ $permintaan->barang->warna }}</td>
                            @if ($permintaan->barang->kategori != null)
                                <td class="px-2 py-2">{{ $permintaan->barang->kategori->nama_kategori }}</td>
                            @else
                                <td class="px-2 py-2">Tidak Ada</td>
                            @endif
                            <td class="px-2 py-2">{{ $permintaan->barang->stok }}</td>
                            <td style="max-width: 50px;" class="py-2">
                                <img src="{{ asset('icon/edit.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='editBarang({{ $permintaan->id }})' data-bs-toggle="modal" data-bs-target="#modalEditDataBarang" class="mx-2">
                                <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='deleteConfirm({{ $permintaan->id }})'>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>