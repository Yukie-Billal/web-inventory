<div class="col-3 bg-white d-flex align-items-end justify-content-center rounded mt-4 p-0 ms-3 pt-1 pe-4 my-shadow-1">
    <x-breadcrumb header='s' parent='Aplikasi Inventory' where='Beranda' />
</div>

<div class="row m-0 p-0 justify-content-between">
    <div class="col-7 p-0 pe-3 pb-0">
        <div class="col-12">
            <livewire:user.user-search />
        </div>
        <div class="col-12">
            <livewire:user.permintaan-pinjam />
        </div>
    </div>
    <div class="col-5 p-0 ps-3">
        <livewire:user.keranjang-pinjam-user />
    </div>
</div>

<div class="row m-0 my-3 p-0">
    <div class="col-12 p-0">
        <livewire:user.history-pinjaman />
    </div>
</div>
<x-alert.sweet-alert />
<x-toast />