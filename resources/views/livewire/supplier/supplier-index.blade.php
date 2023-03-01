<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        <div class="row px-2 mb-3">
            <div class="col-12 d-flex align-items-center p-0 header-s">
                Data - Data Suppliers
            </div>
        </div>
        <div class="row justify-content-end align-items-center">
            <livewire:pagination-view :col='9' :page='$page' :pageCount='$pageCount' :pageName='$pageName' />
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border rounded border-neutral-40-2" style="min-height: 300px;">
            <table class="table table-hover table-responsive mb-0">
                <thead class="">
                    <tr>
                        <th>Nama Supplier</th>
                        <th>Nama Perusahaan</th>
                        <th>No Telephone</th>
                        <th>Alamat</th>
                        <th style="min-width: 50px; max-width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($suppliers->count() <= 0) 
                    <tr class="text-center">
                        <td colspan="5" style="font-size: 16px">Supplier Kosong</td>
                    </tr>
                    @else 
                    @foreach ($suppliers as $supplier)
                    <tr>
                        <td class="px-3 py-2">
                            {{ $supplier->nama_supplier }}
                        </td>
                        <td class="px-2">{{ $supplier->nama_perusahaan }}</td>
                        <td class="px-2">{{ $supplier->no_tlp }}</td>
                        <td class="px-2">{{ $supplier->alamat }}</td>
                        <td style="max-width: 100px;">
                            <img 
                                src="{{ asset('icon/edit.png') }}" alt=".."
                                style="height: 18px; width: 18px; cursor: pointer;"
                                wire:click='editSupplier({{ $supplier->id }})'
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditSupplier"
                                class="mx-2"
                            >
                            <img 
                                src="{{ asset('icon/delete.png') }}" alt=".."
                                style="height: 18px; width: 18px; cursor: pointer;"
                                wire:click='confirmDelete({{ $supplier->id }})'
                            >
                        </td>
                    </tr>
                    @endforeach
                    @endif 
                </tbody>
            </table>
        </div>
    </div>
</div>