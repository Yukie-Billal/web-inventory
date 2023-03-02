<div class="card flex-fill border-0" style="min-height: 400px">
    <div class="card-header bg-white border-0">
        <span class="header-s mb-2">Barang Yang Baru Di Pinjam</span>
    </div>
    <div class="card-body p-0 border-neutral-40-2 rounded">
        {{-- <x-table /> --}}
        <table class="table table-hover table-responsive align-middle">
            <thead class="border-neutral-40">
               <tr>
                  <th>Nama Barang</th>
                  <th>Merek</th> 
                  <th>Warna</th>
                  <th>Nama Peminjam</th>
                  <th>No Telepon</th>
                  {{-- <th>Alamat</th> --}}
                  <th>tanggal pinjam</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
                @if ($pinjamans->count() <= 0)
                    <tr class="text-center">
                        <td colspan="7" style="font-size: 16px">Tidak Ada Peminjaman Hari Ini</td>
                    </tr>
                @else                    
                @foreach ($pinjamans as $pinjaman)
                    <tr>
                      <td>{{ $pinjaman->barang->nama_barang }}</td>
                      <td>{{ $pinjaman->barang->merek }}</td>
                      <td>{{ $pinjaman->barang->warna }}</td>
                      <td>{{ $pinjaman->nama_peminjam }}</td>
                      <td>{{ $pinjaman->no_tlp }}</td>
                      <td>{{ $pinjaman->tanggal_pinjam }}</td>
                      <td>{{ $pinjaman->status }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
         </table>
    </div>
</div>