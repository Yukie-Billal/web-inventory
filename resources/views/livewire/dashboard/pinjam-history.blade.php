<div class="card flex-fill border-0">
    <div class="card-header bg-white border-0 header-s">
        <div class="col-12 d-flex align-items-center">            
            Data Pinjaman
            <span class="hover-n-40 ms-3 d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;" wire:click='setType("prev")'>
                <i class="fa fa-chevron-left " style="font-size: 12px;"></i>
            </span>            
            <span class="mx-3">
                {{ $typeName[$type] }}
            </span>
            <span class="hover-n-40 d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;" wire:click='setType("next")'>
                <i class="fa fa-chevron-right" style="font-size: 12px;"></i>
            </span>            
        </div>        
    </div>
    <div class="card-body border-0">
        <div class="col-12 p-0 border-neutral-40-2 rounded">
            <table class="table table-responsive table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Barang</th>
                        <th>Merek</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pinjams as $pinjam)
                    <tr>
                        <td>{{ $pinjam->nama_peminjam }}</td>
                        <td>{{ $pinjam->barang->nama_barang }}</td>
                        <td>{{ $pinjam->barang->merek }}</td>
                        <td>{{ $pinjam->tanggal_pinjam }}</td>
                        <td>{{ $pinjam->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>