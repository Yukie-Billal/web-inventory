<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        <div class="row px-2 mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center p-0">
                <div class="col-4 d-flex justify-content-start">
                    <div class="col-6 pe-2">
                        <select class="select-form" id="filterKategori" wire:change='$emit("filter-kategori")'>
                            <option selected disabled>-- Pilih Kategori --</option>
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
                <div class="col-6 d-flex justify-content-end h-100 align-items-center">
                    <button class="button button-info text-white text-m-medium" data-bs-toggle="modal" data-bs-target="#modalTambahDataBarang">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah Data Baru
                    </button>
                </div>                
            </div>
        </div>
        <div class="row justify-content-end align-items-center">
            <div class="col-3">
                {{-- <div class="group-form">
                    <input type="text" wire:model.debounce.500ms='search' class="input-form bg-transparent h-100 w-100" placeholder="Search . . .">
                    <button wire:click='$refresh' class="group-form-text bg-transparent">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div> --}}
            </div>
            {{-- <div class="col-9 d-flex justify-content-end align-items-end">
                <div class="col-3 d-flex justify-content-end align-items-center" style="height: 55%">
                    <button class="button button-white px-2" wire:click="previousPage('page')">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <span class="d-inline-block mx-2">{{ $page }} / {{ $pageCount }}</span>                    
                    <button class="button button-outline button-white px-2" @if ($page != $pageCount) wire:click="nextPage('page')" @endif>
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="col-1 d-flex justify-content-center align-items-center pb-1 mx-1 text-m-medium">
                    Go To
                </div>
                <div class="col-1">
                    <form wire:submit.prevent="$emit('page-change')">
                        <input type="text" id="pageChanger" name="page" class="input-form w-100" placeholder="Page">    
                    </form>           
                </div>                
            </div> --}}
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
                        <th style="min-width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
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
                        <td style="max-width: 100px;" class="py-2">
                            <img src="{{ asset('icon/edit.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='editBarang({{ $barang->id }})' data-bs-toggle="modal" data-bs-target="#modalEditDataBarang" class="mx-2">
                            <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='deleteBarang({{ $barang->id }})'>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('body-script')
    @if (session()->has('message'))        
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('message') }}',
                showConfirmButton: false,
                timer: 5000
            })
        </script>
    @endif
@endpush

@push('script-livewire')
    <script>
        Livewire.on('page-change', function () {
            const tag = document.querySelector('#pageChanger');
            const value = tag.value;
            const pageName = "page";
            const params = [value, pageName];
            console.log(params);
            Livewire.emit('pageSet', params);
        });

        Livewire.on('filter-kategori', function () {
            const value = document.querySelector('#filterKategori').value;
            const params = ['kategori', value];
            Livewire.emit('setFilter', params);
        });

        Livewire.on('filter-merek', function () {
            const value = document.querySelector('#filterMerek').value;
            const params = ['merek', value];
            Livewire.emit('setFilter', params);
        });
    </script>
@endpush