<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;

class DataPeminjam extends Component
{
    public $nama;
    public $no_tlp;
    public $alamat;
    public $perusahaan;
    
    public function render()
    {
        return view('livewire.peminjaman.data-peminjam');
    }
}
