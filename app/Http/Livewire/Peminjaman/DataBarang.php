<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\PeminjamanKeranjang;
use App\Traits\PaginateTrait;
use App\Traits\ListenerTrait;

class DataBarang extends Component
{
    use WithPagination, PaginateTrait, ListenerTrait;

    public $pageName = 'page';
    public $pageCount;

    public $barcode;
    public $serial;

    protected $listeners = [
        'toastify','swal','fresh',
        'addPeminjaman' => 'render',
    ];

    public function bersih()
    {
        $this->barcode = '';
        $this->serial = '';
    }

    public function addPinjamKeranjang($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            PeminjamanKeranjang::create([
                'user_id' => auth()->user()->id,
                'barang_id' => $id
            ]);
            $this->emit('toastify',['success','Ditambahkan Ke Keranjang', 3000]);
            $this->bersih();
        } else {
            $this->emit('toastify', ['danger', 'Gagal Menambahkan Barang', 2000]);
        }
    }

    public function cariBarcode()
    {
        $barang = Barang::where('kode_barang', $this->barcode)->first();

        if ($barang) {
            $this->addPinjamKeranjang($barang->id);
            $this->emit('toastify',['success','Barang Ditemukan', 2500]);
        } else {
            $this->emit('swal', ['error', 'Barang Tidak Ditemukan', 2500]);
        }
    }

    public function cariSerial()
    {
        $barang = Barang::where('serial_number', $this->serial)->first();

        if ($barang) {
            $this->addPinjamKeranjang($barang->id);
            $this->emit('toastify',['success','Barang Ditemukan', 2500]);
        } else {
            $this->emit('toastify',['danger', 'Barang Tidak Ditemukan', 2500]);
        }
    }

    public function render()
    {
        $barangs = Barang::orderByDesc('created_at')->orderByDesc('nama_barang');

        $this->countPage($barangs->count());
        
        return view('livewire.peminjaman.data-barang', [
            'barangs' => $barangs->paginate(6),
        ]);
    }
}