<table class="table table-responsive">
    <tr style="border: none;">
    @foreach ($barcodes as $barcode)
        @for ($i = 0; $i < $barcode->jumlah; $i++)
            <td style="padding: 10px; border: none;">{!! DNS1D::getBarcodeSVG($barcode->barcode, 'C39', 1, 66) !!}</td>
            @if (($i+1) % 4 == 0)
                </tr><tr>
            @endif
        @endfor
    @endforeach
    </tr>
</table>

{{-- @foreach ($barcodes as $barcode)
    @for ($i = 0; $i < $barcode->jumlah; $i++)
            {!! DNS1D::getBarcodeSVG($barcode->barcode, 'C39', 1, 66) !!}
        @if (($i+1) % 4 == 0)
            
        @endif
    @endfor
@endforeach --}}

@push('script')
    <script>
        Livewire.on('200', function () {
           Livewire.emit('addBarcode'); 
        });
    </script>
@endpush