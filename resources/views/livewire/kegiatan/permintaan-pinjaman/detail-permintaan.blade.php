<div class="row mt-4 mb-3">
    <div class="col-12">
        <div class="card flex-fill border-0">
            <div class="card-body border-0 p-0">
                <div class="col-12 border-neutral-50-1" style="min-width: none;">                   
                    <table class="table table-responsive table-hover table-striped align-middle">
                        <tbody>
                            <tr>
                                <td colspan="2" class="header-s ps-3">Data User</td>
                            </tr>
                            <tr>
                                <td>Nama User</td>
                                <td>{{ $permintaan->user->nama }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $permintaan->user->email }}</td>
                            </tr>
                            <tr>
                                <td>No Telephone</td>
                                <td>{{ $permintaan->user->no_tlp }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $permintaan->user->alamat }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="header-s ps-3">Data Barang</td>                              
                            </tr>
                            <tr>
                                <td>Nama Barang</td>
                                <td>{{ $permintaan->barang->nama_barang }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{ $permintaan->barang->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <td>Merek Barang</td>
                                <td>{{ $permintaan->barang->merek }}</td>
                            </tr>
                            <tr>
                                <td>Warna Barang</td>
                                <td>{{ $permintaan->barang->warna }}</td>
                            </tr>
                            <tr>
                                <td>Serial Number</td>
                                <td>{{ $permintaan->barang->serial_number }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="header-s">Status Permintaan</td>
                            </tr>
                            <tr>
                                <td>Tanggal Dikirim</td>
                                <td>{{ $permintaan->created_at->format('Y-m-d H-i-s') }}</td>
                            </tr>
                            <tr>
                                <td>Status Permintaan</td>
                                <td>
                                    <div class="col-3">
                                        @php
                                            $warna = "primary";
                                            $permintaan->status == "Di Tolak" ? $warna="danger" : $warna="success";
                                        @endphp
                                        <div class="tags tags-{{ $warna }}">{{ $permintaan->status }}</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div class="col-4">
            <button class="button button-primary" onclick="history.back();">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </button>
        </div>
        <div class="col-8 d-flex justify-content-end align-items-center" style="gap: 6px;">
            {{-- <button class="button button-warning" wire:click="tidakTersedia">
                Stok Kosong
            </button> --}}
            <button id="tolakPermintaan" class="button button-danger">
                Tolak Permintaan
            </button>
            <button id="terimaPermintaan" class="button button-info">
                Terima Permintaan
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#tolakPermintaan').on('click', function(e) {
            e.preventDefault();
            Livewire.emit('tolakPermintaan');
        });
        $('#terimaPermintaan').on('click', function(e) {
            e.preventDefault();
            Livewire.emit('terimaPermintaan');
        });
    </script>
@endpush