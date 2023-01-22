@extends('App')

@section('content')
    
    <div class="row">

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card flex-fill border-0">
                <div class="card-header bg-white border-0">
                    <div class="form-group">
                        <label for="barcode">Scan Barcode</label>
                        <input type="text" id="barcode" class="input-form text-m-regular" placeholder="Masukkan Kode">
                    </div>
                </div>
                <div class="card-body p-0 border-1 rounded">
                    <table class="table table-hover table-responsive ">
                        <thead class="border-0">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Warna</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                            </tr>
                            </thead>
                            <tbody>
                                {{-- Foreach --}}
                                <tr>
                                    <td>Laptop asus</td>
                                    <td>Asus</td>
                                    <td>Hitam</td>
                                    <td>Elektronik</td>
                                    <td>Pcs</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection