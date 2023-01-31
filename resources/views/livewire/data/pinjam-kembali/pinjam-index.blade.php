{{-- <div class="row my-5">
    <div class="col-12"> --}}
        <div class="card flex-fill border-0" style="min-height: 400px">
            <div class="card-header bg-white border-0">
                <div class="row">
                    <div class="col-12">
                        <span class="header-s mb-1">Data - Data Peminjaman</span>
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
                          <th>Nama Peminjam</th>
                          <th>No Telepon</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                       </tr>
                    </thead>
                    <tbody>
                        @if ($pinjams->count() <= 0)
                            <tr class="text-center">
                                <td colspan="8" style="font-size: 16px">Belum Ada Pinjaman</td>
                            </tr>
                        @else                            
                        @foreach ($pinjams as $pinjam)                            
                        <tr>
                           <td>{{ $pinjam->barang->nama_barang }}</td>
                           <td>{{ $pinjam->barang->serial_number }}</td>
                           <td>{{ $pinjam->barang->merek }}</td>
                           <td>{{ $pinjam->barang->warna }}</td>
                           <td>{{ $pinjam->nama_peminjam }}</td>
                           <td>{{ $pinjam->no_tlp }}</td>
                           <td>{{ $pinjam->tanggal_pinjam }}</td>
                           <td>{{ $pinjam->status }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                 </table>
            </div>
        </div>
    {{-- </div>
</div> --}}