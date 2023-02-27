<div class="card flex-fill border-0">
    <form wire:submit.prevent="addKeranjang">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    <div class="form-group p-0">
                        <label for="" class="text-m-regular">Cari Berdasarkan Serial Number Atau Nama Barang</label>
                        <input id="serialNumber" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="2048" tabindex="1">
                        @error('serialNumber')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-end mt-3 pe-0">
                <div class="col-3 d-flex justify-content-end pe-4">
                    <button class="button button-success">
                        <img src="{{ asset('icon/konfirmasi.png') }}" alt=".." height="20px" width="20px">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@foreach ($barangs as $barang)
    <input type="hidden" class="barangList input-form" value="{{ $barang->kode_barang .' -- '. $barang->nama_barang .' -- '.$barang->serial_number .' -- '. $barang->merek .' -- '. $barang->warna .'  -'.$barang->id }}">
@endforeach

@push('scripts')
    <script>
        var dataList = document.querySelectorAll('input.barangList');
        var arrayData = [];
        dataList.forEach((item) => {
            arrayData.push(item.value);
        });

        const autoCompleteJS = new autoComplete({
            selector: "#serialNumber",
            placeHolder: "Search Kode Barang ... Nama Barang ... Serial Number ...",
            data: {
                src: arrayData,
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
                        Livewire.emit('toastify', ['warning', 'Barang Tidak Ditemukan', 2500]);
                    }
                },
                noResults: true,
                maxResults: 15,
                tabSelect: true,
            },
            resultItem: {
                highlight: true
            },
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        const params = ['serial', selection];
                        Livewire.emit('setBarcode', params);
                        autoCompleteJS.input.value = selection;
                    }
                }
            }
         });
        Livewire.on('setBarcode', function (params) {
            setTimeout(()=>{                
                autoCompleteJS.input.value = params[1];
            }, 1500)
        });
        Livewire.on('200', function () {
            autoCompleteJS.input.value = '';
            Livewire.emit('toastify', ['success','Ditambahkan', 2000]);
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
