<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TransaksiManual extends Component
{
    public $scan_kode_barang;

    public function render()
    {
        return view('livewire.transaksi-manual');
    }

    public function scan_store_kode_barang(){
        $data = \App\MasterDataBarang::where('kode_barang',$this->scan_kode_barang)->first();
        $id_barang = $data->id;
        $kode_barang = $data->kode_barang;
        $nama_barang = $data->nama_barang;
        $harga_barang = $data->harga_jual;

        $created = \App\KeranjangBelanja::create([
            'id_barang' => $id_barang,
            'jumbel' => 1,
            'total' => $harga_barang * 1,
            'status'=>1
        ]);

        $this->resetInput();

        $this->emit('storedKeranjangBelanja',$created);

    }

    public function resetInput(){
        $this->scan_kode_barang = null ;
    }
}
