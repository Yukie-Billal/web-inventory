<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="modal-add-title fw-semibold text-neutral-80">Buat Data Barang Baru!!</div>
            <hr class="mt-2">
        </div>
    </div>
    <form wire:submit.prevent='addBarang'>
        <div class="row mb-3">
            <div class="col-6 p-0">
                <div class="form-group">
                  <label for="kode" class="text-neutral-80">Kode Barang</label>
                  <input type="text" wire:model.lazy='kode' name="kode" class="input-form @error('NamaBarang') invalid-input @enderror" id="kode" placeholder="Masukkan Kode Barang">
                </div>
            </div>
            <div class="col-6 p-0 d-flex justify-content-end">
                <div class="form-group">
                    <label for="nama" class="text-neutral-80">Nama Barang</label>
                    <input type="text" wire:model.lazy='NamaBarang' name="NamaBarang" class="input-form @error('NamaBarang') invalid-input @enderror" id="nama" placeholder="Masukkan Nama Barang">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 p-0">
                <div class="form-group">
                    <label for="stok" class="text-neutral-80">Stok Barang</label>
                    <input type="text" wire:model.lazy='stok' name="stok" class="input-form @error('NamaBarang') invalid-input @enderror" id="stok" placeholder="Masukkan Stok Barang">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group h-100 d-flex justify-content-center align-items-end">
                    <button type="submit" class="button button-success text-l-regular text-white" data-bs-dismiss="modal">Buat Data Baru</button>
                </div>
            </div>
        </div>
    </form>
</div>