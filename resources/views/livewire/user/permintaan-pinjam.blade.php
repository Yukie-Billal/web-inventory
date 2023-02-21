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
                @if ($keranjangs->count() == 0)
                <tr class="text-center">
                    <td colspan="8" style="font-size: 16px;">Kosong</td>
                </tr>
                @else
                @foreach ($keranjangs as $keranjang)
                    <tr>
                        <td>{{ $keranjang->barang->nama_barang }}</td>
                        <td>{{ $keranjang->barang->merek }}</td>
                        <td>{{ $keranjang->barang->warna }}</td>
                        <td>{{ $keranjang->barang->kategori->nama_kategori }}</td>
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