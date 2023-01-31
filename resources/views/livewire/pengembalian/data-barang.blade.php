<div class="card flex-fill border-0">
    <div class="card-header bg-white border-0">
        <span class="header-s mb-2">Barang Yang Baru Di Pinjam</span>
    </div>
    <div class="card-body p-0 border-neutral-40-2 rounded">
        <table class="table table-hover table-responsive">
            <thead class="border-neutral-40">
               <tr>
                  <th>Serial Number</th>
                  <th>Nama Barang</th>
                  <th>Merek</th> 
                  <th>Warna</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($barang_pinjams as $pinjam)
               <tr>
                  <td>{{ $pinjam->barang->serial_number }}</td>
                  <td>{{ $pinjam->barang->nama_barang }}</td>
                  <td>{{ $pinjam->barang->merek }}</td>
                  <td>{{ $pinjam->barang->warna }}</td>
                  <td>{{ $pinjam->barang->kategori->nama_kategori }}</td>
                  <td>{{ $pinjam->barang->satuan }}</td>
                  <td>
                     <img src="{{ asset('icon/delete.png') }}" alt=".." style="width: 20px; height: 20px; cursor: pointer;" wire:click='deleteFromKeranjang({{ $pinjam->id }})'>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
    </div>
</div>