<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        <div class="row px-2 mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center p-0">
                <div class="col-4 d-flex justify-content-start">
                    <div class="col-6 pe-2">
                        <select class="select-form" id="filterKategori" wire:change='$emit("filter-kategori")'>
                            <option selected disabled>-- Pilih Kategori --</option>
                            {{-- @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach    --}}                         
                        </select>
                    </div>
                    <div class="col-6 ps-2">
                        <select class="select-form" id="filterMerek" wire:change='$emit("filter-merek")'>
                            <option selected disabled>-- Pilih Merek --</option>
                            {{-- @foreach ($barang_mereks as $merek)
                                <option value="{!! $merek->merek !!}">{!! $merek->merek !!}</option>
                            @endforeach --}}                            
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

            </div>
            <livewire:pagination-view :page='$page' :pageCount='$pageCount' :pageName='$pageName' />
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
                <thead class="">
                    <tr>
                        <th>Nama User</th>
                        <th>Email</th>
                        {{-- <th>Password</th> --}}
                        <th>No Telephone</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th style="min-width: 50px; max-width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)                    
                    <tr class="">
                        <td class="px-3 py-2">
                            {{ $user->nama }}
                        </td>
                        <td class="px-2 py-2">{{ $user->email }}</td>
                        {{-- <td class="px-2 py-2">{{ $user->password }}</td> --}}
                        <td class="px-2 py-2">{{ $user->no_tlp }}</td>
                        <td class="px-2 py-2">{{ $user->alamat }}</td>
                        <td class="px-2 py-2">{{ $user->id }}</td>
                        <td style="max-width: 50px;">
                            <img src="{{ asset('icon/edit.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='editBarang({{ $user->id }})' data-bs-toggle="modal" data-bs-target="#modalEditDataBarang" class="mx-2">
                            <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='deleteBarang({{ $user->id }})'>
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