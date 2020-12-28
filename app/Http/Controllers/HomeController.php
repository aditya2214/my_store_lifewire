<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('sb_admin.content.dashboard');
    }

    public function test(){
        $tahun = date('y');
        $bulan = date('m');
        $data = \App\MasterDataBarang::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->count();

        $invID = str_pad(  $data + 1, 5, "0", STR_PAD_LEFT );
        $kode_barang = $tahun.$bulan . $invID ;

        return $kode_barang;
    }
}
