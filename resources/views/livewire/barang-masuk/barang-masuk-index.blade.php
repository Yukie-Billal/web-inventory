<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1">
        {{-- Ini Filter Tanggal --}}
        {{-- <div class="col-12 d-flex justify-content-between align-items-center p-0">
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
                    <input type="text" wire:model.debounce.500ms='search' class="input-form bg-transparent w-100 h-100" placeholder="Search . . .">
                    <button wire:click='$refresh' class="group-form-text bg-transparent">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div> --}}
        <div class="row justify-content-end align-items-center">
            <livewire:pagination-view :page='$page' :pageName='$pageName' :pageCount='$pageCount' />
        </div>        
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border-neutral-40-2 rounded">
            <table class="table table-hover table-responsive mb-0">
                <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Warna</th>
                        <th>Kategori</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Nama Supplier</th>
                        <th>Nama Perusahaan</th>
                        <th>Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangMasuks as $barangMasuk)                    
                        <tr>
                            <td>{{ $barangMasuk->serial_number }}</td>
                            <td>{{ $barangMasuk->nama_barang }}</td>
                            <td>{{ $barangMasuk->merek }}</td>
                            <td>{{ $barangMasuk->warna }}</td>
                            @if ($barangMasuk->kategori != '')
                                <td>{{ $barangMasuk->kategori->nama_kategori }}</td>
                            @endif
                            <td>{{ $barangMasuk->qty }}</td>
                            <td>{{ $barangMasuk->satuan }}</td>
                            @if ($barangMasuk->supplier != '')
                                <td>{{ $barangMasuk->supplier->nama_supplier }}</td>
                                <td>{{ $barangMasuk->supplier->nama_perusahaan }}</td>
                            @endif
                            <td>{{ $barangMasuk->tanggal_masuk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>