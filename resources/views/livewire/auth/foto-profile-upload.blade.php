<form wire:submit.prevent="uploadFoto">
    <input type="file" accept="image/*" wire:model="foto">
    <br>
    <button class="button button-success" data-bs-dismiss="modal">Upload</button>
</form>