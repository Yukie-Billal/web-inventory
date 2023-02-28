<div class="navbar bg-white align-items-center px-1 justify-content-between" style="height: 80px;">
    <div class="col-5 d-flex justify-content-center ps-5">
        <div class="group-form" style="height: 38px; width: 300px;">
            <input type="text" class="input-form h-100" placeholder="Search . . .">
            <button class="group-form-text bg-transparent">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <livewire:auth.foto-profile />
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
    </script>
@endpush