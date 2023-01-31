<div class="navbar bg-white align-items-center px-1 justify-content-between" style="height: 80px;">
    <div class="col-5 d-flex justify-content-center ps-5">
        <div class="group-form" style="height: 38px; width: 300px;">
            <input type="text" class="input-form h-100" placeholder="Search . . .">
            <button class="group-form-text bg-transparent">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="col-6 d-flex justify-content-end align-items-center h-75">
        <div class="col d-flex justify-content-end pe-4 h-100 align-items-center" style="border-right: 2px solid #d0d0d0;">
            <i class="fa fa-user-friends d-flex align-items-center me-2 mb-1" aria-hidden="true" style="font-size: 28px;"></i>
            <span class="text-dark text-l-medium">
                @if(auth()->user() == null)
                Nama User
                @else
                {{ auth()->user()->nama }}
                @endif
            </span>
        </div>
        <div class="col-3 h-100 d-flex align-items-center justify-content-end pe-4">
            <a href="/logout" class="d-flex align-items-center justify-content-center text-decoration-none text-m-medium text-neutral-90">
                Log Out
                <img src="{{ asset('icon/logout.png') }}" alt="..." width="20px" height="20px" class="ms-2">
            </a>
        </div>
    </div>
</div>