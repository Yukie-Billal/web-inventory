<select wire:model.lazy='status' wire:change='statusCovery({{ $barangKeluarKeranjang->id }})' class="select-form">
    <option value="Pinjam" {{ $barangKeluarKeranjang->status == 'Pinjam' || $barangKeluarKeranjang->status == 'Di Pinjam' ? 'selected' : '' }}>Pinjam</option>
    <option value="Rusak" {{ $barangKeluarKeranjang->status == 'Rusak' ? 'selected' : '' }}>Rusak</option>
</select>