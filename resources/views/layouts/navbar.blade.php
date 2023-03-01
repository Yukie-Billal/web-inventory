<div class="navbar bg-white align-items-center px-1 justify-content-between" style="height: 80px;">
    <div class="col-5 d-flex justify-content-center ps-5">
        <div class="group-form" style="height: 38px; width: 300px;">
            <input type="search" class="input-form h-100" placeholder="Search . . .">
            <button class="group-form-text bg-transparent">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <livewire:auth.foto-profile />
</div>

<div class="modal fade" id="modalSearch">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
            <livewire:search-modal />
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('.profile-link').each(function(index, item) {
            item.style.cursor = "pointer";
            $(item).on('click', function(e) {
                item.style.background = "red";
                window.location = "/profile/{{ auth()->user()->id }}"
            });
        });
        $('[type="search"]').on('focus', function(e) {
            $('#modalSearch').modal('show');
            // $('[data-="search"').focus();
        });
    </script>
@endpush