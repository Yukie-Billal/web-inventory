<form wire:submit.prevent='addPeminjaman'>
    <div class="card flex-fill border-0">
        <div class="card-header bg-white border-0 d-flex flex-column">
            <span class="header-m mb-2">Data Peminjam</span>
            <p class="text-m-medium">Harap Isi data dibawah ini sebelum mengkonfirmasi !!!</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="namaLengkap" class="text-m-regular">Nama Peminjam</label>
                        <input type="text" wire:model.lazy='nama' id="namaLengkap" class="input-form input-form-xl" placeholder="Masukan Nama Lengkap">
                        @error('nama')                        
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="noTlp" class="text-m-regular">No Telephone</label>
                        <input type="text" wire:model.lazy='no_tlp' id="noTlp" class="input-form input-form-xl" placeholder="0812 2344 7812">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-8">
                    <div class="form-group">
                        <label for="alamat" class="text-m-regular">Tanggal Pinjam</label>
                        <input type="date" wire:model.lazy="tanggalPinjam" class="input-form input-form-lg">
                    </div>
                </div>
            </div>
            <div class="row justify-content-end my-3">
                <div class="col-2">
                    <button class="button button-success text-white">
                        <img src="{{ asset('icon/konfirmasi.png') }}" alt=".." style="width: 16px; height: 16px;">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>