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

    protected $rules = [
        'namaBarang' => 'required',
        'merek' => 'required',
        'warna' => 'required',
        'satuan' => 'required',
        'kategoriId' => 'required',
        'stok' => 'required|numeric'
    ];

    protected $message = [
        'namaBarang.required' => ':attribute Harus Di isi',
        'merek.required' => ':attribute Harus Di isi',
        'warna.required' => ':attribute Harus Di isi',
        'satuan.required' => ':attribute Harus Di isi',
        'kategoriId.required' => ':attribute Harus Di isi',
        'stok.required' => ':attribute Harus Di isi',
        'stok.numeric' => ':attribute Harus Number'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

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
        $this->barcode = $barangEdit['kode_barang'];
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
            'kode_barang' => $this->barcode,
            'nama_barang' => $this->namaBarang,
            'merek' => $this->merek,
            'warna' => $this->warna,
            'satuan' => $this->satuan,
            'kategoriId' => $this->kategoriId,
            'stok' => $this->stok,
        ]);
        $this->clearVariabel();
        $this->emit('swal', ['success', 'Barang Di Edit', 2000]);
    }

    public function render()
    {
        return view('livewire.barang-edit', [
            'kategoris' => Kategori::orderByDesc('nama_kategori')->get()
        ]);
    }
}