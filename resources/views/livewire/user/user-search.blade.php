<div class="card flex-fill m-0 rounded bg-white mt-4 p-3 px-4 my-shadow-2">
    <p class="text-center header-s">Pinjam Barang</p>
    <div class="form-group" wire:ignore>
        <label for="searchBarang" class="text-l-medium ms-1 mb-1 text-neutral-90">Cari Barang</label>
        <x-forms.text-input
            placeholder="Cari Barang"
            id="searchBarang"
        />
    </div>
    <div class="form-group">
        <label for="button"></label>
        <button class="button button-primary" id="addKeranjang" type="button">Tambah</button>
    </div>
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
            selector: "#searchBarang",
            placeHolder: "Nama Barang ... Merek ... Warna ...",
            diacritics: true,
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
                        autoCompleteJS.input.value = selection;
                        Livewire.emit('setBarang', selection);
                    }
                }
            }
        });
        $('#addKeranjang').on('click', () => {
            Livewire.emit('addBarangPinjamList');
            console.log(autoCompleteJS);
        });
    </script>
@endpush