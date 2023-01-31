<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\PeminjamanKeranjang;

class DataBarang extends Component
{
    use WithPagination;

    public $pageName = 'page';
    public $pageCount;

    protected $listeners = [
        'addPeminjaman' => 'render'
    ];

    public function addPinjamKeranjang($id)
    {
        $barang = Barang::find($id);
        // dd($barang->nama_barang);

        if ($barang) {      
            // $cek = PeminjamanKeranjang::where('barang_id', $id)->get();

            // if ($cek->count() > 0) {
                // dd($cek[0]->barang;
                // $cek[0]->update(['jumlah' => ($cek[0]->jumlah + 1)]);
            // } else {
                PeminjamanKeranjang::create([
                    'barang_id' => $id
                ]);                
            // }
        } else {
            session()->flash('failed', 'Gagal menambah barang');
        }
        $this->emit('addPinjamKeranjang');        
    }

    public function render()
    {
        $barangs = Barang::orderByDesc('created_at')->orderByDesc('nama_barang');
        $barang_all = $barangs->count();
        $sisa = $barang_all % 6;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($barang_all - $sisa) / 6) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->page = 1;
        }

        return view('livewire.peminjaman.data-barang', [
            'barangs' => $barangs->paginate(6),
        ]);
    }
}
