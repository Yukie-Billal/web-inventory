<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;

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

    public function getSupplier($supplier)
    {
        $this->nama_supplier = $supplier['nama_supplier'];
        $this->nama_perusahaan = $supplier['nama_perusahaan'];
        $this->no_tlp = $supplier['no_tlp'];
        $this->alamat = $supplier['alamat'];
    }

    public function render()
    {
        return view('livewire.supplier.supplier-edit');
    }
}
