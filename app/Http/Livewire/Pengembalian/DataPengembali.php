<?php

namespace App\Http\Livewire\Pengembalian;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Pinjaman;
use App\Models\PengembalianKeranjang;
use Illuminate\Support\Facades\DB;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Http;

class DataPengembali extends Component
{
    public $pengembali;
    public $lama;

    protected $rules = [
        'pengembali' => 'required',
        'lama' => 'required'
    ];

    protected $listeners = [
        'setPengembali',
    ];

    public function setPengembali($params)
    {
        // return Http::get('https://laravel.com');
        if ($params[0] == 'pengembali') {
            $this->emit('dataPengembali', $params[1]);
            $this->pengembali = $params[1];
        } else {
            session()->flash('error', 'Gagal Mendapatkan Data');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitPengembalian()
    {
        $this->validate();

        $datas = PengembalianKeranjang::orderByDesc('created_at')->get();
        if ($datas->count() >= 0) {
            foreach ($datas as $data) {
                Pengembalian::create([
                    'nama_pengembali' => $this->pengembali,
                    'barang_id' => $data->barang_id,
                    'lama_pinjam' => $this->lama,
                    'tanggal_kembali' => date('Y-m-d'),
                ]);
                $barang = Barang::find($data->barang_id);
                $barang->update(['stok' => ($barang->stok + 1)]);
                $pinjam = Pinjaman::find($data->pinjaman_id);
                $pinjam->delete();
            }
        } else {
            session()->flash('kosong', 'Tidak Ada Barang Yang Dikembalikan');
        }
        $this->lama = '';
        $this->pengembali = '';
        $this->emit('addedPengembalian');
    }

    public function render()
    {
        $data = DB::table('pinjamans')->select('nama_peminjam')->groupBy('nama_peminjam');
        return view('livewire.pengembalian.data-pengembali', [
            'pinjamans' => $data->get(),
        ]);
    }
}
