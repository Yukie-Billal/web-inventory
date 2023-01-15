<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="modal-add-title fw-semibold text-neutral-80">Buat Data Barang Baru!!</div>
            <hr class="mt-2">
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-4 d-flex justify-content-end">
            <div class="input-group" style="height: 38px; width: 204px;">
                <input type="text" wire:model.debounce.500ms='search' class="form-control border-end-0" placeholder="Search . . ." aria-describedby="btnGroupAddon">
                <button wire:click='$refresh' class="input-group-text bg-transparent border border-start-0" id="btnGroupAddon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
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
                            @php
                                Request::is('barang/masuk') ? $where = 'm' : $where = 'k';
                            @endphp
                            <input type="hidden" wire:model.lazy='where'>
                            <div wire:click='AddBarangList({{ $barang->id }})' class="tags tags-success" style="cursor: pointer;" data-bs-dismiss="modal">
                                Pilih
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>