<div class="card flex-fill border-0">
    <div class="card-header bg-white border-0 p-0">
        <div class="row justify-content-end align-items-center">
            <div class="col-12 d-flex justify-content-center align-items-end pb-2">
                <div class="col-6 d-flex justify-content-center">
                    <div class="col-5 pe-2 d-flex align-items-end">
                        <div class="form-group">
                            <label for="barcode" class="text-s-medium">Scan Barcode</label>
                            <input type="text" id="barcode" class="input-form text-m-regular input-form-sm" placeholder="Masukkan Kode">
                        </div>
                    </div>
                    <div class="col-1 d-flex align-items-end justify-content-center text-m-medium pb-2" style="height: inherit;">
                        OR
                    </div>
                    <div class="col-5 ps-2 d-flex align-items-end">
                        <div class="form-group">
                            <label for="serialNumber" class="text-s-medium">Serial Number</label>
                            <input type="text" id="serialNumber" class="input-form text-m-regular input-form-sm" placeholder="Masukkan Kode">
                        </div>
                    </div>
                </div>
                {{-- <div class="col-6 d-flex justify-content-end align-items-center bg-danger">
                    <div class="col-5 d-flex justify-content-end align-items-center" style="height: 55%">
                        <button class="button button-white px-2">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </button>
                        <span class="d-inline-block mx-2">1 / 12</span>
                        <button class="button button-outline button-white px-2">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center h-50 pb-1 mx-1 text-m-medium">
                        Go To
                    </div>
                    <div class="col-2">
                        <input type="text" class="input-form w-100" placeholder="Page">
                    </div>
                </div> --}}
                <livewire:pagination-view :col="6" :page='$page' :pageName='$pageName' :pageCount='$pageCount' />
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
               <thead>
                  <tr>
                     <th>Nama Barang</th>
                     <th>Merek</th> 
                     <th>Warna</th>
                     <th>Kategori</th>
                     <th>Satuan</th>
                     <th>Stok</th>
                     <th style="min-width: 18px;"></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($barangs as $barang ) 
                     <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->merek }}</td>
                        <td>{{ $barang->warna }}</td>
                        @if ($barang->kategori != null)
                            <td>{{ $barang->kategori->nama_kategori }}</td>
                        @else
                            <td><i>Null</i></td>
                        @endif
                        <td>{{ $barang->satuan }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td style="max-width: 18px;">
                            <img src="{{ asset('icon/check.png') }}" alt=".." class="icon-normal">
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="card-body p-0">
        <div class="col-12 p-0 rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
                <thead>
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
    </div> --}}
</div>