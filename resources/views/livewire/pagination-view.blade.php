<div class="col-{{ $col }} d-flex justify-content-end align-items-center">
    <div class="col-{{ $button }} d-flex justify-content-end align-items-center" style="height: 55%">
        <button class="button button-outline-light button-sm px-2" wire:click="$emit('previous-page', 'page')">
            <i class="fa fa-chevron-left" style="font-size: 12px;"></i>
        </button>
        <span class="d-inline-block mx-3">{{ $page }} / {{ $pageCount }}</span>
        <button class="button button-outline-light button-sm px-2" @if ($page != $pageCount) wire:click="$emit('next-page', 'page')" @endif>
            <i class="fa fa-chevron-right" style="font-size: 12px;"></i>
        </button>
    </div>
    <div class="col-{{ $input }} d-flex justify-content-center align-items-center pb-1 mx-1 text-m-medium">
        Go To
    </div>
    <div class="col-{{ $input }}">
        <form wire:submit.prevent="$emit('getPageTo')">
            <input type="text" data-page-count="{{ $pageCount }}" id="pageChanger" name="page" class="input-form w-100" placeholder="Page">
        </form>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('getPageTo', function () {
            const input = document.querySelector('#pageChanger');
            var value = input.value;
            var lastPage = input.getAttribute('data-page-count');
            if (value > lastPage) {
                value = lastPage;
            }
            Livewire.emit('pageTo', value);
            input.removeAttribute('readonly');
        })
    </script>
@endpush