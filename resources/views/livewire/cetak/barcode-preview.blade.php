<div class="col-10 border-neutral-40-2 d-flex flex-column   align-items-center py-4" style="min-height: 300px;" id="previewBarcode">
    <div class="card-flex-fill boder-0">
        <div class="card-body border-0">
            <table class="table table-responsive">
                @foreach ($barcodes as $barcode)
                <tr style="border: none;">
                    @for ($i = 0; $i < $barcode->jumlah; $i++)
                        <td style="padding: 10px; border: none; font-size: 'inter',sans-serif; text-align: center; font-size: 14px;">
                            <p style="margin: 0 0 4px 0;">{{ $barcode->barang->nama_barang }}</p>
                            {!! DNS1D::getBarcodeSVG($barcode->barcode, 'C39', $panjang, $lebar) !!}
                        </td>
                        @if (($i+1) % $perRow == 0)
                            </tr><tr>
                        @endif
                    @endfor
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>