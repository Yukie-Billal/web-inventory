<?php

namespace App\Http\Livewire\BarangKeluar;

use App\Models\BarangKeluar;
use Livewire\Component;

class BarangKeluarIndex extends Component
{
    public $filterFrom;
    public $filterTo;
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'BarangkeluarAdded',
    ];

    public function BarangkeluarAdded()
    {
        # code...
    }

    public function render()
    {
        $barangs = BarangKeluar::orderByDesc('tanggal_keluar');

        if ($this->filterFrom != null) {
            $barangs = $barangs->where('tanggal_keluar', '>', $this->filterFrom);
        }

        if ($this->filterTo != null) {
            $barangs = $barangs->where('tanggal_keluar', '<', $this->filterTo);
        }

        if ($this->search != null) {
            $barangs = $barangs->where('tanggal_keluar', 'like', '%'.$this->search. '%')
                                ->orWhere('kode_barang', 'like', '%' .$this->search. '%' )
                                ->orWhere('nama_barang', 'like', '%' .$this->search. '%' );
        }


        return view('livewire.barang-keluar.barang-keluar-index',[
                'barangKeluars' => $barangs->get()
        ]);
    }
}
