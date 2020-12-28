<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateMasterDataBarang extends Component
{
    public $nama_barang;
    public $harga_beli;
    public $harga_jual;
    public $stok_barang;
    public $barang_id;

    protected $listeners = [
        'updatedMasterdataBarang' => 'showProses'
    ];

    public function render()
    {
        return view('livewire.update-master-data-barang');
    }

    public function showProses($updated){
        $this->nama_barang = $updated['nama_barang'];
        $this->harga_beli = $updated['harga_beli'];
        $this->harga_jual = $updated['harga_jual'];
        $this->stok_barang = $updated['stok_barang'];
        $this->barang_id = $updated['id'];
    }

    public function updateProses(){
        

        if ($this->barang_id){
            $updated = \App\MasterDataBarang::find($this->barang_id);
            $updated->update([
                'nama_barang'=>$this->nama_barang,
                'harga_beli'=>$this->harga_beli,
                'harga_jual'=>$this->harga_jual,
                'stok_barang'=>$this->stok_barang
            ]);

            $this->resetInput();

            $this->emit('getUpdatedMasterDataBarang',$updated);
        }
    }

    public function resetInput(){
        $this->nama_barang = null;
        $this->harga_beli = null;
        $this->harga_jual = null;
        $this->stok_barang = null;
    }
}
