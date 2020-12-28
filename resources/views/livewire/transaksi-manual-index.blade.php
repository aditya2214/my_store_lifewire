<div>
<br>
<div class="container-fluid">
    <livewire:transaksi-manual></livewire:transaksi-manual>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Keranjang Belanja</h4>
                    <table class="table table-bordered">
                        <thead  >
                            <tr>
                                <th>Kode_Barang</th>
                                <th>Nama_Barang</th>
                                <th>Harga_Barang</th>
                                <th>Jumlah_Beli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keranjang_belanja as $keranjang)
                            <tr>
                                <td>{{$keranjang->relationTransaksi->kode_barang}}</td>
                                <td>{{$keranjang->relationTransaksi->nama_barang}}</td>
                                <td>Rp.{{number_format($keranjang->relationTransaksi->harga_jual) }}</td>
                                <td>
                                    <input wire:model="jumbel" placeholder="{{$keranjang->jumbel}}" type="number" class="form-control w-auto">
                                </td>
                                <td>
                                    <button wire:click="fix({{$keranjang->id}})" class="btn btn-warning btn-sm">Checkout</button>
                                    <button wire:click="destroy({{$keranjang->id}})" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Belanjaan</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode_Barang</th>
                                <th>Nama_Barang</th>
                                <th>Harga_Barang</th>
                                <th>Jumbel</th>
                                <th>Total_Belanja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keranjang_belanja_s2 as $keranjang)
                            <tr>
                                <td>{{$keranjang->relationTransaksi->kode_barang}}</td>
                                <td>{{$keranjang->relationTransaksi->nama_barang}}</td>
                                <td>Rp.{{number_format($keranjang->relationTransaksi->harga_jual)}}</td>
                                <td>{{$keranjang->jumbel}}</td>
                                <td>Rp.{{number_format($keranjang->total) }}</td>
                                <td>
                                <button wire:click="end({{$keranjang->id}})" class="btn btn-success btn-sm">Beli</button>
                                <button wire:click="destroy({{$keranjang->id}})" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">Total</td>
                                <td colspan="2">Rp.{{number_format($total_belanja_keseluruhan) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
