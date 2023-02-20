<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarcodeKeranjang;
use App\Models\Supplier;
use Illuminate\Support\Str;

class BarcodeCreate extends Component
{
    public $barangId;
    public $kodeBarang;
    public $serialNumber;
    public $jumlah = 1;

    protected $listeners = [
        'setBarcode',
        'barcodeReseted'
    ];

    public function setBarcode($params)
    {
        if ($params[0] == 'serial' ) {
            $idBarang = Str::afterLast($params[1], '-');
            $data = Barang::find($idBarang);
            if ($data) {
                $this->barangId = $data->id;
            } else {
                $this->emit("swal", ['error','Barang Tidak Ditemukan', 2000]);
            }
        } else {
            $this->emit('swal', ['error', 'Terjadi kesalahan', 2000] );
        }
    }

    public function barcodeReseted()
    {
        // code...
    }

    public function clear()
    {
        $this->barangId = '';
        $this->serialNumber = '';
        $this->kodeBarang = '';
    }

    public function addKeranjang()
    {
        $barang = Barang::find($this->barangId);
        if ($barang) {
            $create = BarcodeKeranjang::create([
                'barang_id' => $barang->id,
                'barcode' => $barang->kode_barang,
                'jumlah' => $this->jumlah,
            ]);
            if ($create) {
                $this->emit('200');
            } else {
                $this->emit('swal', ['error', 'Terjadi Kesalahan', 2000]);
            }
        } else {
            $this->emit('swal', ['error', 'Barang Tidak Ditemukan', 2000]);
        }
    }

    public function render()
    {
        return view('livewire.cetak.barcode-create', [
            'barangs' => Barang::orderByDesc('created_at')->orderByDesc('nama_barang')->get(),
            'suppliers' => Supplier::all(),
        ]);
    }
}
