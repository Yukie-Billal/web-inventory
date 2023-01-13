<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1">
        <div class="col-12 d-flex justify-content-between align-items-center p-0">
            <div class="col-4 d-flex align-items-center p-0">
                <button class="button button-success text-white text-m-medium" data-bs-toggle="modal" data-bs-target="#ModalDataBarang">
                    Pilih Data Barang
                </button>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button wire:click='confirm' class="button button-success text-white text-m-medium">
                    Confirmasi
                </button>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border" style="border-radius: 18px">
            <table class="table table-hover table-responsive mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangKeluarKeranjangs as $barangKeluarKeranjang)                    
                        <tr>
                            @if ($barangKeluarKeranjang->barang == '')                                
                                <td scope="row">{{ $barangKeluarKeranjang->kode_barang }}</td>
                                <td>{{ $barangKeluarKeranjang->nama_barang }}</td>
                            @else                                
                                <td scope="row">{{ $barangKeluarKeranjang->barang->kode }}</td>
                                <td>{{ $barangKeluarKeranjang->barang->nama_barang }}</td>
                            @endif
                            <td>{{ $barangKeluarKeranjang->tanggal_keluar }}</td>
                            <td>{{ $barangKeluarKeranjang->jumlah_keluar }}</td>
                            <td>
                                <select wire:model.lazy='status' name="status" class="select-form">
                                    <option value="Pinjam" selected>Pinjam</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </td>
                            <td>
                                <span wire:click='deleteBarangKeluarList({{ $barangKeluarKeranjang->id }})' class="tags tags-danger cursor-pointer">
                                    Delete
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>