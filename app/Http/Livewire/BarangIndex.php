<?php

namespace App\Http\Livewire;

use App\Helper\Trait\AppHelper as TraitAppHelper;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Traits\PaginateTrait;

class BarangIndex extends Component
{
    use WithPagination, PaginateTrait;

    public $pageCount;
    public $pageName = 'page';
    public $filter_kategori;
    public $filter_merek;
    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => '1'],
    ];

    protected $listeners = [
        'setFilter',
        'next-page' => 'nextPage',
        'previous-page' => 'previousPage',
        'pageTo' => "gotoPage",
        'setDelete' => 'deleteBarang',
    ];
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

    public function editBarang($id)
    {
        $barangEdit = Barang::find($id);
        $this->emit('getBarang', $barangEdit);
    }

    public function deleteConfirm($id)
    {
        $this->emit('swalConfirm', ['question', 'Hapus Data ?', true, 'setDelete', $id]);
    }

    public function deleteBarang($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            Barang::destroy($id);
            $params = ['success', 'Berhasil Menghapus Data', 2000];
        } else {
            $params = ['error', 'Data Tidak Ditemukan', 2000];
        }
        $this->emit('swal', $params);
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
        // Menghitung Page Dari Pagination
        $this->pageCount = $this->countPage($barangs->count());
        return view('livewire.barang-index', [
            'barangs' => $barangs->paginate(10),
            'kategoris' => Kategori::orderByDesc('nama_kategori')->get(),
            'barang_mereks' => $merek->get(),
        ]);
    }
}