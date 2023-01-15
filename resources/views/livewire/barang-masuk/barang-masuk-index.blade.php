<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1">
        <div class="col-12 d-flex justify-content-between align-items-center p-0">
            <div class="col-8 d-flex align-items-center p-0">
                <div class="col-4">
                    <div class="input-group">
                        <input type="date" wire:model.debounce.500ms='filterFrom' class="form-control border border-end-0" name="from" id="from">
                        <label for="from" class="input-group-text bg-transparent border border-start-0">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                <span class="mx-3">s/d</span>
                <div class="col-4">
                    <div class="input-group">
                        <input type="date" wire:model.debounce.500ms='filterTo' class="form-control border border-end-0" name="to" id="to">
                        <label for="from" class="input-group-text bg-transparent border border-start-0">
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
                <div class="input-group" style="height: 38px; width: 204px;">
                    <input type="text" wire:model.debounce.500ms='search' class="form-control border border-end-0" placeholder="Search . . ." aria-describedby="btnGroupAddon">
                    <button wire:click='$refresh' class="input-group-text bg-transparent border border-start-0" id="btnGroupAddon">
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
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangMasuks as $barangMasuk)                    
                        <tr>
                            @if ($barangMasuk->barang == '')                                
                                <td scope="row">{{ $barangMasuk->kode_barang }}</td>
                                <td>{{ $barangMasuk->nama_barang }}</td>
                            @else                                
                                <td scope="row">{{ $barangMasuk->barang->kode }}</td>
                                <td>{{ $barangMasuk->barang->nama_barang }}</td>
                            @endif
                            <td>{{ $barangMasuk->jumlah_masuk }}</td>
                            <td>{{ $barangMasuk->tanggal_masuk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>