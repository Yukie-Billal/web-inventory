<?php

namespace App\Http\Livewire\BarangKeluar;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarangKeluarKeranjang;
use App\Models\BarangMasukKeranjang;

class BarangList extends Component
{
    public $kodeBarang;
    public $namaBarang;
    public $stok;
    public $jumlah_keluar;
    public $where;
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'BarangkeluarAdded' => 'render',
        'BarangMasukAdded' => 'render',
    ];

    public function AddBarangList($id)
    {
        $barangList = Barang::find($id);

        if ($this->where == 'm') {
            BarangMasukKeranjang::create([
                'barang_id' => $barangList->id,
                'kode_barang' => $barangList->kode,
                'nama_barang' => $barangList->nama_barang,
                'jumlah_masuk' => 1,
                'tanggal_masuk' => date('Y-m-d'),
            ]);
            $this->emit('AddedKeranjangMasuk');
        }
        // Jika Sedang Berada Di Data barang Keluar
        if ($this->where == 'k') {            
            if ($barangList) {
                BarangKeluarKeranjang::create([
                    'barang_id' => $barangList->id,
                    'kode_barang' => $barangList->kode,
                    'nama_barang' => $barangList->nama_barang,
                    'jumlah_keluar' => 1,
                    'tanggal_keluar' => date('Y-m-d'),
                    'status' => 'Pinjam',
                ]);
            }
            $this->emit('AddedKeranjangKeluar');
        }
        $this->search = '';
        $this->render();
    }
    
    public function render()
    {
        $barang = Barang::orderByDesc('id');

        if ($this->search != null) {
            $barang->where('kode', 'like', '%'. $this->search .'%')
                    ->orWhere('nama_barang','like', '%'. $this->search .'%')
                    ->orWhere('stok','like', '%'. $this->search .'%');
        }
        return view('livewire.barang-keluar.barang-list', [
            'barangs' => $barang->get(),
        ]);
    }
}
