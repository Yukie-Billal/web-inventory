<div class="col-12 m-0 rounded bg-white mt-4 p-3 px-4 my-shadow-2" style="min-height: 45vh;">
    <div class="row">
        <p class="text-center header-s mb-0 p-0">Daftar Barang</p>
        <p class="text-center text-s-medium p-0 mt-0">Daftar Barang Yang Akan Dipinjam !!</p>
    </div>
    <div class="row mb-3" style="min-height: 48vh;">
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
                            <img src="{{ asset('icon/delete.png') }}" alt=".." width="20px" height="20px" wire:click="deleteItem({{ $keranjang->id }})">
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end w-100" style="gap: 4px; bottom: 0;">
        <button class="button button-warning" id="updateButton">Update</button>
        <button class="button button-danger" id="resetButton">reset</button>
        <button class="button button-success" id="kirimPermintaan" wire:click='kirimPermintaan'>Kirim Permintaan</button>
    </div>
</div>

@push('scripts')
    <script>
        $('#updateButton').on('click', () => {
            Livewire.emit('toastify', ['primary', 'Data Di Update', 3000]);
        });
        $('#resetButton').on('click', () => {Livewire.emit('resetKeranjang')});
    </script>
@endpush