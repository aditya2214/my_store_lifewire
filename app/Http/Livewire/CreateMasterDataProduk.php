<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateMasterDataProduk extends Component
{
    public $nama_barang;
    public $harga_beli;
    public $harga_jual;
    public $stok_barang;

    public function render()
    {
        return view('livewire.create-master-data-produk');
    }


    public function store(){
        $tahun = date('y');
        $bulan = date('m');
        $data = \App\MasterDataBarang::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->count();

        $invID = str_pad(  $data + 1, 5, "0", STR_PAD_LEFT );
        $kode = $tahun.$bulan . $invID ;

        $created = \App\MasterDataBarang::create([
            'kode_barang' => $kode,
            'nama_barang'=>$this->nama_barang,
            'harga_beli' => $this->harga_beli,
            'harga_jual'=>$this->harga_jual,
            'stok_barang'=>$this->stok_barang,
            'laba_l'=>$this->stok_barang * ($this->harga_jual - $this->harga_beli)

        ]);

        $this->resetInput();

        $this->emit('MasterDataBarangStored',$created);
    }

    public function resetInput(){
        $this->nama_barang = null;
        $this->harga_beli = null;
        $this->harga_jual = null;
        $this->stok_barang = null;
    }
}
