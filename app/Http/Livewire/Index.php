<?php

namespace App\Http\Livewire\MasterDataBarang;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $master_data_barang = \App\MasterDataBarang::all();
        return view('livewire.master_data_barang.index',compact('master_data_barang'));
    }
}
