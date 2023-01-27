<?php

namespace App\Http\Livewire\BarangMasuk;

use Livewire\Component;
use App\Models\BarangMasuk;
use Livewire\WithPagination;

class BarangMasukIndex extends Component
{
    use WithPagination;

    public $pageName = 'page';
    public $pageCount;

    public $filterFrom;
    public $filterTo;
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'BarangMasukAdded',
        'barangAdded',
        'next-page' => 'next',
        'previous-page' => 'previous',
    ];
    public function next($page)
    {
        $this->nextPage($page);
    }
    public function previous($page)
    {
        $this->previousPage($page);
    }

    public function BarangMasukAdded()
    {
        # code...
    }

    public function barangAdded()
    {
        // code...
    }

    public function render()
    {
        $barangs = BarangMasuk::orderByDesc('created_at')->orderByDesc('tanggal_masuk');

        if ($this->filterFrom != null) {
            $barangs = $barangs->where('tanggal_masuk', '>', $this->filterFrom);
        }

        if ($this->filterTo != null) {
            $barangs = $barangs->where('tanggal_masuk', '<', $this->filterTo);
        }

        if ($this->search != null) {
            $barangs = $barangs->where('tanggal_masuk', 'like', '%'.$this->search. '%')->orWhere('kode_barang', 'like', '%' .$this->search. '%' );
        }

        // Menghitung Page Dari Pagination
        $barang_all = $barangs->count();
        $sisa = $barang_all % 10;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($barang_all - $sisa) / 10) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->page = 1;
        }

        return view('livewire.barang-masuk.barang-masuk-index',[
                'barangMasuks' => $barangs->paginate(10)
        ]);
    }
}
