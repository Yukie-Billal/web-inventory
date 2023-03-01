<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Traits\ListenerTrait;
use App\Models\PermintaanPinjaman;
use App\Models\Pinjaman;
use Illuminate\Support\Str;

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
    
    public function tandaiSelesai($id)
    {
        $permintaan = PermintaanPinjaman::find($id);

        if ($permintaan) {
            if (Str::lower($permintaan->status) == "di terima") {                
                $pinjaman = Pinjaman::create([
                    'user_id' => auth()->user()->id,
                    'nama_peminjam' => auth()->user()->nama,
                    'no_tlp' => auth()->user()->no_tlp,
                    'alamat' => auth()->user()->alamat,
                    'barang_id' => $permintaan->barang_id,
                    'tanggal_pinjam' => date('Y-m-d'),
                    'status' => 'Di Pinjam'
                ]);

                if ($pinjaman) {
                    $this->emit('toastify', ['success','Ditandai Sudah Di Pinjam', 3000]);
                    $permintaan->delete();
                } else {
                    $this->emit('toastify', ['danger','Gagal Menandai', 3000]);
                }
            } else {
                $this->emit('toastify', ['danger','Permintaan Belum Disetujui', 3000]);
            }
        } else {
            $this->emit('toastify', ['danger','Permintaan Tidak Ditemukan', 3000]);
        }
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
