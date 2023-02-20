<x-app-layout>
    <x-breadcrumb parent='Data' where='Pinjam & Kembali' />

    <div class="row justify-content-start px-3 py-0">
        <div class="col-md-12 px-3 py-4" style="min-height: 350px;">
            <livewire:data.pinjam-kembali.pinjam-index >
        </div>
    </div>

    <div class="row justify-content-center px-3 py-4">
        <div class="col-md-12 px-3 py-4">
            <livewire:data.pinjam-kembali.kembali-index >
        </div>
    </div>
    <x-alert.sweet-alert />
</x-app-layout>