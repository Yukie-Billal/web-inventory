<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1 header-s">
        Cari Berdasarkan Serial Number Atau Nama Barang
    </div>
    <form wire:submit.prevent="addKeranjang">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-6" wire:ignore>
                    <div class="form-group" id="serialParent" wire:ignore>
                        <label for="serialNumber" class="text-m-regular">Serial Number</label>
                        {{-- <input type="text" id="" wire:model.lazy="serialNumber" class="input-form input-form-lg placeholder-m-m" placeholder="Masukkan Serial Number"> --}}

                        <select class="select-form" id="serialNumber" onchange="getSerialNum()">
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->serial_number }}">{{ $barang->serial_number }}</option>
                            @endforeach
                        </select>
                        @error('serialNumber')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div> 
            </div>
            <div class="row my-4">
                <div class="col-12" wire:ignore>
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
                                <option value="{{ $barang->id }}" class="text-m-medium">{{ $barang->nama_barang }} / {{ $barang->warna }} / {{ $barang->merek }}</option>
                            @endforeach
                        </select>
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

            $('#serialNumber').select2({
                tags: true,
                dropdownParent: $('#serialParent'),
            });
        });

        function getSerialNum() {
            const value = document.querySelector('#serialNumber').value;
            const params = ['serial', value];
            Livewire.emit('setBarcode', params)
        }

        function getBarang() {
            const id = document.querySelector('#searchNamaBarang').value;
            const params = ['nama', id];
            Livewire.emit('setBarcode', params);
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

        Livewire.on('404', function (message) {
            Swal.fire({
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 2000,    
            });  
        });
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
        const jml = document.querySelectorAll('.jml');
        jml.forEach((item) => {
            let valueinput = 1;
            item.addEventListener('keyup', function () {
                if (item.value <= 0) {
                    item.value = valueitem;
                } else {
                    valueitem = item.value;
                }
            });
            item.addEventListener('change', function () {
                if (item.value <= 0) {
                    item.value = valueitem;
                } else {
                    valueitem = item.value;
                }
            })    
        });
        
    </script>
@endpush
