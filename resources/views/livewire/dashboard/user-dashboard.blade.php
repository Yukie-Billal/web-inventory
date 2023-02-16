@can('IsUser')
    <div class="col-3 bg-white d-flex align-items-end justify-content-center rounded mt-4 p-0 ms-3 pt-1 pe-4 my-shadow-1">
        <x-breadcrumb header='s' parent='Aplikasi Inventory' where='Beranda' />
    </div>

    <div class="row m-0 p-0 justify-content-between">
        <div class="col-7 p-0 pe-3">
            <div class="card flex-fill m-0 rounded bg-white mt-4 p-3 px-4 my-shadow-2">
                <p class="text-center header-s">Pinjam Barang</p>
                <div class="form-group">
                    <label for="searchBarang" class="text-l-medium ms-1 mb-1 text-neutral-90">Cari Barang</label>
                    <input type="text" class="input-form placeholder-m-m" id="searchBarang">
                </div>
                <div class="form-group">
                    <label for="oadn"></label>
                    <button class="button button-primary">Tambah</button>
                </div>
            </div>
        </div>
        <div class="col-5 p-0 ps-3">
            <div class="col-12 m-0 rounded bg-white mt-4 p-3 px-4 my-shadow-2" style="min-height: 200px;">
                <div class="row">                    
                    <p class="text-center header-s mb-0 p-0">Daftar Barang</p>
                    <p class="text-center text-s-medium p-0 mt-0">Daftar Barang Yang Akan Dipinjam !!</p>
                </div>
                <div class="row" style="min-height: 80px;">
                </div>
                <div class="d-flex justify-content-end w-100" style="gap: 4px; bottom: 0;">
                    <button class="button button-warning">Update</button>
                    <button class="button button-danger">reset</button>
                    <button class="button button-success">Kirim Permintaan</button>
                </div>
            </div>
        </div>
    </div>
@endcan

@foreach ($barangs as $barang)
    <input type="hidden" class="barangList input-form" value="{{ $barang->kode_barang .' -- '. $barang->nama_barang .' -- '.$barang->serial_number .' -- '. $barang->merek .' -- '. $barang->warna .'  -'.$barang->id }}">
@endforeach

@push('script')
    <script>
        var dataList = document.querySelectorAll('input.barangList');
        var arrayData = [];
        dataList.forEach((item) => {
            arrayData.push(item.value);
        });

        const autoCompleteJS = new autoComplete({
            selector: "#searchBarang",
            placeHolder: "Nama Barang ... Merek ... Warna ...",
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
                        const params = ['search', selection];
                        Livewire.emit('setBarcode', params);
                    }
                }
            }
         });
    </script>
@endpush