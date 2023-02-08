<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\Supplier;

class SupplierEdit extends Component
{
    public $supplierId;
    public $nama_supplier;
    public $nama_perusahaan;
    public $no_tlp;
    public $alamat;

    protected $listeners = [
        'getSupplier'
    ];

    protected $rules = [
        'nama_supplier' => 'required|min:2',
        'nama_perusahaan' => 'required|min:2',
        'no_tlp' => 'required|min:11',
        'alamat' => 'required|min:3'
    ];

    public function getSupplier($supplier)
    {
        $this->supplierId = $supplier['id'];
        $this->nama_supplier = $supplier['nama_supplier'];
        $this->nama_perusahaan = $supplier['nama_perusahaan'];
        $this->no_tlp = $supplier['no_tlp'];
        $this->alamat = $supplier['alamat'];
    }

    public function updateSupplier()
    {
        // $this->validate();
        $supplier = Supplier::find($this->supplierId);
        if ($supplier) {
            $supplier->update([
                'nama_supplier' => $this->nama_supplier,
                'nama_perusahaan' => $this->nama_perusahaan,
                'no_tlp' => $this->no_tlp,
                'alamat' => $this->alamat,
            ]);

            $params = ['success', 'Data Supplier Berhasil Di Edit'];
            $this->emit('supEdited', $params);
        } else {
            $params = ['error', 'Terjadi Kesalahan, Silahkan Muat Ulang Dialog'];
            $emit('showAlert', $params);
        }
    }

    public function render()
    {
        return view('livewire.supplier.supplier-edit');
    }
}
