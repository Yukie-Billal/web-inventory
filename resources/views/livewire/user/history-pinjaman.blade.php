<div class="card flex-fill m-0 rounded bg-white mt-4 p-3 my-shadow-2">
    <div class="card-header bg-white header-m mb-3 ps-4 p-2">
        Data Pinjaman
    </div>
    <div class="card-body border-0 p-0">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Merek</th>
                    <th>Warna</th>
                    <th>kategori</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjamans as $pinjaman)
                <tr>
                    <td>{{ $pinjaman->barang->nama_barang }}</td>
                    <td>{{ $pinjaman->barang->merek }}</td>
                    <td>{{ $pinjaman->barang->warna }}</td>
                    <td>{{ $pinjaman->barang->kategori->nama_kategori }}</td>
                    <td>{{ $pinjaman->status }}</td>
                    <td>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>