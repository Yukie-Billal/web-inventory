<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use PDF;

class BarangIndex extends Component
{
    use WithPagination;

    public $pageCount;
    public $pageName = 'page';
    public $filter_kategori;
    public $filter_merek;
    public $search;

    protected $paginationTheme = 'bootstrap';

    
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => '1'],
    ];

    protected $listeners = [
        'barangAdded',
        'barangEdited',
        'setFilter',
        'next-page' => 'nextPage',
        'previous-page' => 'previousPage',
        'setDelete' => 'deleteBarang',
        'pageTo' => "gotoPage"
    ];
    
    public function barangAdded()
    {
        session()->flash('message', 'Data Berhasil Ditambahkan');
    }
    public function barangEdited()
    {
        session()->flash('message', 'Data Berhasil Di Ubah');
    }
    public function setFilter($params)
    {
        if ($params == null) {
            $this->render();
        }
        if ($params[0] == 'kategori') {
            if ($params[1] == true) {
                $this->filter_kategori = $params[1];
            } else {
                $this->filter_kategori = '';
            }
            $this->filter_merek = '';
        }
        if ($params[0] == 'merek') {
            $this->filter_merek = $params[1];
        }
        $this->render();
    }

    public function pageSet($params)
    {
        $page = $params[0];
        $pageName = $params[1];
    }

    public function editBarang($id)
    {
        $barangEdit = Barang::find($id);
        $this->emit('getBarang', $barangEdit);
    }

    public function deleteConfirm($id)
    {
        $this->emit('swalDelete', $id);
    }

    public function deleteBarang($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            Barang::destroy($id);
        }
        $this->emit('deleted');
        $this->render();
    }

    public function render()
    {
        $merek = DB::table('barangs')->select('merek')->groupBy('merek');
        $barangs = Barang::orderByDesc('nama_barang')->orderByDesc('created_at');

        // Filter
        if ($this->filter_kategori != null) {
            $barangs->where('kategori_id', $this->filter_kategori);
            $merek->where('kategori_id', $this->filter_kategori);
        }
        if ($this->filter_merek != null) {
            $barangs->where('merek', $this->filter_merek);
        }

        if ($this->search != null) {
            $barangs = $barangs->where('nama_barang', 'like', '%' .$this->search. '%')->orWhere('kode', 'like', '%' .$this->search. '%')->orWhere('stok', 'like', '%' .$this->search. '%');
        }

        // cek Barang
        $barang_all = $barangs->count();
        
        // Menghitung Page Dari Pagination
        $sisa = $barang_all % 10;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($barang_all - $sisa) / 10) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->pageCount = 1;
        }

        return view('livewire.barang-index', [
            'barangs' => $barangs->paginate(10),
            'kategoris' => Kategori::orderByDesc('nama_kategori')->get(),
            'barang_mereks' => $merek->get(),
        ]);
    }
}