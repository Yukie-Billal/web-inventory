<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;

class SupplierIndex extends Component
{
    use WithPagination;

    public $pageCount;
    public $pageName = 'supplierPage';

    protected $queryString = [
        'page' => ['except' => '', 'as' => 'supplierPage'],
    ];

    protected $listeners = [
        'supEdited' => 'render',
        'next-page' => 'nextPage',
        'previous-page' => 'previousPage',
        'pageTo' => "gotoPage",
        'deleteSupplier'
    ];

    public function editSupplier($id)
    {
        $supplier = Supplier::find($id);
        $this->emit('getSupplier', $supplier);        
    }

    public function confirmDelete($id)
    {
        $params = ['question', 'Hapus Supplier ?', true, 'deleteSupplier', $id];
        $this->emit('alertConfirm', $params);
    }

    public function deleteSupplier($id)
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $supplier->delete();
            $this->emit('deleted', 'Data Supplier Berhasil Di Hapus');
        } else {
            $this->emit('ok');
        }
    }

    public function render()
    {
        $suppliers = Supplier::orderByDesc('created_at')->orderByDesc('nama_supplier');

        $all = $suppliers->count();
        $sisa = $all % 10;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($all - $sisa) / 10) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->page = 1;
        }
        
        return view('livewire.supplier.supplier-index', [
            'suppliers' => $suppliers->paginate(5),
        ]);
    }
}
