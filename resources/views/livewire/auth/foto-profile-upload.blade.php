<form wire:submit.prevent="uploadFoto">
    @if ($foto)
        Foto Preview:
        <img src="{{ $foto->temporaryUrl() }}" class="image-fluid w-100 mb-3">
    @endif
    <input type="file" accept="image/*" wire:model="foto">
    <div class="col-12 d-flex justify-content-end">
        <button class="button button-success" data-bs-dismiss="modal">Upload</button>
    </div>
</form>