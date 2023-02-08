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
    public $namaPerusahaan;
    public $s_baru = false;
    public $supplierId;

    protected $rules = [
        'namaBarang' => 'required|min:2',
        'kategori' => 'required|numeric',
        'serialNumber' => 'required|numeric|min:3',
        'qty' => 'required|numeric',
        'namaSupplier' => 'required|min:2',
        'namaPerusahaan' => 'required|min:2',
        'merek' => 'required|min:2',
        'warna' => 'required|min:2'
    ];

    protected $messages = [
        'namaBarang.required' => 'Nama Barang harus diisi',
        'namaBarang.min' => 'Nama Barang harus lebih dari :min karakter',
        'kategori.required' => 'Kategori wajib di isi',
        'kategori.numeric' => 'Terjadi Kesalahan, silahkan pilih ulang',
        'serialNumber.required' => 'Serial number wajib diisi',
        'serialNumber.numeric' => 'Serial number hanya berisi angka',
        'qty.required' => 'Jumlah harus diisi',
        'qty.numeric' => 'Jumlah hanya boleh berupa angka',
        'namaSupplier.required' => 'Nama Supplier tidak boleh kosong',
        'namaSupplier.min' => 'Nama Supplier harus lebih dari :min karakter',
        'namaPerusahaan.required' => 'Nama Perusahaan tidak boleh kosong',
        'namaPerusahaan.min' => 'Nama Perusahaan harus lebih dari :min karakter',
        'merek.required' => 'Merek tidak boleh kosong',
        'merek.min' => 'Merek harus lebih dari :min karakter',
        'warna.required' => 'Warna tidak boleh kosong',
        'warna.min' => 'Warna harus lebih dari :min karakter',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $listeners = [
        'setKategori',
        'setSatuan',
        'setStatus',
        'setSupplier',
    ];

    public function setSupplier($id)
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $this->supplierId = $supplier->id;
            $this->namaSupplier = $supplier->nama_supplier;
            $this->namaPerusahaan = $supplier->nama_perusahaan;
            $this->alamatSupplier = $supplier->alamat;
            $this->noTlp = $supplier->no_tlp;
            $this->s_baru = false;
        } else {
            $this->clear('supp');
            $this->s_baru = true;
        }
    }

    public function setKategori($params)
    {
        $this->kategori = $params[0];
    }

    public function setSatuan($params)
    {
        $this->satuan = $params[0];
    }

    public function clear($params)
    {
        if ($params == 'supp') {
            $this->namaSupplier = null;
            $this->alamatSupplier = null;
            $this->noTlp = null;
            $this->namaPerusahaan = null;
        } else {
            $this->namaBarang = null;
            $this->serialNumber = null;
            $this->merek = null;
            $this->warna = null;
            $this->qty = 1;
            $this->namaSupplier = null;
            $this->alamatSupplier = null;
            $this->noTlp = null;
            $this->namaPerusahaan = null;
        }
        $this->render();
    }

    public function showAlert()
    {
        $this->emit('barangMasukAdded');
    }

    public function submit()
    {
        $this->validate();
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
                    'nama_perusahaan' => $this->namaPerusahaan,
                    'no_tlp' => $this->noTlp,
                    'alamat' => $this->alamatSupplier
                ]);
            } elseif ($this->s_baru == false) {
                $supplier = Supplier::where('nama_supplier', $this->namaSupplier)->get();
            } else {
                $supplier = '';
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
        $this->clear('all');
    }

    public function render()
    {
        $suppliers = Supplier::orderByDesc('nama_supplier')->orderByDesc('created_at');

        // if ($this->namaSupplier != null) {
        //     $suppliers->where('nama_supplier', 'like', '%'. $this->namaSupplier .'%');
        // }

        return view('livewire.barang-masuk.barang-masuk-create', [
            'kategoris' => Kategori::orderByDesc('nama_kategori')->get(),
            'suppliers' => $suppliers->get(),
        ]);
    }    
}