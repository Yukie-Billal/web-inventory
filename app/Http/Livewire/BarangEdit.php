<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;

class BarangEdit extends Component
{
    public $idBarang;
    public $kode;
    public $namaBarang;
    public $stok;

    protected $listeners = [
        'getBarang',
    ];

    public function getBarang($barangEdit)
    {
        $this->idBarang = $barangEdit['id'];
        $this->kode = $barangEdit['kode'];
        $this->namaBarang = $barangEdit['nama_barang'];
        $this->stok = $barangEdit['stok'];
    }

    public function updateBarang()
    {
        $barang = Barang::find($this->idBarang);

        $barang->update([
            'kode' => $this->kode,
            'nama_barang' => $this->namaBarang,
            'stok' => $this->stok,
        ]);

        $this->idBarang = '';
        $this->kode = '';
        $this->namaBarang = '';
        $this->stok = '';

        $this->emit('barangEdited');
    }

    public function render()
    {
        return view('livewire.barang-edit');
    }
}
