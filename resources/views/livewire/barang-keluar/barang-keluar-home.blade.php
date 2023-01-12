<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white">
        {{-- <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="col-8 d-flex align-items-center">
                <div class="col-3">
                    <input type="date" class="form-control" name="from" placeholder="From">
                </div>
                <span class="mx-3">s/d</span>
                <div class="col-3">
                    <input type="date" class="form-control" name="to" placeholder="To">
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="input-group" style="height: 38px; width: 204px;">
                    <input type="text" class="form-control border border-end-0" placeholder="Search . . ." aria-describedby="btnGroupAddon">
                    <button class="input-group-text bg-transparent border border-start-0" id="btnGroupAddon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div> --}}
        <a href="/barang/keluar" class="text-decoration-none fs-6">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border" style="border-radius: 18px">
            <table class="table table-hover table-responsive mb-0">
                <thead class="thead-inverse">
                    <tr>
                        <th>Kode Keluar</th>
                        <th>Nama Barang</th>
                        <th>QTY</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangKeluars as $barangKeluar)                    
                        <tr>
                            <td scope="row">{{ $barangKeluar->kode_keluar }}</td>
                            <td>{{ $barangKeluar->barang->nama_barang }}</td>
                            <td>{{ $barangKeluar->jumlah_keluar }}</td>
                            <td>{{ $barangKeluar->tanggal_keluar }}</td>
                            <td>
                                @if ($barangKeluar->status == 'Di Pinjam')
                                    <span class="badge text-dark fw-normal" style="background: #F5F5FF; border: 1px solid #B8DBCA; padding: 2px 8px; font-size: 12px; line-height: 16px;">{{ $barangKeluar->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>