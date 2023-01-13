<?php

namespace App\Http\Livewire\BarangKeluar;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarangKeluarKeranjang;

class BarangList extends Component
{
    public $kodeBarang;
    public $namaBarang;
    public $stok;
    public $jumlah_keluar;

    public function AddBarangKeluarList($id)
    {
        $barangList = Barang::find($id);

        if ($barangList) {
            BarangKeluarKeranjang::create([
                'barang_id' => $barangList->id,
                'kode_barang' => $barangList->kode,
                'nama_barang' => $barangList->nama_barang,
                'stok' => $barangList->stok,
                'jumlah_keluar' => 1,
                'tanggal_keluar' => date('Y-m-d'),
                'status' => 'Di Pinjam',
            ]);
        }
        $this->emit('AddedKeranjangKeluar');

        $this->render();
    }
    
    public function render()
    {
        return view('livewire.barang-keluar.barang-list', [
            'barangs' => Barang::orderByDesc('id')->get(),
        ]);
    }
}
