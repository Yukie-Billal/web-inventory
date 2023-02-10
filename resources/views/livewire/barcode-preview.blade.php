<div class="row justify-content-center mt-4">
    <div class="col-10 d-flex justify-content-center">
        @foreach ($barcodes as $barcode)
        <div 
            class="col-3 px-2" 
            x-data="{ 
                open:false,
                menu:false
            }"
            x-on:mouseover="open = true"
            x-on:mouseout="open = false"            
        >
            <div 
                class="card flex-fill border-neutral-50-1 shadow-2"
                style="border-radius: 12px;"
                
            >
                <div class="card-header bg-transparent d-flex justify-content-center align-items-center" style="padding: 36px 0;">
                    <span 
                        class="close-card text-m-medium text-neutral-80"
                        style="position: absolute; top: 3px; right: 4px; font-size: 18px; cursor: pointer;"
                        x-show="open"
                        x-transition.delay.25ms
                        x-transition:enter.duration.150ms
                        x-transition:leave.duration.150ms
                        wire:click="deleteItem({{ $barcode->id }})"
                    >
                        <i class="fa-solid fa-ellipsis-vertical" x-on:click="menu = true" x-on:click></i>
                    </span>

                    @if ($barcode->barang->barcode == null)
                        {!! DNS1D::getBarcodeSVG($barcode->barcode, 'C39', 0.7, 56) !!}
                    @else
                        {!! DNS1D::getBarcodeSVG($barcode->barang->barcode, 'C39', 0.7, 56) !!}
                    @endif
                </div>
                <div class="card-body border-0 border-top p-0 py-2" style="height: auto;">
                    <div class="row py-1 px-3 my-1">
                        <div class="col-6 text-s-regular">
                            {{ $barcode->barang->serial_number }}
                        </div>
                        <div class="col-6 text-s-regular">
                            {{ $barcode->barang->nama_barang }}
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row py-1 px-3">
                        <div class="col-6 text-s-regular">
                            {{ $barcode->barang->merek }}
                        </div>
                        <div class="col-6 text-s-regular">
                            {{ $barcode->barang->warna }}
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row py-1 px-3">
                        <div class="col-6 text-s-regular">
                            @if ($barcode->barang->kategori == '')
                                <i>null</i>
                            @else
                                {{ $barcode->barang->kategori->nama_kategori }}
                            @endif
                        </div>
                        <div class="col-6 text-s-regular">
                            <span class="me-2">{{ $barcode->barang->jumlah }}</span>
                            {{ $barcode->barang->satuan }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

            @if (($loop->iteration % 4) == 0 )
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-10 d-flex justify-content-center">
            @endif

        @endforeach
    </div>
</div>

<div class="row justify-content-center mt-4">
    <div class="col-10 d-flex justify-content-center">
        <div class="card flex-fill">
            <div class="card-body">
                o
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-end">
    <div class="col-3">
        <button 
            class="button button-primary text-white text-m-medium" 
            {{-- data-bs-toggle="modal" data-bs-target="#modalPrintBarcode" --}}
            id="buttonPrint" 
        >
            Cetak Barcode
        </button>
    </div>    
</div>

@push('script')
    <script>
        Livewire.on('200',function (message) {
            Livewire.emit('fresh');
        });

        Livewire.on('fresh', function () {});
    </script>
@endpush