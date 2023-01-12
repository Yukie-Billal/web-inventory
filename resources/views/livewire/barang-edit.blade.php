<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="modal-add-title fw-semibold text-neutral-80">Edit Data Barang !!</div>
            <hr class="mt-2">
        </div>
    </div>
    <form wire:submit.prevent='updateBarang'>
        <div class="row mb-3">
            <div class="col-6 p-0">
                <div class="form-group">
                    <label for="kode" class="text-neutral-80">Kode Barang</label>
                    <input type="text" wire:model.defer='kode' class="input-form" id="kode" placeholder="Kode Barang">
                    <input type="hidden" wire:model.defer='idBarang'>
                </div>
            </div>
            <div class="col-6 p-0 d-flex justify-content-end">
                <div class="form-group">
                    <label for="nama" class="text-neutral-80">Nama Barang</label>
                    <input type="text" wire:model.defer='namaBarang' class="input-form" id="nama" placeholder="Nama Barang">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 p-0">
                <div class="form-group">
                    <label for="stok" class="text-neutral-80">Stok Barang</label>
                    <input type="text" wire:model.defer='stok' class="input-form" id="stok" placeholder="Stok Barang">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group h-100 d-flex justify-content-center align-items-end">
                    <button type="submit" class="button button-success text-l-regular text-white">Edit Data Barang</button>
                </div>
            </div>
        </div>
    </form>
</div>