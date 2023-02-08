<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="modal-add-title header-m">Edit Data Supplier</div>
            <div class="text-s-medium text-center">harap jangan menghapus data yang sudah ada !!</div>
            <hr class="mt-2 mb-1">
        </div>
    </div>
    <form wire:submit.prevent='updateSupplier'>
        <div class="row mb-3">
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="sn" class="text-neutral-90 text-m-medium">Nama Supplier</label>
                    <input type="text" wire:model.lazy='nama_supplier' class="input-form text-m-medium placeholder-m-m" id="sn" placeholder="Nama Supplier">
                    @error('nama_supplier')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="hidden" wire:model.lazy='supplierId'>
                </div>
            </div>
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="nama" class="text-neutral-90 text-m-medium">Nama Perusahaan</label>
                    <input type="text" wire:model='nama_perusahaan' class="input-form text-m-medium placeholder-m-m" id="nama" placeholder="Nama Perusahaan">
                    @error('nama_perusahaan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="no_tlp" class="text-neutral-90 text-m-medium">No Telephone</label>
                    <input type="text" wire:model.lazy='no_tlp' class="input-form text-m-medium placeholder-m-m" id="no_tlp" placeholder="No Telephone">
                    @error('no_tlp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="alamat" class="text-neutral-90 text-m-medium">Alamat</label>
                    <input type="text" wire:model.lazy='alamat' class="input-form text-m-medium placeholder-m-m" id="alamat" placeholder="Warna Barang">
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2 h-100 d-flex justify-content-center align-items-end">
                    <button type="submit" class="button button-success text-l-regular text-white w-50" data-bs-dismiss="modal">
                        <img src="{{ asset('icon/edit.png') }}" style="width: 16px; height: 16px; filter: brightness(10.0);" class="me-1" alt="..">
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>