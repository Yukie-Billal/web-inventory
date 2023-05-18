<?php

namespace App\Http\Livewire\BarangMasuk;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Traits\ListenerTrait;

class BarangMasukCreate extends Component
{
    use ListenerTrait;

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
    public $tanggalMasuk;

    protected $rules = [
        'namaBarang' => 'required|min:2',
        'kategori' => 'required',
        'serialNumber' => 'required|numeric|min:3',
        'qty' => 'required|numeric',
        'namaSupplier' => 'required|min:2',
        'namaPerusahaan' => 'required|min:2',
        'merek' => 'required|min:2',
        'warna' => 'required|min:2'
    ];

    protected $messages = [
        'namaBarang.required' => ':attribute harus diisi',
        'namaBarang.min' => ':attribute harus lebih dari :min karakter',
        'kategori.required' => ':attribute wajib di isi',
        'serialNumber.required' => ':attribute wajib diisi',
        'serialNumber.numeric' => ':attribute hanya berisi angka',
        'qty.required' => ':attribute harus diisi',
        'qty.numeric' => ':attribute hanya boleh berupa angka',
        'namaSupplier.required' => ':attribute tidak boleh kosong',
        'namaSupplier.min' => ':attribute harus lebih dari :min karakter',
        'namaPerusahaan.required' => ':attribute tidak boleh kosong',
        'namaPerusahaan.min' => ':attribute harus lebih dari :min karakter',
        'merek.required' => ':attribute tidak boleh kosong',
        'merek.min' => ':attribute harus lebih dari :min karakter',
        'warna.required' => ':attribute tidak boleh kosong',
        'warna.min' => ':attribute harus lebih dari :min karakter',
    ];

    protected $validationAttributes = [
        'namaBarang' => 'Nama Barang',
        'kategori' => 'Kategori',
        'serialNumber' => 'Serial Number',
        'qty' => 'Jumlah',
        'namaSupplier' => 'Nama Supplier',
        'namaPerusahaan' => 'Nama Perusahaan',
        'merek' => 'Merek',
        'warna' => 'Warna',        
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $listeners = [
        'toastify','fresh','swal',
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
            $cekNama = Supplier::where('nama_supplier', $id)->get();
            if ($cekNama->count() >= 1) {
                $supplier = $cekNama[0];
                $this->supplierId = $supplier->id;
                $this->namaSupplier = $supplier->nama_supplier;
                $this->namaPerusahaan = $supplier->nama_perusahaan;
                $this->alamatSupplier = $supplier->alamat;
                $this->noTlp = $supplier->no_tlp;
                $this->s_baru = false;
            } else {
                $this->clear('supp');
                $this->namaSupplier = $id;
                $this->s_baru = true;            
            }
        }
    }

    public function setKategori($value)
    {
        $this->kategori = $value;        
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
            $this->tanggalMasuk = date('Y-m-d');
        }
        $this->render();
    }

    public function kategoriCek($value)
    {
        $data = Kategori::find($value);
        if ($data) {
            $this->kategori = $data->id;
        } else {
            $create = Kategori::Create([
                'nama_kategori' => $value,
            ]);
            $this->kategori = $create->id;
            $this->emit('toastify',['success','Kategori Baru',3000]);
        }
    }

    public function cekSupplier($value)
    {
        $data = Supplier::find($value);

        if ($data) {
            $this->namaSupplier = $data->nama_supplier;
        } else {
            $create = Supplier::create([
                'nama_supplier' => $value,
                'nama_perusahaan' => $this->namaPerusahaan,
            ]);
            $this->supplierId = $create->id;
            $this->namaSupplier = $create->nama_supplier;
            $this->emit('toastify',['success','Supplier Baru',3000]);
        }
    }

    public function submit()
    {
        // dd($this->namaBarang);
        $this->validate();
        $this->kategoriCek($this->kategori);

        $barcode = Str::limit($this->namaBarang, 1, '') . date('Y') .'-'. Str::limit($this->merek, 1, '') . date('m') . date('d');

        $barang = Barang::create([
            'serial_number' => $this->serialNumber,
            'kode_barang' => $barcode,
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
                'kode_barang' => $barcode,
                'nama_barang' => $this->namaBarang,
                'merek' => $this->merek,
                'warna' => $this->warna,
                'satuan' => $this->satuan,
                'qty' => $this->qty,
                'kategori_id' => $this->kategori,
                'tanggal_masuk' => $this->tanggalMasuk,
                'supplier_id' => $supplier->id
            ]);
            $params = ['success', 'Terjadi Kesalahan', 2000];
        } else {
            $params = ['error', 'Terjadi Kesalahan', 2000];
        }
        
        $this->emit('swal', $params);
        $this->clear('all');
    }

    public function render()
    {
        if ($this->tanggalMasuk == null) {
            $this->tanggalMasuk = date('Y-m-d');
        }
        $suppliers = Supplier::orderByDesc('nama_supplier')->orderByDesc('created_at');
        return view('livewire.barang-masuk.barang-masuk-create', [
            'kategoris' => Kategori::orderByDesc('nama_kategori')->get(),
            'suppliers' => $suppliers->get(),
        ]);
    }    
}