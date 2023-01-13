<?php

namespace App\Http\Livewire\BarangKeluar;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Livewire\Component;
use App\Models\BarangKeluarKeranjang;

class BarangkeluarList extends Component
{
    public $status;

    protected $listeners = [
        'AddedKeranjangKeluar',
        'kodeSlipper',
    ];

    public function updated()
    {
        
    }

    public function kodeSlipper($keranjang)
    {
        $this->kodeSlipper = $keranjang;
    }

    public function AddedKeranjangKeluar()
    {
        // ....
    }

    public function deleteBarangKeluarList($id)
    {
        $barangKeluarKeranjang = BarangKeluarKeranjang::find($id);
        if ($barangKeluarKeranjang) {
            BarangKeluarKeranjang::destroy($id);
        }
        $this->render();
    }

    public function confirm()
    {
        $bbk = BarangKeluarKeranjang::all();
        foreach ($bbk as $k) {
            BarangKeluar::create([
                'barang_id' => $k->barang_id,
                'kode_barang' => $k->kode_barang,
                'nama_barang' => $k->nama_barang,
                'tanggal_keluar' => $k->tanggal_keluar,
                'jumlah_keluar' => $k->jumlah_keluar,
                'status' => $k->status,
            ]);
            $k->destroy($k->id);
        }

        $this->emit('BarangkeluarAdded');
        $this->render();
    }

    public function render()
    {
        return view('livewire.barang-keluar.barangkeluar-list', [
            'barangKeluarKeranjangs' => BarangkeluarKeranjang::all(),
        ]);
    }
}
