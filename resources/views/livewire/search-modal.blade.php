<div>
    <input type="search" wire:model.debounce.500ms="search" class="input-form" data-="search">

    <div class="search-template">
        <ul class="list-group mt-3">
            @foreach ($searchs as $search)
                <a href="{{ $search->url . $search->judul == "Profile" ? auth()->user()->id : '' }}" class="text-neutral-90 text-m-medium">
                    <li class="list-group-item">{{ $search->judul }} , {{ $search->deskripsi }}</li>
                </a>
            @endforeach
          </template>
        </ul>
    </div>
</div>