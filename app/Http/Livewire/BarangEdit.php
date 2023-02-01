<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Kategori;

class BarangEdit extends Component
{
    public $idBarang;
    public $serialNumber;
    public $barcode;
    public $namaBarang;
    public $merek;
    public $warna;
    public $satuan;
    public $kategoriId;
    public $stok;

    protected $listeners = [
        'getBarang',
        'setKategori',
    ];

    public function setKategori($params)
    {
        dd($params);
    }

    public function clearVariabel()
    {
        $this->idBarang = '';
        $this->serialNumber = '';
        $this->barcode = '';
        $this->namaBarang = '';
        $this->merek = '';
        $this->warna = '';
        $this->satuan = '';
        $this->kategoriId = '';
        $this->stok = '';
    }

    public function getBarang($barangEdit)
    {
        $this->idBarang = $barangEdit['id'];
        $this->serialNumber = $barangEdit['serial_number'];
        $this->barcode = $barangEdit['barcode'];
        $this->namaBarang = $barangEdit['nama_barang'];
        $this->merek = $barangEdit['merek'];
        $this->warna = $barangEdit['warna'];
        $this->satuan = $barangEdit['satuan'];
        $this->kategoriId = $barangEdit['kategori_id'];        
        $this->stok = $barangEdit['stok'];
    }

    public function updateBarang()
    {
        $barang = Barang::find($this->idBarang);

        $barang->update([
            'serial_number' => $this->serialNumber,
            'barcode' => $this->barcode,
            'nama_barang' => $this->namaBarang,
            'merek' => $this->merek,
            'warna' => $this->warna,
            'satuan' => $this->satuan,
            'kategoriId' => $this->kategoriId,
            'stok' => $this->stok,
        ]);

        $this->clearVariabel();

        $this->emit('barangEdited');
    }

    public function render()
    {
        return view('livewire.barang-edit', [
            'kategoris' => Kategori::orderByDesc('nama_kategori')->get()
        ]);
    }
}
