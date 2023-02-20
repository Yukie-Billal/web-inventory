<div class="card flex-fill border-0" style="min-height: 400px">
    <div class="card-header bg-white border-0">
        <div class="row">
            <div class="col-12">
                <span class="header-s mb-1">Data - Data Pengembalian</span>
            </div>
        </div>
        <div class="row justify-content-end">
            <livewire:pagination-view col='9' :page='$page' pageName='pinjam' :pageCount='$pageCount' >
        </div>
    </div>
    <div class="card-body p-0 border-neutral-40-2 rounded">
        <table class="table table-hover table-responsive">
            <thead class="border-neutral-40">
               <tr>
                  <th>Nama Barang</th>
                  <th>Serial Number</th>
                  <th>Merek</th> 
                  <th>Warna</th>
                  <th>Nama Pengembali</th>
                  <th>Lama Pinjam</th>
                  <th>Tanggal Kembali</th>
               </tr>
            </thead>
            <tbody>
                @if ($kembalis->count() <= 0)
                    <tr class="text-center">
                        <td colspan="8" style="font-size: 16px">Data Tidak Tersedia</td>
                    </tr>
                @else                            
                @foreach ($kembalis as $kembali)                            
                <tr>
                   <td>{{ $kembali->barang->nama_barang }}</td>
                   <td>{{ $kembali->barang->serial_number }}</td>
                   <td>{{ $kembali->barang->merek }}</td>
                   <td>{{ $kembali->barang->warna }}</td>
                   <td>{{ $kembali->nama_pengembali }}</td>
                   <td>{{ $kembali->lama_pinjam }}</td>
                   <td>{{ $kembali->tanggal_kembali }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>