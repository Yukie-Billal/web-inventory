<div class="card flex-fill border-0">
    <div class="card-header bg-white border-0 d-flex flex-column">
        <span class="header-m mb-2">Data Peminjam</span>
        <p class="text-m-medium">Harap Isi data dibawah ini sebelum mengkonfirmasi !!!</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="namaLengkap" class="text-m-regular">Nama Peminjam</label>
                    <input type="text" id="namaLengkap" class="input-form w-100 placeholder-m-m" style="height: 48px" placeholder="Masukan Nama Lengkap">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="noTlp" class="text-m-regular">No Telephone</label>
                    <input type="text" id="noTlp" class="input-form w-100 placeholder-m-m" style="height: 48px" placeholder="Masukan Nama Lengkap">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <div class="form-group">
                    <label for="alamat" class="text-m-regular">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" aria-describedby="helpId" placeholder="Alamat Lengkap"></textarea>
                    <small id="helpId" class="text-neutral-80 text-s-regular">Boleh Kosong !!</small>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-2">
                <button class="button button-success text-white">
                    <i class="fa fa-clipboard me-1" aria-hidden="true"></i>
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>
</div>