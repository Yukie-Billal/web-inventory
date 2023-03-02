<div>
    <form id="SearchForm">        
        <input type="search" wire:model.debounce.500ms="search" class="input-form border border-bottom rounded-0" style="box-shadow: none; outline: none;" data-="search" id="SearchInput">
    </form>
    <div class="search-template">
        <ul class="list-group mt-3">
            @foreach ($searchs as $search)
                <a href="{{ $search->url }}{{ $search->judul == 'Profile' ? auth()->user()->id : '' }}" class="text-neutral-90 text-m-medium">
                    <li class="list-group-item">{{ $search->judul }} , {{ $search->deskripsi }}</li>
                </a>
            @endforeach
          </template>
        </ul>
    </div>
</div>