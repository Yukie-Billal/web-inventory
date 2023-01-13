<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="modal-add-title fw-semibold text-neutral-80">Buat Data Barang Baru!!</div>
            <hr class="mt-2">
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th></th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->kode }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>
                            <div wire:click='AddBarangKeluarList({{ $barang->id }})' class="tags tags-success" style="cursor: pointer;" data-bs-dismiss="modal">
                                Pilih
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>