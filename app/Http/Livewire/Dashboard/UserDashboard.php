<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Barang;
use Illuminate\Support\Str;
use App\Models\PeminjamanKeranjang;
use App\Traits\ListenerTrait;

class UserDashboard extends Component
{
    use ListenerTrait;
    
    public $barang;
    protected $listeners = [
        'resetKeranjang',
    ];

    public function resetKeranjang()
    {
        $keranjangs = PeminjamanKeranjang::where('user_id', auth()->user()->id)->get();
        foreach ($keranjangs as $keranjang) {
            $keranjang->delete();
        }
        $this->emit('toastify', ['danger', 'Reseted Item', 3000]);
    }    

    public function deleteList($id)
    {
        $item = PeminjamanKeranjang::find($id);
        if ($item) {
            $item->delete();
            $this->emit('toastify', ['success','Di Hapus Dari List', 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Item Tidak Ditemukan', 3000]);
        }
    }

    public function render()
    {
        // $this->addListener();
        // dd($this->listeners);
        return view('livewire.dashboard.user-dashboard');
    }
}
