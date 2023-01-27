<div class="col-9 d-flex justify-content-end align-items-center">
    <div class="col-3 d-flex justify-content-end align-items-center" style="height: 55%">
        <button class="button button-outline-light button-sm px-2" wire:click="$emit('previous-page', 'page')">
            <i class="fa fa-chevron-left" style="font-size: 12px;"></i>
        </button>
        <span class="d-inline-block mx-3">{{ $page }} / {{ $pageCount }}</span>                   
        <button class="button button-outline-light button-sm px-2" @if ($page != $pageCount) wire:click="$emit('next-page', 'page')" @endif>
            <i class="fa fa-chevron-right" style="font-size: 12px;"></i>
        </button>
    </div>
    <div class="col-1 d-flex justify-content-center align-items-center pb-1 mx-1 text-m-medium">
        Go To
    </div>
    <div class="col-1">
        <form wire:submit.prevent="$emit('page-change')">
            <input type="text" id="pageChanger" name="page" class="input-form w-100" placeholder="Page">    
        </form>           
    </div>                
</div>