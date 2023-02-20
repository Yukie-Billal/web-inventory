<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;
use App\Traits\PaginateTrait;

class SupplierIndex extends Component
{
    use WithPagination, PaginateTrait;

    public $pageCount;
    public $pageName = 's';

    protected $queryString = [
        'page' => ['except' => '', 'as' => 's'],
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
        $this->emit('swalConfirm', ['question', 'Hapus Supplier ?', true, 'deleteSupplier', $id]);
    }

    public function deleteSupplier($id)
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $supplier->delete();
            $this->emit('swal', ['success', 'Data Supplier Berhasil Di Hapus', 2000]);
        } else {
            $this->emit('ok');
        }
    }

    public function render()
    {
        $suppliers = Supplier::orderByDesc('created_at')->orderByDesc('nama_supplier');

        $this->pageCount = $this->countPage($suppliers->count());
        
        return view('livewire.supplier.supplier-index', [
            'suppliers' => $suppliers->paginate(5, ['*'], 's'),
        ]);
    }
}
