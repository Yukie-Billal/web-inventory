<div class="col-10 border-neutral-40-2 d-flex flex-column   align-items-center py-4" style="min-height: 300px;" id="previewBarcode">
    @foreach ($barcodes as $barcode)
    <div class="card-flex-fill boder-0">
        <div class="card-header bg-white border-0">
            <p class="header-s text-center">{{ $barcode->barang->nama_barang . ' - ' . $barcode->barang->merek }}</p>
        </div>
        <div class="card-body border-0">
            <table class="table table-responsive">
                <tr style="border: none;">
                    @for ($i = 0; $i < $barcode->jumlah; $i++)
                        <td style="padding: 10px; border: none;" class="text-center text-m-regular">
                            {{ $barcode->barang->nama_barang }}
                            {!! DNS1D::getBarcodeSVG($barcode->barcode, 'C39', .85, 66) !!}
                        </td>
                        @if (($i+1) % 4 == 0)
                            </tr><tr>
                        @endif
                    @endfor
                </tr>
            </table>
        </div>
    </div>
    @endforeach
</div>