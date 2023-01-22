<div class="navbar bg-white align-items-center px-4 justify-content-around" style="height: 80px;">
    <div class="col-5">
        <div class="group-form" style="height: 38px; width: 300px;">
            <input type="text" class="input-form h-100" placeholder="Search . . .">
            <button class="group-form-text bg-transparent">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
        <i class="fa fa-user-friends d-flex align-items-center me-1" aria-hidden="true"></i>
        <span class="text-dark">
            @if(auth()->user() == null)
            Nama / Username    
            @else
            {{ auth()->user()->email }}
            @endif
        </span>
    </div>
</div>

{{-- <div class="navbar bg-white px-3 align-items-center" style="height: 58px; border-radius: 0 0 24px 24px">
    <div class="col-md-2 h-100" style="padding-left: 88px;">
        <span class="header-l">logo</span>
    </div>
    <div class="col-md-5 d-flex justify-content-around align-items-center" id="navbarMenu">
        <a href="/home" >
            <span class="btn text-dark span d-flex align-items-center {{ Request::is('home') ? 'navbar-menu-focus' : '' }}">
                <i class="fa fa-home me-1" aria-hidden="true"></i>
                <span class="text-dark text-m-medium text-neutral-90">Home</span>
            </span>
        </a>
        <a href="/barang" >
            <span class="btn text-dark span d-flex align-items-center px-3 py-2 {{ Request::is('barang') ? 'navbar-menu-focus' : '' }}">
                <i class="fas fa-box me-1"></i>
                <span class="text-dark text-m-medium text-neutral-90">Data Barang</span>
            </span>
        </a>
        <a href="/barang/masuk" >
            <span class="btn text-dark span d-flex align-items-center px-3 py-2 {{ Request::is('barang/masuk') ? 'navbar-menu-focus' : '' }}">
                <i class="fas fa-box-open me-1"></i>
                <span class="text-dark text-m-medium text-neutral-90">Barang Masuk</span>
            </span>
        </a>
        <a href="/barang/keluar" >
            <span class="btn text-dark span d-flex align-items-center px-3 py-2 {{ Request::is('barang/keluar') ? 'navbar-menu-focus' : '' }}">
                <i class="fa fa-box-open  me-1" aria-hidden="true"></i>
                <span class="text-dark text-m-medium text-neutral-90">Barang Keluar</span>
            </span>
        </a>
    </div>

    <div class="col-md-3">
        <div class="group-form" style="height: 38px; width: 300px;">
            <input type="text" class="input-form h-100" placeholder="Search . . .">
            <button class="group-form-text bg-transparent">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="col-md-1 d-flex align-items-center text-m-regular">
        <form action="/logout" method="post">
            @csrf            
            <button class="mb-1 text-neutral-90 text-decoration-none border-0 bg-transparent" style="cursor: pointer;">
                Log Out
                <i class="fa-solid fa-right-from-bracket ms-1"></i>
            </button>
        </form>
    </div>
</div> --}}