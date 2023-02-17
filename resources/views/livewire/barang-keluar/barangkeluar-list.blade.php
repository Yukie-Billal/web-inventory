<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1">
        <div class="col-12 d-flex justify-content-between align-items-center p-0">
            <div class="col-4 d-flex align-items-center p-0">
                <button class="button button-success text-white text-m-medium" data-bs-toggle="modal" data-bs-target="#ModalDataBarang">
                    Pilih Data Barang
                </button>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <form wire:submit.prevent='searchKode'>
                    <div class="group-form">
                        <input type="text" wire:model.debounce.500ms='kodeBarang' class="input-form " placeholder="Masukkan Kode Barang">
                        <button class="group-form-text bg-transparent ">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>     
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border" style="border-radius: 18px">
            <table class="table table-hover table-responsive mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th class="text-center">Jumlah</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangKeluarKeranjangs as $key => $barangKeluarKeranjang)                    
                        <tr>
                            @if ($barangKeluarKeranjang->barang == '')
                                <td scope="row">{{ $barangKeluarKeranjang->kode_barang }}</td>
                                <td>{{ $barangKeluarKeranjang->nama_barang }}</td>
                            @else                                
                                <td scope="row">{{ $barangKeluarKeranjang->barang->kode }}</td>
                                <td>{{ $barangKeluarKeranjang->barang->nama_barang }}</td>
                            @endif
                            <td>{{ $barangKeluarKeranjang->tanggal_keluar }}</td>
                            <td class="text-center">
                                <i wire:click='qtyMinus({{ $barangKeluarKeranjang->id }})' class="fa fa-minus icon-qty" aria-hidden="true"></i>
                                <span class="mx-2">{{ $barangKeluarKeranjang->jumlah_keluar }}</span>
                                <i wire:click='qtyPlus({{ $barangKeluarKeranjang->id }})' class="fa fa-plus icon-qty" aria-hidden="true"></i>
                            </td>
                            <td>
                                <div wire:ignore>
                                    <select data-id="{{ $barangKeluarKeranjang->id }}" wire:change='statusCovery({{ $barangKeluarKeranjang->id }})' class="select-form">
                                        <option value="Pinjam" {{ $barangKeluarKeranjang->status == 'Pinjam' || $barangKeluarKeranjang->status == 'Di Pinjam' ? 'selected' : '' }}>Pinjam</option>
                                        <option value="Rusak" {{ $barangKeluarKeranjang->status == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <span wire:click='deleteBarangKeluarList({{ $barangKeluarKeranjang->id }})' class="tags tags-danger cursor-pointer">
                                    Delete
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="col-12 d-flex justify-content-end mt-2">
            <div class="col-5 me-3 px-2">
                <input type="text" class="input-form my-rounded" placeholder="Masukkan nama siapa yang meminjam . . . ." style="width: 100%;">
            </div>
            <button wire:click='confirm' class="button button-success text-white text-m-medium">
                Confirmasi
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('change-status', postId => {
            var value = document.querySelector('[data-id="'+postId+'"]').value
            var params = [postId, value]
            Livewire.emit('setStatus', params);
        })
    </script>
@endpush