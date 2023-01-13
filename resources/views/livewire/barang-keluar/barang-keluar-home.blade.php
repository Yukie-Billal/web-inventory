<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white">
        <a href="/barang/keluar" class="text-decoration-none fs-6">
            <button class="button button-primary text-white">
                View All
            </button>
        </a>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border" style="border-radius: 18px">
            <table class="table table-hover table-responsive mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>QTY</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangKeluars as $barangKeluar)
                        <tr>
                            @if ($barangKeluar->barang == '')                                
                                <td scope="row">{{ $barangKeluar->kode_barang }}</td>
                                <td>{{ $barangKeluar->nama_barang }}</td>
                            @else                                
                                <td scope="row">{{ $barangKeluar->barang->kode }}</td>
                                <td>{{ $barangKeluar->barang->nama_barang }}</td>
                            @endif
                            <td>{{ $barangKeluar->jumlah_keluar }}</td>
                            <td>{{ $barangKeluar->tanggal_keluar }}</td>
                            <td>
                                @if ($barangKeluar->status == 'Di Pinjam')
                                    <span class="badge text-dark fw-normal" style="background: #F5F5FF; border: 1px solid #B8DBCA; padding: 2px 8px; font-size: 12px; line-height: 16px;">{{ $barangKeluar->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>