<div class="card flex-fill m-0 rounded bg-white mt-4 p-3 my-shadow-2">
    <div class="bg-header bg-white header-s mb-3 p-2">
        History / Barang Yang Di Sedang Dinjam
    </div>
    <div class="card-body p-0 border-0 ">
        <table class="table table-hover mb-0 w-100 h-100">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Merek</th>
                    <th>Warna</th>
                    <th>Kategori</th>
                    <th style="min-width: 10px;"></th>
                </tr>
            </thead>
            <tbody>
                @if ($permintaans->count() == 0)
                <tr class="text-center">
                    <td colspan="8" style="font-size: 16px;">Kosong</td>
                </tr>
                @else
                @foreach ($permintaans as $item)
                    <tr>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->barang->merek }}</td>
                        <td>{{ $item->barang->warna }}</td>
                        <td>{{ $item->barang->kategori->nama_kategori }}</td>
                        <td>
                            <img src="{{ asset('icon/delete.png') }}" alt=".." width="20px" height="20px">
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>                        
    </div>
</div>