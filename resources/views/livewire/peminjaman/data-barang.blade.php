<div class="card flex-fill border-0 p-0">
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
    <div class="card-body p-0 rounded border-neutral-40-2">
        <x-table />
    </div>
</div>