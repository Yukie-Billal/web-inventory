<div class="col-9 d-flex justify-content-end align-items-end">
    <div class="col-3 d-flex justify-content-end align-items-center" style="height: 55%">
        <button class="button button-white px-2" wire:click="previousPage('page')">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </button>
        <span class="d-inline-block mx-2">{{ $page }} / {{ $pageCount }}</span>                    
        <button class="button button-outline button-white px-2" @if ($page != $pageCount) wire:click="nextPage('page')" @endif>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
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