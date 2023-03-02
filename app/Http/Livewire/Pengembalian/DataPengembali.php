<?php

namespace App\Http\Livewire\Pengembalian;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Pinjaman;
use App\Models\PengembalianKeranjang;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class DataPengembali extends Component
{
    public $pengembali;
    public $tanggalKembali;

    protected $rules = [
        'pengembali' => 'required',
        'tanggalKembali' => 'required'
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

    public function penguranganTanggal($awal, $akhir)
    {
        $tahun = Str::before($awal, '-');
        $bulan = Str::beforeLast($awal, '-');
        $bulan = Str::after($bulan, '-');
        $hari = Str::afterLast($awal, '-');

        $tahunAkhir = Str::before($akhir, '-');
        $bulanAkhir = Str::beforeLast($akhir, '-');
        $bulanAkhir = Str::after($bulanAkhir, '-');
        $hariAkhir = Str::afterLast($akhir, '-');

        $totalHari = (($bulan - $bulanAkhir) * 30) + ($hari - $hariAkhir) + (($tahun - $tahunAkhir) *366);

        return $totalHari;
    }

    public function submitPengembalian()
    {
        $this->validate();

        $datas = PengembalianKeranjang::orderByDesc('created_at')->get();
        if ($datas->count() >= 0) {
            foreach ($datas as $data) {
                $pinjam = Pinjaman::find($data->pinjaman_id);
                $lamaPinjam = $this->penguranganTanggal($this->tanggalKembali, $pinjam->tanggal_pinjam);
                Pengembalian::create([
                    'nama_pengembali' => $this->pengembali,
                    'barang_id' => $data->barang_id,
                    'lama_pinjam' => $lamaPinjam,
                    'tanggal_kembali' => date('Y-m-d'),
                ]);
                $barang = Barang::find($data->barang_id);
                $barang->update(['stok' => ($barang->stok + 1)]);
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
        if ($this->tanggalKembali == null) {
            $this->tanggalKembali = date('Y-m-d');
        }
        $data = DB::table('pinjamans')->select('nama_peminjam')->groupBy('nama_peminjam');
        return view('livewire.pengembalian.data-pengembali', [
            'pinjamans' => $data->get(),
        ]);
    }
}
