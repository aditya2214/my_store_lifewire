<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeranjangBelanja extends Model
{
    protected $table = "tb_keranjang_belanja";
    protected $guarded = [];

    public function relationTransaksi(){
        return $this->belongsTo(\App\MasterDataBarang::class, 'id_barang', 'id');
    }

}
