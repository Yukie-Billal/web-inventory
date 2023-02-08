<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        Pilih Data Barang
    </div>
    <form wire:submit.prevent="addKeranjang">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-4" wire:ignore>
                    <div class="form-group">
                        <label for="serialNumber" class="text-m-regular">Serial Number</label>
                        <input type="text" id="serialNumber" wire:model.lazy="serialNumber" class="input-form input-form-lg placeholder-m-m" placeholder="Masukkan Serial Number">
                        @error('serialNumber')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4" wire:ignore>
                    <div 
                        class="form-group"
                        id="namaParent"
                    >
                        <label for="searchNamaBarang" class="text-m-regular">Nama Barang</label>
                        <select 
                            id="searchNamaBarang"
                            class="select-form @error('searchNamaBarang') is-invalid @enderror text-m-medium"
                            placeholder="Nama Barang"
                            onchange="getBarang()"
                        >
                         @foreach ($barangs as $barang)
                             <option value="{{ $barang->id }}" class="text-m-medium" onclick="console.log('Hover')">{{ $barang->nama_barang }}</option>
                         @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-4" wire:ignore>
                    <div class="form-group">
                        <label for="merek" class="text-m-regular">Merek</label>
                        <input type="text" wire:model.lazy="merek" class="input-form input-form-lg placeholder-m-m" id="merek" placeholder="Merek Barang" disabled>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-3">
                <div class="col-12 d-flex">
                    <div class="col-3 me-2">
                        <div class="form-group">
                            <label for="warna" class="text-m-regular">Warna</label>
                            <input type="text" wire:model.lazy="warna" class="input-form input-form-lg placeholder-m-m" id="warna" placeholder="Warna Barang" disabled>
                        </div>
                    </div>
                    <div class="col-3 mx-2">
                        <div class="form-group">
                            <label for="kategori" class="text-m-regular">kategori</label>
                            <input type="text" wire:model.lazy="kategori" class="input-form input-form-lg placeholder-m-m" id="kategori" placeholder="Kategori" disabled>
                        </div>
                    </div>
                    <div class="col-3 mx-2">
                        <div class="form-group">
                            <label for="satuan" class="text-m-regular">satuan</label>
                            <input type="text" wire:model.lazy="satuan" class="input-form input-form-lg placeholder-m-m" id="satuan" placeholder="Satuan Barang" disabled>
                        </div>
                    </div>
                    <div class="col-1 ps-1">
                        <div class="form-group">
                            <label for="Jml" class="text-m-regular">Jumlah</label>
                            <input type="number" wire:model.lazy="jumlah" class="input-form input-form-lg placeholder-m-m" id="Jml" placeholder="Jml">
                         </div>
                    </div>
                </div>            
            </div>
            <div class="row justify-content-end mt-1">
                <div class="col-3 d-flex justify-content-end">
                    <button class="button button-success text-white text-m-medium me-2">
                        <i class="fa fa-plus me-2"></i>
                        Tambah
                    </button>
                </div>            
            </div>
        </div>
    </form>    
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#searchNamaBarang').select2({
                dropdownParent: $('#namaParent'),
            });
        });

        function getBarang() {
            const id = document.querySelector('#searchNamaBarang').value;
            Livewire.emit('setBarang', id);
        }

        Livewire.on('200', function (message) {
            Swal.fire({
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 2000,    
            });
        });
        Livewire.on('400', function (message) {
            Swal.fire({
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 2000,    
            });
        })
        Livewire.on('500', function (message) {
            Swal.fire({
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 2000,    
            });
        })
    </script>

    <script>
        const jml = document.querySelector('#Jml');
        jml.addEventListener('keyup', function () {
            if (jml.value <= 0) {
                jml.value = 1;
            }
        })
    </script>
@endpush
