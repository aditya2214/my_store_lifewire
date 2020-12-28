<?php

namespace App\Http\Livewire;

use DB;
use Livewire\Component;

class TransaksiManualIndex extends Component
{
    public $jumbel;

    protected $listeners = [
        'storedKeranjangBelanja'=>'storedGet'
    ];

    public function render()
    {
        return view('livewire.transaksi-manual-index',[
            'total_belanja_keseluruhan1'=> DB::table('tb_keranjang_belanja')->select('total')->where('status', '=', 1)->sum('total'),
            'total_belanja_keseluruhan'=> DB::table('tb_keranjang_belanja')->select('total')->where('status', '=', 2)->sum('total'),
            'keranjang_belanja'=> \App\KeranjangBelanja::where('status',1)->orderBy('created_at','DESC')->get(),
            'keranjang_belanja_s2'=> \App\KeranjangBelanja::where('status',2)->orderBy('created_at','DESC')->get()
        ]);
    }

    public function storedGet(){

    }

    public function destroy($id){
        \App\KeranjangBelanja::where('id',$id)->delete();
    }

    public function fix($id){
        $joinMasterKeranjang = DB::table('tb_master_data_barang')
            ->join('tb_keranjang_belanja', 'tb_master_data_barang.id', '=', 'tb_keranjang_belanja.id_barang')
            ->select('tb_master_data_barang.harga_jual','tb_master_data_barang.stok_barang','tb_keranjang_belanja.jumbel','tb_keranjang_belanja.id')
            ->where('tb_keranjang_belanja.id',$id)
            ->first();


            // dd($joinMasterKeranjang);

        $updated = \App\KeranjangBelanja::find($id);

        if($this->jumbel == null){
            $jumbelk = 1;
        }else{
            $jumbelk =  $this->jumbel;
        }

        if($this->jumbel == null){
            $kalkulasi = $joinMasterKeranjang->harga_jual * 1;
        }else{
            $kalkulasi = $joinMasterKeranjang->harga_jual * $this->jumbel;
        }
        // dd($updated);
        $updated->update([
            'total' => $kalkulasi,
            'jumbel' => $jumbelk,
            'status'=>2
        ]);
        
    }

    public function end($id){
        $joinMasterKeranjang = DB::table('tb_master_data_barang')
        ->join('tb_keranjang_belanja', 'tb_master_data_barang.id', '=', 'tb_keranjang_belanja.id_barang')
        ->select('tb_master_data_barang.harga_beli','tb_master_data_barang.harga_jual','tb_master_data_barang.stok_barang','tb_keranjang_belanja.jumbel','tb_keranjang_belanja.id','tb_keranjang_belanja.id_barang')
        ->where('tb_keranjang_belanja.id',$id)
        ->first();


        $id_b = $joinMasterKeranjang->id_barang;
        $stock = $joinMasterKeranjang->stok_barang;
        $beli = $joinMasterKeranjang->harga_beli;
        $jual = $joinMasterKeranjang->harga_jual;

        $jumbel = DB::table('tb_keranjang_belanja')
        ->select('tb_keranjang_belanja.jumbel','tb_keranjang_belanja.id_barang')
        ->where('tb_keranjang_belanja.id_barang',$id_b)
        ->sum('tb_keranjang_belanja.jumbel');
        // dd($jumbel);


        $updated = \App\KeranjangBelanja::find($id);
        // dd($updated);
        $updated->update([
            'status'=>3
        ]);

        if ($this->jumbel == null) {
            $stok_bar = $stock - 1;
        }else{
            $stok_bar = $stock - $this->jumbel;
        }

        $updatedbarang = \App\MasterDataBarang::find($id_b);
        $updatedbarang->update([
            'stok_barang'=> $stok_bar,
            'laba_l'=>$jumbel * ($jual-$beli),
        ]);
    }
}
