<div class="row justify-content-center">
    <div class="col-10">
        <div class="card flex-fill border-0 bg-transparent">
            <div class="card-body border-0">
                <div class="col-12 border-neutral-50-1 rounded shadow-2">                    
                    <table class="table table-hover table-responsive mb-0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Warna</th>
                                <th>Kategori</th>
                                <th class="text-center" style="max-width: 40px;">Jumlah</th>
                                <th style="min-width: 10px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($barcodes->count() == 0)
                            <tr class="text-center">
                                <td colspan="8" style="font-size: 16px;">Kosong</td>
                            </tr>
                            @else
                            @foreach ($barcodes as $barcode)
                                <livewire:cetak.barcode-keranjang-item :barcode='$barcode' :key='$barcode->id' />
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('200',function (message) {
            Livewire.emit('fresh');
        });

        Livewire.on('confirmDelete', function (param) {
            Swal.fire({
                title: 'Yakin Hapus ?',
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteItem', param);
                }
            })
        });
    </script>
@endpush