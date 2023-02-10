<div class="modal-content rounded-1" style="padding:20px; height: 80vh;">
    <div class="modal-body bg-warning">
        <div class="row">
            <table>
                <tr>
                @foreach ($barcodes as $barcode)
                    @for ($i = 0; $i < $barcode->jumlah; $i++)
                        <td style="padding: 10px;">{!! DNS1D::getBarcodeSVG($barcode->barcode, 'C39', 1, 66) !!}</td>
                        @if (($i+1) % 3 == 0)
                            </tr><tr>
                        @endif
                    @endfor
                @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script>
        Livewire.on('200', function () {
           Livewire.emit('addBarcode'); 
        });
    </script>
@endpush