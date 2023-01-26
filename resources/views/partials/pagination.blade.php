<div class="col-9 d-flex justify-content-end align-items-end">
    <div class="col-3 d-flex justify-content-end align-items-center" style="height: 55%">
        <button class="button button-white px-2" wire:click='previousPage'>
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </button>
        <span class="d-inline-block mx-2">{{ $paginator }} / 12</span>
        <button class="button button-outline button-white px-2" wire:click='nextPage'>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
    <div class="col-1 d-flex justify-content-center align-items-center pb-1 mx-1 text-m-medium">
        Go To
    </div>
    <div class="col-1">
        <input type="text" name="page" class="input-form w-100" placeholder="Page">
    </div>
</div>