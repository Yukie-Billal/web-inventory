<?php

namespace App\Http\Livewire\BarangMasuk;

use Livewire\Component;
use App\Models\BarangMasuk;

class BarangMasukIndex extends Component
{
    public $filterFrom;
    public $filterTo;
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'BarangMasukAdded',
    ];

    public function BarangMasukAdded()
    {
        # code...
    }

    public function render()
    {
        $barangs = BarangMasuk::orderByDesc('tanggal_masuk');

        if ($this->filterFrom != null) {
            $barangs = $barangs->where('tanggal_masuk', '>', $this->filterFrom);
        }

        if ($this->filterTo != null) {
            $barangs = $barangs->where('tanggal_masuk', '<', $this->filterTo);
        }

        if ($this->search != null) {
            $barangs = $barangs->where('tanggal_masuk', 'like', '%'.$this->search. '%')->orWhere('kode_barang', 'like', '%' .$this->search. '%' );
        }


        return view('livewire.barang-masuk.barang-masuk-index',[
                'barangMasuks' => $barangs->get()
        ]);
    }
}
