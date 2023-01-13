<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1">
        <div class="col-12 d-flex justify-content-between align-items-center p-0">
            <div class="col-4">
                <button class="button button-primary text-white text-m-medium" data-bs-toggle="modal" data-bs-target="#modalTambahDataBarang">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Tambah Data Baru
                </button>
                
            </div>
            <div class="col-4">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>        
                @endif        
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="input-group" style="height: 38px; width: 204px;">
                    <input type="text" wire:model.debounce.500ms='search' class="form-control border-end-0 is-invalid" placeholder="Search . . ." aria-describedby="btnGroupAddon">
                    <button wire:click='$refresh' class="input-group-text bg-transparent border border-start-0" id="btnGroupAddon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border" style="border-radius: 12px">
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
                title: {{ session('message') }},
                showConfirmButton: false,
                timer: 5000
            })
        </script>
    @endif
@endpush