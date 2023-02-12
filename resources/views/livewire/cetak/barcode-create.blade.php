<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1 header-s">
        Cari Berdasarkan Serial Number Atau Nama Barang
    </div>
    <form wire:submit.prevent="addKeranjang">
        <div class="card-body p-0">
            <div class="row">
                {{-- <div class="col-12" wire:ignore>
                    <div class="form-group" id="serialParent" wire:ignore>
                        <label for="serialNumber" class="text-m-regular">Serial Number</label>
                        <select class="select-form" id="serialNumber" onchange="getSerialNum()">
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->serial_number }}">{{ $barang->serial_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  --}}
                <div class="col-12">
                    <div class="form-group p-0">
                        <label for=""></label>
                        <input id="autoComplete" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="2048" tabindex="1">
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

@foreach ($barangs as $barang)
    <input type="hidden" class="barangList input-form" value="{{ $barang->barcode .'  --  '. $barang->nama_barang .'  --  '.$barang->serial_number }}">
@endforeach

@push('script')
    <script>            
        var dataList = document.querySelectorAll('input.barangList');
        var array = [];
        dataList.forEach((item) => {
            array.push(item.value);
        });
        const autoCompleteJS = new autoComplete({ 
            selector: "#autoComplete",
            placeHolder: "Search for Food...",
            data: {
                src: array,
                cache: true,
            },
            resultsList: {
                element: (list, data) => {
                    if (!data.results.length) {
                        // Create "No Results" message element
                        const message = document.createElement("div");
                        // Add class to the created element
                        message.setAttribute("class", "no_result");
                        // Add message text content
                        message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                        // Append message element to the results list
                        list.prepend(message);
                    }
                },
                element: (list, data) => {
                    if (!data.results.length) {
                        // Create "No Results" message list element
                        const message = document.createElement("div");
                        message.setAttribute("class", "no_result");
                        // Add message text content
                        message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                        // Add message list element to the list
                        list.appendChild(message);
                    }
                },
                noResults: true,
            },
            resultItem: {
                highlight: true
            },
            
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        autoCompleteJS.input.value = selection;
                        console.log(selection);
                    }
                }
            }
         });
    </script>
    <script>
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
