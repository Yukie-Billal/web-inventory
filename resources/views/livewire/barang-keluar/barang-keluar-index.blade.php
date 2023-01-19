<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1">
        <div class="col-12 d-flex justify-content-between align-items-center p-0">
            <div class="col-8 d-flex align-items-center p-0">
                <div class="col-4">
                    <div class="group-form">
                        <input type="date" wire:model.debounce.500ms='filterFrom' class="input-form bg-transparent h-100 w-100" name="from" id="from">
                        <label for="from" class="group-form-text bg-transparent">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                <span class="mx-3">s/d</span>
                <div class="col-4">
                    <div class="group-form">
                        <input type="date" wire:model.debounce.500ms='filterTo' class="input-form bg-transparent h-100 w-100" name="to" id="to">
                        <label for="from" class="group-form-text bg-transparent">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                <div class="col-3 ms-2">
                    <button class="btn text-white fw-semibold btn-filter">
                        Filter
                    </button>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="group-form" style="height: 38px; width: 204px;">
                    <input type="text" wire:model.debounce.500ms='search' class="input-form bg-transparent h-100 w-100" placeholder="Search . . .">
                    <button wire:click='$refresh' class="group-form-text bg-transparent">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
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
                        <th>QTY</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <!-- <th style="max-width: 50px; min-width: 20px;"></th> -->
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangKeluars as $barangKeluar)                    
                        <tr>
                            @if ($barangKeluar->barang == '')                                
                                <td scope="row">{{ $barangKeluar->kode_barang }}</td>
                                <td>{{ $barangKeluar->nama_barang }}</td>
                            @else                                
                                <td scope="row">{{ $barangKeluar->barang->kode }}</td>
                                <td>{{ $barangKeluar->barang->nama_barang }}</td>
                            @endif
                            <td>{{ $barangKeluar->jumlah_keluar }}</td>
                            <td>{{ $barangKeluar->tanggal_keluar }}</td>
                            <td style="max-width: 40px; min-width: 20px;">
                                @if ($barangKeluar->status == 'Di Pinjam')
                                    <span class="badge text-dark fw-normal btn-status" style="">{{ $barangKeluar->status }}</span>
                                @else
                                    @if ($barangKeluar->status == 'Pinjam')
                                        <span class="badge text-dark fw-normal btn-status" style="">{{ $barangKeluar->status }}</span>                                        
                                    @endif
                                    @if ($barangKeluar->status == 'Rusak')
                                        <span class="badge text-dark fw-normal btn-status" style="">{{ $barangKeluar->status }}</span>                                        
                                    @endif
                                @endif
                            </td>
                            <!-- <td style="max-width: 40px; min-width: 20px;">
                                <button wire:click='deleteData({{ $barangKeluar->id }})' class="tags tags-danger">
                                    Delete
                                </button>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>