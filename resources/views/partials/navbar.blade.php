<div class="navbar bg-white px-3" style="height: 58px; border-radius: 0 0 24px 24px">
    <div class="col-md-2" style="padding-left: 88px">
        <h3>LOGO</h3>
    </div>
    <div class="col-md-6 d-flex justify-content-around align-items-center" id="navbarMenu">
        <a href="/home">
            <span class="btn text-dark span d-flex align-items-center px-3 py-2 {{ Request::is('home') ? 'navbar-menu-focus' : '' }}">
                <i class="fa fa-home me-1" aria-hidden="true"></i>
                <span class="text-dark" style="font-size: 14px;">Home</span>
            </span>
        </a>
        <a href="/barang" >
            <span class="btn text-dark span d-flex align-items-center px-3 py-2 {{ Request::is('barang') ? 'navbar-menu-focus' : '' }}">
                <i class="fas fa-box me-1"></i>
                <span class="text-dark" style="font-size: 14px">Data Barang</span>
            </span>
        </a>
        <a href="/barang/masuk" >
            <span class="btn text-dark span d-flex align-items-center px-3 py-2 {{ Request::is('barang/masuk') ? 'navbar-menu-focus' : '' }}">
                <i class="fas fa-box-open me-1"></i>
                <span class="text-dark" style="font-size: 14px;">Barang Masuk</span>
            </span>
        </a>
        <a href="/barang/keluar" >
            <span class="btn text-dark span d-flex align-items-center px-3 py-2 {{ Request::is('barang/keluar') ? 'navbar-menu-focus' : '' }}">
                <i class="fa fa-box-open  me-1" aria-hidden="true"></i>                    
                <span class="text-dark" style="font-size: 14px;">Barang Keluar</span>
            </span>
        </a>
    </div>
    <div class="col-md-3">
        <div class="input-group" style="height: 38px; width: 300px;">
            <input type="text" class="form-control border border-end-0" placeholder="Search . . ." aria-describedby="btnGroupAddon">
            <button class="input-group-text bg-transparent border border-start-0" id="btnGroupAddon">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        {{-- <input type="search" name="search" id="search" placeholder="Search" class="form-control" style="height: 38px; width: 324px;"> --}}
    </div>
</div>