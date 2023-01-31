<?php

namespace App\Http\Livewire\Peminjaman;

use App\Models\Barang;
use App\Models\PeminjamanKeranjang;
use App\Models\Pinjaman;
use App\Models\User;
use Livewire\Component;

class DataPeminjam extends Component
{
    public $nama;
    public $no_tlp;
    public $alamat;
    public $perusahaan;

    public function clearVariabel()
    {
        $this->nama = '';
        $this->no_tlp = '';
        $this->alamat = '';
        $this->perusahaan = '';
    }

    public function kurangStok($id)
    {
        $barang = Barang::find($id);
        $stok = ($barang->stok - 1);
        $barang->update(['stok' => $stok]);
    }

    public function addPeminjaman()
    {        
        $dataBarang = PeminjamanKeranjang::orderByDesc('created_at')->get();
        // $loop = ($dataBarang->count() - 1);
        // User::where('nama', $this->nama)->where('no_tlp', $this->no_tlp)->where('alamat', $this->alamat)->where('nama_perusahaan', $this->nama_perusahaan)->get();
        if ($dataBarang->count() > 0) {
            foreach ($dataBarang as $item) {
                // dd($item->barang->nama_barang);
                $pinjaman = Pinjaman::create([
                    'nama_peminjam' => $this->nama,
                    'no_tlp' => $this->no_tlp,
                    // 'alamat' => $this->alamat,
                    'barang_id' => $item->barang->id,
                    'tanggal_pinjam' => date('Y-m-d'),
                    'status' => 'Pinjam'
                ]);

                if ($pinjaman) {
                    $item->delete();
                    $this->kurangStok($item->barang->id);
                }
            }
        } else {
            session()->flash('barangkosong', 'Tidak Ada Barang yang Dipilih');
        }
        $this->clearVariabel();
        $this->emit('addPeminjaman');
    }

    public function render()
    {
        return view('livewire.peminjaman.data-peminjam');
    }
}
