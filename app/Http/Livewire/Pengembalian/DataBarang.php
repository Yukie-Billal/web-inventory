<?php

namespace App\Http\Livewire\Pengembalian;

use Livewire\Component;
use App\Models\Pinjaman;
use App\Models\Barang;
use App\Models\PengembalianKeranjang;

class DataBarang extends Component
{
    public $peminjam;
    public $delete = false;

    protected $listeners = [
        'dataPengembali' => 'getPeminjam',
        'addedPengembalian' => 'bersihKeranjang'
    ];

    public function getPeminjam($id)
    {        
        $this->peminjam = $id;
        $this->delete = false;
        $this->render();
    }

    public function bersihKeranjang()
    {
        $datas = PengembalianKeranjang::all();
        foreach ($datas as $data) {
            $data->delete();
        }
    }

    public function addKeranjang($pinjamans)
    {
        foreach ($pinjamans as $pinjam) {
            PengembalianKeranjang::create([
                'barang_id' => $pinjam->barang->id,
                'pinjaman_id' => $pinjam->id
            ]);
        }
    }

    public function deleteFromKeranjang($id)
    {
        $data = PengembalianKeranjang::find($id);
        // dd($data);
        $data->delete();
        $this->delete = true;
        $this->render();        
    }

    public function render()
    {
        $pinjamans = Pinjaman::orderByDesc('created_at')->where('nama_peminjam', $this->peminjam);
        // dd($pinjamans->get());
        if ($this->delete == false) {
            $this->bersihKeranjang();
            $this->addKeranjang($pinjamans->get());
        }        
        $data = PengembalianKeranjang::orderByDesc('created_at');
        return view('livewire.pengembalian.data-barang', [
            'barang_pinjams' => $data->get()
        ]);
    }
}
