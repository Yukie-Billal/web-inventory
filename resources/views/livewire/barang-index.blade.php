<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        <div class="row px-2 mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center p-0">
                <div class="col-4 d-flex justify-content-start">
                    <div class="col-6 pe-2">
                        <select class="select-form" name="" id="">
                            <option selected>Select one</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-6 ps-2">
                        <select class="select-form" name="" id="">
                            <option selected>Select one</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
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
                <div class="group-form">
                    <input type="text" wire:model.debounce.500ms='search' class="input-form bg-transparent h-100 w-100" placeholder="Search . . .">
                    <button wire:click='$refresh' class="group-form-text bg-transparent">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="col-9 d-flex justify-content-end align-items-end">
                <div class="col-3 d-flex justify-content-end align-items-center" style="height: 55%">
                    <button class="button button-white px-2">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <span class="d-inline-block mx-2">1 / 12</span>
                    <button class="button button-outline button-white px-2">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="col-1 d-flex justify-content-center align-items-center pb-1 mx-1 text-m-medium">
                    Go To
                </div>
                <div class="col-1">
                    <input type="text" class="input-form w-100" placeholder="Page">
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th class="px-3">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>QTY</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)                    
                    <tr>
                        <td class="px-3 py-2">
                            {{ $barang->kode }}
                        </td>
                        <td class="px-3">{{ $barang->nama_barang }}</td>
                        <td class="px-3">{{ $barang->stok }}</td>
                        <td class="px-3">
                            <button class="badge btn-edit" wire:click='editBarang({{ $barang->id }})' data-bs-toggle="modal" data-bs-target="#modalEditDataBarang">
                                <i class="fas fa-edit"></i>
                                Edit
                            </button>
                            <button class="badge btn-delete" wire:click='deleteBarang({{ $barang->id }})'>
                                <i class="fas fa-trash-alt"></i>
                                Hapus
                            </button>
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