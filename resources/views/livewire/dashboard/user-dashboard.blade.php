<div class="col-3 bg-white d-flex align-items-end justify-content-center rounded mt-4 p-0 ms-3 pt-1 pe-4 my-shadow-1">
    <x-breadcrumb header='s' parent='Aplikasi Inventory' where='Beranda' />
</div>

<div class="row m-0 p-0 justify-content-between">
    <div class="col-7 p-0 pe-3">        
        <div class="card flex-fill m-0 rounded bg-white mt-4 p-3 px-4 my-shadow-2">
            <p class="text-center header-s">Pinjam Barang</p>
            <div class="form-group">
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
    </div>
    <div class="col-5 p-0 ps-3">
        <div class="col-12 m-0 rounded bg-white mt-4 p-3 px-4 my-shadow-2" style="min-height: 200px;">
            <div class="row">                    
                <p class="text-center header-s mb-0 p-0">Daftar Barang</p>
                <p class="text-center text-s-medium p-0 mt-0">Daftar Barang Yang Akan Dipinjam !!</p>
            </div>
            <div class="row mb-3" style="min-height: 250px;">
                <table class="table table-hover mb-0 w-100 h-100">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Merek</th>
                            <th>Warna</th>
                            <th>Kategori</th>
                            <th style="min-width: 10px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($keranjangs->count() == 0)
                        <tr class="text-center">
                            <td colspan="8" style="font-size: 16px;">Kosong</td>
                        </tr>
                        @else
                        @foreach ($keranjangs as $keranjang)
                            <tr>
                                <td>{{ $keranjang->barang->nama_barang }}</td>
                                <td>{{ $keranjang->barang->merek }}</td>
                                <td>{{ $keranjang->barang->warna }}</td>
                                <td>{{ $keranjang->barang->kategori->nama_kategori }}</td>
                                <td>
                                    <img src="{{ asset('icon/delete.png') }}" alt=".." width="20px" height="20px">
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end w-100" style="gap: 4px; bottom: 0;">
                <button class="button button-warning">Update</button>
                <button class="button button-danger" id="resetButton">reset</button>
                <button class="button button-success">Kirim Permintaan</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card flex-fill m-0 rounded bg-white mt-4 p-3 my-shadow-2">
            History / Barang Yang Di pinjam
        </div>
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
            
        $('#addKeranjang').on('click', () => {Livewire.emit('addBarangPinjamList');});
        $('#resetButton').on('click', () => {Livewire.emit('resetKeranjang')});
    </script>
@endpush

<x-toast />