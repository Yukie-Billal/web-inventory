<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;

class SupplierIndex extends Component
{
    use WithPagination;

    public $pageCount;
    public $pageName = 's';

    protected $queryString = [
        'page' => ['except' => '', 'as' => 's'],
    ];

    public function render()
    {
        $suppliers = Supplier::orderByDesc('created_at')->orderByDesc('nama_supplier');
        return view('livewire.supplier.supplier-index', [
            'suppliers' => $suppliers->get(),
        ]);
    }
}
