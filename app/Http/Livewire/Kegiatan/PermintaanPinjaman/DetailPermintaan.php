<?php

namespace App\Http\Livewire\Kegiatan\PermintaanPinjaman;

use Livewire\Component;
use App\Models\PermintaanPinjaman;
use App\Traits\ListenerTrait;

class DetailPermintaan extends Component
{
    use ListenerTrait;

    public $permintaan;
    protected $listeners = [
        'toastify', 'fresh',
        'tolakPermintaan',
        'terimaPermintaan',
    ];

    public function tolakPermintaan()
    {
        $permintaan = PermintaanPinjaman::find($this->permintaan->id);
        if ($permintaan) {
            $permintaan->update(["status" => 'Di Tolak']);
            $this->emit('toastify', ['success', 'Permintaan Di Tolak', 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Terjadi Kesalahan', 3000]);
        }
    }

    public function terimaPermintaan()
    {
        $permintaan = PermintaanPinjaman::find($this->permintaan->id);
        if ($permintaan) {
            $permintaan->update(["status" => 'Di Terima']);
            $this->emit('toastify', ['success', 'Permintaan Diterima', 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Terjadi Kesalahan', 3000]);
        }
    }

    public function render()
    {
        return view('livewire.kegiatan.permintaan-pinjaman.detail-permintaan');
    }
}
