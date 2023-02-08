{{-- @push('links')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endpush --}}
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
                                <input type="text" wire:model.lazy='namaBarang' id="namaBarang" class="input-form w-100 placeholder-m-m @error('namaBarang') is-invalid @enderror" style="height: 40px" placeholder="Masukan Nama Barang">
                                @error('namaBarang')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="serialNumber" class="text-m-regular">Serial Number</label>
                                <input type="text" wire:model.lazy='serialNumber' id="serialNumber" class="input-form placeholder-m-m @error('serialNumber') is-invalid @enderror" style="height: 40px" placeholder="Masukan Number Serial">
                                @error('serialNumber')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="merek" class="text-m-regular">Merek Barang</label>
                                <input type="text" wire:model.lazy='merek' id="merek" class="input-form placeholder-m-m @error('merek') is-invalid @enderror" style="height: 40px" placeholder="Masukan Merek Barang">
                                @error('merek')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="warna" class="text-m-regular">Warna Barang</label>
                                <input type="text" wire:model.lazy='warna' id="warna" class="input-form placeholder-m-m @error('warna') is-invalid @enderror" style="height: 40px" placeholder="Masukkan Warna Barang">
                                @error('warna')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 d-flex justify-content-between">
                            <div class="col-5 pe-2">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="select-form @error('kategori') is-invalid @enderror" id="kategori" wire:change="$emit('kategoriCovery')">
                                        <option selected disabled>-- Pilih Kategori --</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <small class="text-danger text-s-medium">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2 pe-2">
                                <div class="form-group">
                                    <label for="jumlah" class="text-m-regular">Jumlah</label>
                                    <input type="number" wire:model.defer='qty' id="jumlah" class="input-form placeholder-m-m @error('qty') is-invalid @enderror " style="height: 36px" placeholder="QTY" value="1">
                                    @error('qty')
                                        <small class="text-danger text-s-medium">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-5 pe-2">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="select-form @error('satuan') is-invalid @enderror" id="satuan" wire:change='$emit("satuanCovery")'>
                                        <option selected disabled>-- Pilih Satuan --</option>
                                        <option value="Pcs / Buah">Pcs / Buah</option>
                                        <option value="Box / Dus">Box / Dus</option>
                                    </select>
                                    @error('satuan')
                                        <small class="text-danger text-s-medium">{{ $message }}</small>
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
                        <div class="col-6" wire:ignore>
                            {{-- CHOOSE ONE --}}
                            <div class="form-group"
                                id="namaParent" 
                                x-data="{ message: '' }"
                            >
                                <label for="namaSupplier" class="text-m-regular">Nama Supplier</label>
                                <select id="namaSupplier"
                                    class="select-form @error('namaSupplier') is-invalid @enderror"
                                    placeholder="Nama Supplier"
                                    onchange="getInput()" 
                                >
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" class="text-m-regular">{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                <span x-text="message">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="namaPerusahaan" class="text-m-regular">Nama Perusahaan</label>
                                <input type="text" wire:model.lazy='namaPerusahaan' id="namaPerusahaan" class="input-form placeholder-m-m @error('namaPerusahaan') is-invalid @enderror" style="height: 40px" placeholder="Ketik Manual Dulu" {{ $s_baru == false ? 'disabled':''}}>
                                @error('namaPerusahaan')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                            </div>
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
                            <div class="form-group">
                                <label for="alamatSupplier" class="text-m-regular">Alamat</label>
                                <textarea class="placeholder-m-m text-area-form @error('text-area-form') is-invalid @enderror" wire:model.defer='alamatSupplier' id="alamatSupplier" rows="3" placeholder="Alamat Lengkap Supplier" {{ $s_baru == false ? 'disabled':''}}></textarea>
                                @error('alamatSupplier')
                                    <small class="text-danger text-s-medium">{{ $message }}</small>
                                @enderror
                                <small class="text-muted text-s-medium">Boleh Kosong !!</small>
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

@push('script-livewire')
    {{-- For Livewire --}}
    <script>        
        $(document).ready(function() {
            $('#namaSupplier').select2({
                tags: true,
                placeholder: "Masukkan Nama Supplier",
                dropdownParent: $('#namaParent'),
            });
        });
        Livewire.on('kategoriCovery', function () {
            const value = document.querySelector('#kategori').value;
            const params = [value];
            Livewire.emit('setKategori', params);
        });

        Livewire.on('satuanCovery', function () {
            const value = document.querySelector('#satuan').value;
            const params = [value];
            Livewire.emit('setSatuan', params);
        });
        Livewire.on('barangMasukAdded', (params) => {
            Swal.fire({
                icon: 'success',
                title: params,
                showConfirmButton: false,
                timer: 5000
            });    
        });

        Livewire.on('getSupplier', () => {
            const input = document.querySelector('#namaSupplier');
            const nama = input.value;
            const params = [false, input, nama];
            console.log(params);
            Livewire.emit('setSupplier', params);
        });

        const input = document.querySelector('#namaSupplier');
        const option = document.querySelectorAll('.input-option option');

        function getInput() {
            var id = input.value;
            Livewire.emit('setSupplier', id);
        }
    </script>
    {{-- Non Livewire --}}
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