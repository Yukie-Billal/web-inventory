<div
    @if (auth()->user()->role->nama_role == 'User')        
        x-data="{
            search: '',
            items : ['home','History Pinjam', 'Pengajuan Pinjaman'],
            url : ['home','home#permintaan-pinjam','home#history-pinjaman'],
            get searchResults () {
                return this.items.filter(
                    i => i.startsWith(this.search)
                )
            }
        }"
    @else
        x-data="{
            search: '',
            items : ['home'],
            url : ['home','home#permintaan-pinjam','home#history-pinjaman'],
            get searchResults () {
                return this.items.filter(
                    i => i.startsWith(this.search)
                )
            }
        }"
    @endif
>
    <input type="search" wire:model.debounce.500ms="search" class="input-form" data-="search" x-model="search">

    <div class="search-template">
        <ul class="list-group mt-3">
          <template x-for="item in searchResults">
            <a href="/home" class="text-neutral-90 text-m-medium">
                <li class="list-group-item" x-text="item"></li>
            </a>
          </template>
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        
    </script>
@endpush
