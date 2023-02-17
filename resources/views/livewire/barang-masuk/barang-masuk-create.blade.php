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
                            <x-forms.group>
                                <label for="namaBarang" class="text-m-regular">Nama Barang</label>
                                <x-forms.text-input
                                    wire:model.lazy='namaBarang'
                                    class="input-form-lg @error('namaBarang') is-invalid @enderror"
                                    placeholder="Masukan Nama Barang .."
                                    id="namaBarang"
                                />
                                @error('namaBarang')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </x-forms.group>
                        </div>
                        <div class="col-6">
                            <x-forms.group>
                                <label for="serialNumber" class="text-m-regular">Serial Number</label>
                                <x-forms.text-input
                                    wire:model.lazy='serialNumber'
                                    id="serialNumber"
                                    class="input-form-lg @error('serialNumber') is-invalid @enderror"
                                    placeholder="Masukan Number Serial"
                                />
                                @error('serialNumber')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </x-forms.group>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <x-forms.group>
                                <label for="merek" class="text-m-regular">Merek Barang</label>
                                <x-forms.text-input
                                    wire:model.lazy="merek"
                                    class="input-form-lg @error('merek') is-invalid @enderror"
                                    placeholder="Masukan Merek Barang"
                                    id="merek"
                                />
                                @error('merek')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </x-forms.group>
                        </div>
                        <div class="col-6">
                            <x-forms.group>
                                <label for="warna" class="text-m-regular">Warna Barang</label>
                                <x-forms.text-input
                                    wire:model.lazy='warna'
                                    class="input-form-lg @error('warna') is-invalid @enderror"
                                    placeholder="Masukkan Warna Barang"
                                    id="warna"
                                />
                                @error('warna')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </x-forms.group>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 d-flex justify-content-between">
                            <div class="col-5 pe-2" wire:ignore>
                                <x-forms.group id="parentKategori" >
                                    <label for="kategori" class="text-m-regular">Kategori</label>
                                    <select 
                                        class="select-form @error('kategori') is-invalid @enderror"
                                        id="kategori"
                                        onchange="getKategori()"
                                    >
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <small class="text-danger text-s-medium">{{ $message }}</small>
                                    @enderror
                                </x-forms.group>
                            </div>
                            <div class="col-2 pe-2">
                                <x-forms.group>
                                    <label for="jumlah" class="text-m-regular">Jumlah</label>
                                    <input type="number" wire:model.defer='qty' id="jumlah" class="input-form placeholder-m-m @error('qty') is-invalid @enderror " style="height: 36px" placeholder="QTY" value="1">
                                    @error('qty')
                                        <small class="text-danger text-s-medium">{{ $message }}</small>
                                    @enderror
                                </x-forms.group>
                            </div>
                            <div class="col-5 pe-2">
                                <x-forms.group>
                                    <label class="text-m-regular">Satuan</label>
                                    <select class="select-form @error('satuan') is-invalid @enderror" id="satuan" wire:change='$emit("satuanCovery")'>
                                        <option selected disabled>-- Pilih Satuan --</option>
                                        <option value="Pcs / Buah">Pcs / Buah</option>
                                        <option value="Box / Dus">Box / Dus</option>
                                    </select>
                                    @error('satuan')
                                        <small class="text-danger text-s-medium">{{ $message }}</small>
                                    @enderror
                                </x-forms.group>
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
                        <div class="col-6" wire:ignore>
                            <x-forms.group id="parentSupplier">
                                <label for="namaSupplier" class="text-m-regular">Nama Supplier</label>
                                <select id="namaSupplier"
                                    class="select-form @error('namaSupplier') is-invalid @enderror"
                                    onchange="getSupplier()" 
                                >
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" class="text-m-regular">{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                @error('namaSupplier')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </x-forms.group>
                        </div>
                        <div class="col-6">
                            <x-forms.group>
                                <label for="namaPerusahaan" class="text-m-regular">Nama Perusahaan</label>
                                <x-forms.text-input
                                    wire:model.lazy="namaPerusahaan"
                                    id="namaPerusahaan"
                                    class="input-form-lg @error('namaPerusahaan') is-invalid @enderror"
                                    placeholder="Nama Perusahaan"
                                    :disabled="!$s_baru"
                                />
                                {{ $s_baru  .'---'. !$s_baru}}
                                @error('namaPerusahaan')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </x-forms.group>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="noTlp" class="text-m-regular">No Telephone</label>
                                <input type="text" wire:model.lazy='noTlp' id="noTlp" class="input-form placeholder-m-m @error('noTlp') is-invalid @enderror" style="height: 40px" placeholder="+62 812 7062 5012" {{ $s_baru == false ? 'disabled':''}}>
                                @error('noTlp')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                                <small class="text-muted text-s-medium">Boleh Kosong !!</small>
                            </div>
                        </div>
                        <div class="col-8">
                            <x-forms.group>
                                <label for="alamatSupplier" class="text-m-regular">Alamat</label>
                                <textarea class="placeholder-m-m text-area-form @error('text-area-form') is-invalid @enderror" wire:model.lazy='alamatSupplier' id="alamatSupplier" rows="3" placeholder="Alamat Lengkap Supplier" {{ $s_baru == false ? 'disabled':''}}></textarea>
                                @error('alamatSupplier')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                                <small class="text-muted text-s-medium">Boleh Kosong !!</small>
                            </x-forms.group>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-2">
                            <button class="button button-success">
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

@push('scripts')
    <script>        
        $(document).ready(function() {
            $('#namaSupplier').select2({
                tags: true,
                placeholder: "Masukkan Nama Supplier",
                dropdownParent: $('#parentSupplier'),
            });
            $('#kategori').select2({
                tags: true,
                placeholder: "Buat / Pilih Kategori",
                dropdownParent: $('#parentKategori'),
            });
        });
        function getKategori() {
            const value = document.querySelector('#kategori').value;
            Livewire.emit('setKategori', value);
        }

        Livewire.on('satuanCovery', function () {
            const value = document.querySelector('#satuan').value;
            const params = [value];
            Livewire.emit('setSatuan', params);
        });
        const input = document.querySelector('#namaSupplier');
        function getSupplier() {
            var id = input.value;
            Livewire.emit('setSupplier', id);
        }
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

<x-alert.sweet-alert />