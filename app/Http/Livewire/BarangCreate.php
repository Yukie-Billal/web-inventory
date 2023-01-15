<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barang;

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
        Barang::create([
            'kode' => $this->kode,
            'nama_barang' => $this->NamaBarang,
            'stok' => $this->stok
        ]);

        $this->kode = '';
        $this->NamaBarang = '';
        $this->stok = '';
        
        $this->emit('barangAdded');
    }

    public function render()
    {
        return view('livewire.barang-create');
    }
}
