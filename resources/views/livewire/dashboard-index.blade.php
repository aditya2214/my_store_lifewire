<div>
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <h4>History Transaction</h4>
                    <input wire:model="search" type="text" placeholder="search">
                    <br><br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode_Barang</th>
                            <th>Jumlah_BeliBarang</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($history_transaction as $ht)
                        <tr>
                            <td>{{$ht->kode_barang}}</td>
                            <td>{{$ht->jumbel}}</td>
                            <td>Rp{{number_format($ht->total,2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $history_transaction->links() }}
            </div>
        </div>
    </div>
</div>
