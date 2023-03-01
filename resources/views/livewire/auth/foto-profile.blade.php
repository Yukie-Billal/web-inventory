<div class="col-6 d-flex justify-content-end align-items-center h-75">
    <div class="col d-flex justify-content-end pe-4 h-100 align-items-center" style="border-right: 2px solid #d0d0d0;">
        @if (auth()->user()->foto)
        <div class="img-fluid rounded-circle me-2" style="overflow: hidden;">
            <img src="{{ asset('storage/'. auth()->user()->foto) }}" alt="P" style="height: 50px; width: 50px; object-fit: cover;">
        </div>
        @else            
            <i class="fa fa-user-friends d-flex align-items-center me-2 mb-1 profile-link" aria-hidden="true" style="font-size: 28px;"></i>
        @endif
        <span class="text-dark text-l-medium profile-link">
            @if(auth()->user() == null)
                Nama Saya
            @else
                {{ auth()->user()->nama }}
            @endif
        </span>
    </div>
    <div class="col-3 h-100 d-flex align-items-center justify-content-end pe-5">
        <a href="/logout" class="d-flex align-items-center justify-content-center text-decoration-none text-m-medium text-neutral-90">
            Log Out
            <img src="{{ asset('icon/logout.png') }}" alt="..." width="20px" height="20px" class="ms-2">
        </a>
    </div>
</div>