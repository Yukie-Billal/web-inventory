<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1">
        <div class="col-12 d-flex justify-content-between align-items-center p-0">
            <div class="col-4 d-flex align-items-center p-0">
                <button class="button button-success text-white text-m-medium" data-bs-toggle="modal" data-bs-target="#ModalDataBarang">
                    Pilih Data Barang
                </button>
            </div>
            <div class="col-4">
                <form wire:submit.prevent='searchKode'>
                    <div class="group-form">
                        <input type="text" wire:model.debounce.500ms='kodeBarang' class="input-form bg-transparent" placeholder="Masukkan Kode Barang">
                        <button class="group-form-text bg-transparent">
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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangMasukKeranjangs as $barangMasukKeranjang)                    
                        <tr>
                            @if ($barangMasukKeranjang->barang == '')
                                <td scope="row">{{ $barangMasukKeranjang->kode_barang }}</td>
                                <td>{{ $barangMasukKeranjang->nama_barang }}</td>
                            @else                                
                                <td scope="row">{{ $barangMasukKeranjang->barang->kode }}</td>
                                <td>{{ $barangMasukKeranjang->barang->nama_barang }}</td>
                            @endif
                            <td>{{ $barangMasukKeranjang->tanggal_masuk }}</td>
                            <td class="text-center">
                                <i wire:click='qtyMinus({{ $barangMasukKeranjang->id }})' class="fa fa-minus icon-qty" aria-hidden="true"></i>
                                <span class="mx-2">{{ $barangMasukKeranjang->jumlah_masuk }}</span>
                                <i wire:click='qtyPlus({{ $barangMasukKeranjang->id }})' class="fa fa-plus icon-qty" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span wire:click='deleteBarangMasukList({{ $barangMasukKeranjang->id }})' class="tags tags-danger cursor-pointer">
                                    Delete
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>

        <div class="col-12 d-flex justify-content-end mt-2">
            <button wire:click='confirm' class="button button-success text-white text-m-medium">
                Confirmasi
            </button>
        </div>
        @if(session()->has('message'))
            <!-- <h1>{{ session('message') }}</h1> -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#dataNotFound").modal('show');
                });
            </script>
        @endif
    </div>
</div>