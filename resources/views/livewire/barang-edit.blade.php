<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="modal-add-title header-m">Edit Data Barang</div>
            <div class="text-s-medium text-center">harap jangan menghapus data yang sudah ada !!</div>
            <hr class="mt-2 mb-1">
        </div>
    </div>
    <form wire:submit.prevent='updateBarang'>
        <div class="row mb-3">
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="sn" class="text-neutral-90 text-m-medium">Serial Number</label>
                    <input type="text" wire:model.lazy='serialNumber' class="input-form text-m-medium placeholder-m-m" id="sn" placeholder="Serial Number">
                    @error('serialNumber')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="hidden" wire:model.lazy='idBarang'>
                </div>
            </div>
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="nama" class="text-neutral-90 text-m-medium">Nama Barang</label>
                    <input type="text" wire:model='namaBarang' class="input-form text-m-medium placeholder-m-m" id="nama" placeholder="Nama Barang">
                    @error('namaBarang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="merek" class="text-neutral-90 text-m-medium">Merek Barang</label>
                    <input type="text" wire:model.lazy='merek' class="input-form text-m-medium placeholder-m-m" id="merek" placeholder="Merek Barang">
                    @error('merek')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="warna" class="text-neutral-90 text-m-medium">Warna Barang</label>
                    <input type="text" wire:model.lazy='warna' class="input-form text-m-medium placeholder-m-m" id="warna" placeholder="Warna Barang">
                    @error('warna')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-5 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label class="text-neutral-90 text-m-medium" for="kategori">Kategori</label>
                    <select class="select-form text-m-medium" id="kategori" wire:change="$emit('kategoriCovery')">
                        <option disabled>-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $kategoriId == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategoriId')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-2 p-0 d-flex justify-content-center px-1">
                <div class="form-group w-100 px-2">
                    <label for="stokEdit" class="text-m-regular">Stok</label>
                    <input type="text" wire:model.lazy='stok' id="stokEdit" class="input-form text-m-medium placeholder-m-m" placeholder="stok">
                    @error('stok')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-5 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label class="text-neutral-90 text-m-medium" for="stok">Satuan</label>
                    <select class="select-form text-m-medium" id="satuan" wire:change='$emit("satuanCovery")'>
                        <option disabled>-- Pilih Satuan --</option>
                        <option value="Pcs / Buah" {{ $satuan == 'Pcs / Buah' ? 'selected' : '' }}>Pcs / Buah</option>
                        <option value="Box / Dus" {{ $satuan == 'Box / Dus' ? 'selected' : '' }}>Box / Dus</option>
                    </select>
                    @error('satuan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 p-0 d-flex justify-content-center">
                <div class="form-group w-100 px-2">
                    <label for="barcode" class="text-neutral-90 text-m-medium">Kode Barcode</label>
                    <input type="text" wire:model.lazy='barcode' class="input-form text-m-medium placeholder-m-m" id="barcode" placeholder="Stok Barang">
                    @error('serialNumber')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
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

@push('scripts')
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
    <script>
        var huruf = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","`","~","!","@","#","$","%","^","&","*","(",")","-","_","=","+","|","]","[","{","}","'",'"',";",":","/",",","<",">",".","?"];
        var angka = [1,2,3,4,5,6,7,8,9,0];
        const inputJumlah = document.querySelector('#stokEdit');
        function cekQty() {
            if (inputJumlah.value <= 0 || inputJumlah.value == '') {
                inputJumlah.value = 1;
            }
            for (var i = huruf.length - 1; i >= 0; i--) {
                if ((inputJumlah.value).slice((inputJumlah.value).length - 1) == huruf[i]) {
                    inputJumlah.value = (inputJumlah.value).slice(0, (inputJumlah.value).length - 1);
                }
                if ((inputJumlah.value).slice(0, 1) == huruf[i]) {
                    inputJumlah.value = (inputJumlah.value).slice(1, (inputJumlah.value).length);;
                }
            }
            // for (var i = angka.length - 1; i >= 0; i--) {
            //     if ((inputJumlah.value).slice((inputJumlah.value).length - 1) == angka[i]) {
                    
            //     } else {
            //         inputJumlah.value = (inputJumlah.value).slice(0, (inputJumlah.value).length - 1);
            //     }
            //     if ((inputJumlah.value).slice(0, 1) == angka[i]) {
                    
            //     } else {
            //         inputJumlah.value = (inputJumlah.value).slice(1, (inputJumlah.value).length);
            //     }
            // }
        }
        inputJumlah.addEventListener('keyup', cekQty);
        inputJumlah.addEventListener('keydown', cekQty);
        inputJumlah.addEventListener('change', cekQty);
    </script>
@endpush