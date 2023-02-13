<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        <div class="row px-2 mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center p-0">
                <div class="col-4 d-flex justify-content-start">
                    <div class="col-6 pe-2">
                        <select class="select-form" id="filterKategori" wire:change='$emit("filter-kategori")'>
                            <option selected disabled>-- Pilih Kategori --</option>
                            <option value="">All</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <div class="col-6 ps-2">
                        <select class="select-form" id="filterMerek" wire:change='$emit("filter-merek")'>
                            <option selected disabled>-- Pilih Merek --</option>
                            @foreach ($barang_mereks as $merek)
                                <option value="{!! $merek->merek !!}">{!! $merek->merek !!}</option>
                            @endforeach                            
                        </select>
                    </div>
                </div>              
            </div>
        </div>
        <div class="row justify-content-end align-items-center">        
            <livewire:pagination-view :col="9" :pageCount='$pageCount' :page='$page' :pageName='$pageName' :wire:key='$page'/>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
                <thead class="">
                    <tr>
                        <th class="px-3">Serial Number</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Warna</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th style="min-width: 30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($barangs->count() == 0)
                        <tr class="text-center">
                            <td colspan="9" style="font-size: 16px;">Barang Kosong</td>
                        </tr>
                    @else
                        @foreach ($barangs as $barang)
                        <tr>
                            <td class="px-3 py-2">
                                {{ $barang->serial_number }}
                            </td>
                            <td class="px-2 py-2">{{ $barang->nama_barang }}</td>
                            <td class="px-2 py-2">{{ $barang->merek }}</td>
                            <td class="px-2 py-2">{{ $barang->warna }}</td>
                            @if ($barang->kategori != null)
                                <td class="px-2 py-2">{{ $barang->kategori->nama_kategori }}</td>
                            @else
                                <td class="px-2 py-2">Tidak Ada</td>
                            @endif
                            <td class="px-2 py-2">{{ $barang->satuan }}</td>
                            <td class="px-2 py-2">{{ $barang->stok }}</td>
                            <td style="max-width: 50px;" class="py-2">
                                <img src="{{ asset('icon/edit.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='editBarang({{ $barang->id }})' data-bs-toggle="modal" data-bs-target="#modalEditDataBarang" class="mx-2">
                                <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='deleteConfirm({{ $barang->id }})'>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('script-livewire')
    <script>
        Livewire.on('page-change', () => {
            const tag = document.querySelector('#pageChanger');
            const value = tag.value;
            const pageName = "page";
            const params = [value, pageName];
            console.log(parseInt(value));
            Livewire.emit('pageSet', params);
        });

        Livewire.on('filter-kategori', () => {
            const value = document.querySelector('#filterKategori').value;
            const params = ['kategori', value];
            Livewire.emit('setFilter', params);
        });

        Livewire.on('filter-merek', () => {
            const value = document.querySelector('#filterMerek').value;
            const params = ['merek', value];
            Livewire.emit('setFilter', params);
        });

        Livewire.on('swalDelete', id => {
            console.log(id)
            Swal.fire({
                icon: 'question',
                title: 'Hapus Barang ?',
                showDenyButton: true,
                confirmButtonText: 'Hapus',
                denyButtonText: `Batalkan`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('setDelete', id);
                }
            })
        });
        Livewire.on('deleted', () => {
            swal.fire({
                icon: 'success',
                title: "Berhasil Menghapus Data",
                showConfirmButton: false,
                timer: 1800
            });
        });
        Livewire.on('setBarcode', kode => {
            console.log(kode);
        });
    </script>
@endpush