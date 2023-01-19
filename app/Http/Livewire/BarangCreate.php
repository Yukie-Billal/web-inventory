<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Support\Str;

class BarangCreate extends Component
{
    public $kode;
    public $NamaBarang;
    public $stok;

    protected $rules = [
        'kode' => 'required|min:6|unique:barangs',
        'NamaBarang' => 'required',
        'stok' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addBarang()
    {
        $this->validate();
        $baru = Barang::create([
            'kode' => $this->kode,
            'nama_barang' => $this->NamaBarang,
            'stok' => $this->stok
        ]);

        BarangMasuk::create([
            'barang_id' => $baru->id,
            'kode_barang' => $this->kode,
            'nama_barang' => $this->NamaBarang,
            'jumlah_masuk' => $this->stok,
            'tanggal_masuk' => date('Y-m-d'),
        ]);

        $this->kode = '';
        $this->NamaBarang = '';
        $this->stok = '';
        
        session()->flash('message', 'Berhasil Menambah Data');
        $this->emit('barangAdded');
    }

    public function render()
    {
        // Kalau Pake Scanner Komentarin kodingan di bawah
        $this->kode = Str::random(20);

        return view('livewire.barang-create');
    }
}
