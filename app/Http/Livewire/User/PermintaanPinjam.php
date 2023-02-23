<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Traits\ListenerTrait;
use App\Models\PermintaanPinjaman;

class PermintaanPinjam extends Component
{
    use ListenerTrait;

    public $tampilkanAlert = true;

    protected $listeners = [
        'toastify', 'fresh',
        'hapusPermintaan',
    ];

    public function deleteConfirm($id)
    {
        if ($this->tampilkanAlert == true) {
            if ($id){ 
                $this->emit('swalConfirm', ['warning','Hapus Permintaan ?', true, 'hapusPermintaan',$id]);
            } else {
                $this->emit('toastify', ['danger', 'Permintaan Tidak Di Temukan', 3000]);
            }
        } else {
            $this->emit('hapusPermintaan', $id);
        }
    }
    public function toggleAlert()
    {
        dd($this->tampilkanAlert);
        $this->tampilkanAlert = !$this->tampilkanAlert;
    }
    public function hapusPermintaan($id)
    {
        $permintaan = PermintaanPinjaman::find($id);
        if ($permintaan){ 
            $permintaan->delete();
            $this->emit('toastify', ['success', 'Permintaan Di Batalkan', 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Permintaan Tidak Di Temukan', 3000]);
        }
    }
    public function render()
    {
        return view('livewire.user.permintaan-pinjam', [
            'permintaans' => PermintaanPinjaman::orderByDesc('created_at')->get(),
        ]);
    }
}
