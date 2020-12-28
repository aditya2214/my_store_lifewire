<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class DashboardIndex extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.dashboard-index',[
            'result_transaction' => DB::table('tb_keranjang_belanja')->where('status',3)->sum('total'),
            'modal_awal' => DB::table('tb_master_data_barang')->sum('harga_beli') * DB::table('tb_master_data_barang')->sum('stok_barang'),
            'history_transaction' => DB::table('tb_master_data_barang')
            ->join('tb_keranjang_belanja', 'tb_master_data_barang.id', '=', 'tb_keranjang_belanja.id_barang')
            ->select('tb_master_data_barang.kode_barang','tb_keranjang_belanja.jumbel','tb_keranjang_belanja.total')
            ->where('tb_master_data_barang.kode_barang','like','%'.$this->search.'%')
            ->paginate(5)
        ]);
    }
}
