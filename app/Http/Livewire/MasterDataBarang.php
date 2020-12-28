<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MasterDataBarang extends Component
{
    public $nama_barang;
    public $harga_beli;
    public $harga_jual;
    public $stok_barang;

    public $sorting = 10;
    public $search;

    public $updateMasterDataBarang = false; 

    protected $listeners = [
        'MasterDataBarangStored' => 'handleGet',
        'getUpdatedMasterDataBarang' =>'handleGetUpdated'
    ];

    public function render()
    {
        return view('livewire.master-data-barang',[
            'master_data_barang' => \App\MasterDataBarang::where('nama_barang','like','%'.$this->search.'%')->orWhere('kode_barang','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate($this->sorting)
        ]);
    }

    public function handleGet($created){

    }

    public function handleGetUpdated($updated){

    }

    public function setMasterDataBarang($id){
        $this->updateMasterDataBarang = true;

        $updated = \App\MasterDataBarang::find($id);

        $this->emit('updatedMasterdataBarang',$updated);
    }

    public function destroy($id){
        \App\MasterDataBarang::where('id',$id)->delete();
    }
}
