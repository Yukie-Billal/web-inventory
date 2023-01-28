<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

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
            $this->filter_kategori = $params[1];
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
        $this->gotoPage($page, $pageName);
    }

    public function editBarang($id)
    {
        $barangEdit = Barang::find($id);
        $this->emit('getBarang', $barangEdit);
    }

    public function deleteBarang($id)
    {
        $barang = Barang::find($id);
        // $barangkeluar = BarangKeluar::where('barang_id', $barang->id)->get();
        // $barangMasuk = BarangMasuk::where('barang_id', $barang->id)->get();

        // if ($barangkeluar->count() > 0 || $barangMasuk->count() > 0) {
        //     session()->flash('message', 'Gagal Menghapus Data');
        // } else {
            if ($barang) {
                Barang::destroy($id);
            }
            session()->flash('message', 'Berhasil Menghapus Data');
        // }
        $this->render();
    }

    public function render()
    {
        // $this->paginate_pageCount();

        $merek = DB::table('barangs')->select('merek')->groupBy('merek');
        $barangs = Barang::orderByDesc('nama_barang')->orderByDesc('created_at');

        // Filter
        if ($this->filter_merek != null) {
            $barangs->where('merek', $this->filter_merek);
        }
        if ($this->filter_kategori != null) {
            $barangs->where('kategori_id', $this->filter_kategori);
            $merek->where('kategori_id', $this->filter_kategori);
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