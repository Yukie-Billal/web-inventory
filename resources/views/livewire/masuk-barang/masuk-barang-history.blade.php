<div class="card flex-fill border-0" style="min-height: 400px">
    <div class="card-header bg-white border-0">
        <span class="header-s mb-2">Data Barang Yang Baru Ditambahkan</span>
    </div>
    <div class="card-body p-0 border-neutral-40-2 rounded">
        <table class="table table-hover table-responsive">
            <thead class="border-neutral-40">
               <tr>
                  <th>Serial Number</th>
                  <th>Nama Barang</th>
                  <th>Merek</th> 
                  <th>Warna</th>
                  <th>Qty</th>
                  <th>Satuan</th>
                  <th>Kategori</th>
                  <th>Supplier</th>
                  <th>Perusahaan</th>
               </tr>
            </thead>
            <tbody>
                @foreach ($masuk_barangs as $masuk_barang)
                    <tr>
                        <td>{{ $masuk_barang->serial_number }}</td>
                        <td>{{ $masuk_barang->nama_barang }}</td>
                        <td>{{ $masuk_barang->merek }}</td>
                        <td>{{ $masuk_barang->warna }}</td>
                        <td>{{ $masuk_barang->qty }}</td>
                        <td>{{ $masuk_barang->satuan }}</td>
                        @if ($masuk_barang->kategori != null)
                            <td>{{ $masuk_barang->kategori->nama_kategori }}</td>
                        @else
                            <td><i>null</i></td>
                        @endif
                        @if ($masuk_barang->supplier != null)
                            <td>{{ $masuk_barang->supplier->nama_supplier }}</td>
                            <td>{{ $masuk_barang->supplier->nama_perusahaan }}</td>
                        @else
                            <td>null</td>
                            <td>null</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
         </table>
    </div>
</div>