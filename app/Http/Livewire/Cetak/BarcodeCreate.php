<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarcodeKeranjang;

class BarcodeCreate extends Component
{
    public $barangId;
    public $kodeBarang;
    public $namaBarang;
    public $merek;
    public $kategori;
    public $warna;
    public $satuan;
    public $serialNumber;
    public $jumlah = 1;

    protected $listeners = [
        'setBarang',
    ];

    public function setBarang($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            if ($barang->kategori == '' || $barang->kategori == '[]') {
                $this->emit('500', 'Terjadi Kesalahan Server, Tunggu Beberapa saat');
            } else {
                $this->barangId = $id;
                $this->serialNumber = $barang->serial_number;
                $this->kodeBarang = $barang->barcode;
                $this->namaBarang = $barang->nama_barang;
                $this->merek = $barang->merek;
                $this->warna = $barang->warna;
                $this->kategori = $barang->kategori->nama_kategori;
                $this->satuan = $barang->satuan;
            }            
        } else {
            $this->emit("404", 'Barang Tidak Ditemukan');
        }
        
    }

    public function clear()
    {
        $this->barangid = '';
        $this->serialNumber = '';
        $this->kodeBarang = '';
        $this->namaBarang = '';
        $this->merek = '';
        $this->warna = '';
        $this->kategori = '';
        $this->satuan = '';
    }

    public function addKeranjang()
    {
        $barang = Barang::find($this->barangId);

        if ($barang) {
            $create = BarcodeKeranjang::create([
                'barang_id' => $barang->id,
                'barcode' => $barang->barcode,
                'jumlah' => $this->jumlah,
            ]);
            if ($create) {
                $this->emit('200', 'Berhasil Disimpan');
            } else {
                $this->emit('500', 'Terjadi Kelasahan');
            }
        } else {
            $this->emit('400', 'Barang Tidak Ada, Silahkan Isi kembali');
        }

        $this->clear();
    }

    public function render()
    {
        return view('livewire.cetak.barcode-create', [
            'barangs' => Barang::orderByDesc('nama_barang')->get(),
        ]);
    }
}
