<form wire:submit.prevent='submit'>
    <div class="row">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex flex-column">
                    <span class="header-m mb-2">Data Barang</span>
                    <p class="text-m-medium">Jika Barangnya Sama Silahkan Masukkan Serial Number !!!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaBarang" class="text-m-regular">Nama Barang</label>
                                <input type="text" wire:model.lazy='namaBarang' id="namaBarang" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Nama Barang">
                                @error('namaBarang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="serialNumber" class="text-m-regular">Serial Number</label>
                                <input type="text" wire:model.lazy='serialNumber' id="serialNumber" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Number Serial">
                                @error('serialNumber')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="merek" class="text-m-regular">Merek Barang</label>
                                <input type="text" wire:model.lazy='merek' id="merek" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukan Merek Barang">
                                @error('merek')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="warna" class="text-m-regular">Warna Barang</label>
                                <input type="text" wire:model.lazy='warna' id="warna" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Masukkan Warna Barang">
                                @error('warna')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 d-flex justify-content-between">
                            <div class="col-5 pe-2">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="select-form" id="kategori" wire:change="$emit('kategoriCovery')">
                                        <option selected disabled>-- Pilih Kategori --</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-5 pe-2">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="select-form" id="satuan" wire:change='$emit("satuanCovery")'>
                                        <option selected disabled>-- Pilih Satuan --</option>
                                        <option value="Pcs / Buah">Pcs / Buah</option>
                                        <option value="Box / Dus">Box / Dus</option>
                                    </select>
                                    @error('satuan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2 pe-2">
                                <div class="form-group">
                                    <label for="jumlah" class="text-m-regular">Jumlah</label>
                                    <input type="number" wire:model.defer='qty' id="jumlah" class="input-form w-100 placeholder-m-m" style="height: 36px" placeholder="QTY" value="1">
                                    @error('qty')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-2">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0 d-flex flex-column">
                    <span class="header-m mb-2">Data Supplier</span>
                    <p class="text-m-medium">Harap Isi data dibawah ini sebelum mengkonfirmasi barang masuk !!!</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaSupplier" class="text-m-regular">Nama Supplier</label>
                                <input type="text" wire:model.lazy='namaSupplier' id="namaSupplier" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="ketik Manual Dulu">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaPeruhasaan" class="text-m-regular">Nama Perusahaan</label>
                                <input type="text" wire:model.lazy='namaPeruhasaan' id="namaPeruhasaan" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="Ketik Manual Dulu">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="noTlp" class="text-m-regular">No Telephone</label>
                                <input type="text" wire:model.lazy='noTlp' id="noTlp" class="input-form w-100 placeholder-m-m" style="height: 40px" placeholder="+62 812 7062 5012">
                                <small class="text-muted">Boleh Kosong !!</small>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                              <label for="alamatSupplier">Alamat</label>
                              <textarea class="form-control placeholder-m-m" wire:model.defer='alamatSupplier' id="alamatSupplier" rows="3" placeholder="Alamat Lengkap Supplier"></textarea>
                              <small class="text-muted">Boleh Kosong !!</small>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-2">
                            <button class="button button-success text-white">
                                <i class="fa fa-clipboard me-1" aria-hidden="true"></i>
                                Konfirmasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('body-script')
    <script>
        const inputJumlah = document.querySelector('#jumlah');
        function cekQty() {
            if (inputJumlah.value <= 0 || inputJumlah.value == '') {
                inputJumlah.value = 1;
            }
        }
        inputJumlah.addEventListener('keyup', cekQty);
        inputJumlah.addEventListener('change', cekQty);
    </script>
@endpush

@push('script-livewire')
    <script>
        Livewire.on('kategoriCovery', function () {
            const value = document.querySelector('#kategori').value;            
            const params = [value];
            Livewire.emit('setKategori', params);
        });

        Livewire.on('satuanCovery', function () {
            const value = document.querySelector('#satuan').value;
            const params = [value];
            Livewire.emit('setSatuan', params);
        })
    </script>
@endpush