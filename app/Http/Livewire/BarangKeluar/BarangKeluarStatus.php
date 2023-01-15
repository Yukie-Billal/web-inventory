<?php

namespace App\Http\Livewire\BarangKeluar;

use App\Models\BarangKeluarKeranjang;
use Livewire\Component;

class BarangKeluarStatus extends Component
{
    public $status;
    public $data;

    public function statusCovery($id)
    {
        $bkk = BarangKeluarKeranjang::find($id);
        if ($bkk) {
            $bkk->update([
                'status' => $this->status
            ]);
        }
        $this->status = $this->data->status;
        $this->render();
    }

    public function render()
    {
        return view('livewire.barang-keluar.barang-keluar-status', [
            'barangKeluarKeranjang' => $this->data,
        ]);
    }
}
