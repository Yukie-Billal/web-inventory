<tr>
    <td>{{ $barcode->barang->nama_barang }}</td>
    <td>{{ $barcode->barang->merek }}</td>
    <td>{{ $barcode->barang->warna }}</td>
    @if ($barcode->barang->kategori != null)
    <td>{{ $barcode->barang->kategori->nama_kategori }}</td>
    @else
    <td><i>Null</i></td>
    @endif
    <td style="max-width: 12px;">
        <input type="text" wire:model.debounce.500ms='jumlah' style="background: transparent; border: none; width: 50%;" value="{{ $barcode->jumlah }}">
    </td>
    <td style="max-width: 40px;">
        <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='$emit("confirmDelete", {{ $barcode->id }})'>
    </td>
</tr>