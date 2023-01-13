@extends('App')

@section('content')

<div class="row p-3">
    <div class="col-12">
        <img src="{{ asset('fontawesome/svgs/solid/image.svg') }}" alt="123" class="img-fluid" style="width: 100%; height: 240px;">
    </div>
</div>
<div class="row p-3 justify-content-start mb-4">
    <div class="col-8">
        <h3 class="mb-2">Keterangan</h3>
        <p class="text-neutral-100">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit facilis nulla non delectus aperiam optio corporis sapiente, quos laudantium nisi eius a tenetur mollitia incidunt et amet enim sed libero tempore rerum accusantium voluptatibus soluta ex modi! Sit, repudiandae! Sapiente.
        </p>
    </div>
</div>
<div class="row justify-content-end p-3">
    <div class="col-5">
        {{-- <livewire: > --}}
        <div class="card flex-fill border-0">
            <div class="card-header border-0 bg-white">
                <a href="/barang/keluar" class="text-decoration-none fs-6">
                    <button class="button button-primary text-white">
                        View All
                    </button>
                </a>
            </div>
            <div class="card-body p-0">
                <div class="col-12 p-0 border" style="border-radius: 18px">
                    <table class="table table-hover table-responsive mb-0">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row p-3 pb-5">
    <div class="col-md-8">
        <livewire:barang-keluar.barang-keluar-home>
    </div>
</div>

@endsection

