<?php

namespace App\Http\Livewire\BarangMasuk;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangMasukCreate extends Component
{
    public $namaBarang;
    public $serialNumber;
    public $merek;
    public $warna;
    public $kategori;
    public $satuan;
    public $qty = 1;
    public $namaSupplier;
    public $alamatSupplier;
    public $noTlp;
    public $namaPeruhasaan;
    public $s_baru = null;
    public $supplierId;

    protected $rules = [
        'kategori' => 'required|numeric',
        'serialNumber' => 'required|numeric|min:3',
        'namaSupplier' => 'required|min:5',
    ];

    protected $messages = [
        'kategori.required' => 'Kategori Wajib Di Isi',
        'serialNumber.required' => 'Serial Number Wajib Diisi',
        'serialNumber.numeric' => 'Serial Number Hanya Berisi Angka',
    ];

    public function updated($propertyName)
    {
        if ($propertyName == "namaSupplier") {
            $supplier = Supplier::where('nama_supplier', 'like', '%'. $this->namaSupplier .'%')->get()->count();
            $cek = Supplier::where('nama_supplier', $this->namaSupplier)->get()->count();
            if ($supplier <= 0) {
                $this->s_baru = false;
            } elseif ($cek == 0) {
                // $this->s_baru = true;
            } else {
                $this->s_baru = false;
            }
        }
        $this->validateOnly($propertyName);
    }

    protected $listeners = [
        'setKategori',
        'setSatuan',
        'setSupplier',
        'setStatus',
    ];

    public function setKategori($params)
    {
        $this->kategori = $params[0];
    }

    public function setSatuan($params)
    {
        $this->satuan = $params[0];
    }

    public function clear()
    {
        $this->namaBarang = null;
        $this->serialNumber = null;
        $this->merek = null;
        $this->warna = null;
        // $this->kategori = null;
        // $this->satuan = null;
        $this->qty = 1;
        $this->namaSupplier = null;
        $this->alamatSupplier = null;
        $this->noTlp = null;
        $this->namaPeruhasaan = null;
        $this->render();
    }

    public function setSupplier($params)
    {
        if ($params[0] == false) {
            $this->supplierId = $params[1];
            $this->namaSupplier = $params[2];
            $supplier = Supplier::where('nama_supplier', $params[2])->get();
            $cek = Supplier::find($params[1]);

            if ($supplier->count() > 0 && $cek) {
                $this->s_baru = false;
            } else {
                // dd($this->namaSupplier);
                $this->s_baru = true;
                $this->supplierId = '';
                $this->namaSupplier = '';
            }
        } else {
            if ($params[0] == true) {
                $this->supplierId = '';
                $this->namaSupplier = '';
            }
        }
        $this->render();
    }

    public function showAlert()
    {
        $this->emit('barangMasukAdded');
    }

    public function submit()
    {
        $barcode = Str::limit($this->namaBarang, 1, '') . date('Y') . Str::limit($this->merek, 1, '') . date('m') . date('d');
        $barang = Barang::create([
            'serial_number' => $this->serialNumber,
            'barcode' => $barcode,
            'nama_barang' => $this->namaBarang,
            'merek' => $this->merek,
            'warna' => $this->warna,
            'satuan' => $this->satuan,
            'stok' => $this->qty,
            'kategori_id' => $this->kategori
        ]);

        if ($barang) {
            if ($this->s_baru == null || $this->s_baru == true) {
                $supplier = Supplier::create([
                    'nama_supplier' => $this->namaSupplier,
                    'nama_perusahaan' => $this->namaPeruhasaan,
                    'no_tlp' => $this->noTlp,
                    'alamat' => $this->alamatSupplier
                ]);
            } elseif ($this->s_baru == false) {
                $supplier = Supplier::where('nama_supplier', $this->namaSupplier)->get();
            } else {
                
            }
            
        }

        if ($barang && $supplier) {
            $barangMasuk = BarangMasuk::create([
                'serial_number' => $this->serialNumber,
                'barcode' => $barcode,
                'nama_barang' => $this->namaBarang,
                'merek' => $this->merek,
                'warna' => $this->warna,
                'satuan' => $this->satuan,
                'qty' => $this->qty,
                'kategori_id' => $this->kategori,
                'tanggal_masuk' => date('Y-m-d'),
                'supplier_id' => $supplier->id
            ]);
            $message = 'Berhasil Menambah Data';
            // session()->flash('successAdd', 'Berhasil Menambah Data');
            // $this->dispatchBrowserEvent('swal:modal', [
            //     'type' => 'success',
            //     'title' => 'success Add Data',
            //     'button' => false,
            //     'timer' => 4000,
            // ]);
        } else {
            session()->flash('error', 'Terjadi Kesalahan');
            $message = "Terjadi Kesalahan";
        }
        $this->emit('barangMasukAdded', $message);
        $this->clear();
    }

    public function render()
    {
        $suppliers = Supplier::orderByDesc('nama_supplier')->orderByDesc('created_at');

        if ($this->namaSupplier != null) {
            $suppliers->where('nama_supplier', 'like', '%'. $this->namaSupplier .'%');
        }

        return view('livewire.barang-masuk.barang-masuk-create', [
            'kategoris' => Kategori::orderByDesc('nama_kategori')->get(),
            'suppliers' => $suppliers->get(),
        ]);
    }    
}