<x-app-layout>
    <x-breadcrumb parent='Data' where='Pinjam & Kembali' />

    <div class="row justify-content-start px-3 py-0">
        <div class="col-md-12 px-3 py-4" style="min-height: 350px;">
            {{-- <livewire:barang-keluar.barangkeluar-list> --}}
            <livewire:data.pinjam-kembali.pinjam-index >
        </div>
    </div>

    <div class="row justify-content-center px-3 py-4">
        <div class="col-md-12 px-3 py-4">
            {{-- <livewire:barang-keluar.barang-keluar-index> --}}
            <livewire:data.pinjam-kembali.kembali-index >
        </div>
    </div>

    <div class="modal fade" id="ModalDataBarang">
        <div class="modal-dialog">
            @php
                Request::is('barang/masuk') ? $where = 'm' : $where = 'k';
            @endphp
            <div class="modal-content rounded-1" style="width: 544px; padding:20px;">
                <livewire:barang-keluar.barang-list :where='$where'>
            </div>
        </div>
    </div>
</x-app-layout>