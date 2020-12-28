<div>
   
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <h4>Input Data Barang</h4>
                    @if($updateMasterDataBarang)
                    <livewire:update-master-data-barang></livewire:update-master-data-barang>
                    @else
                    <livewire:create-master-data-produk></livewire:create-master-data-produk>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col">
                            <select wire:model="sorting" name="" id="" class="form-control form-control w-auto">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col">
                            <input wire:model="search" type="text" placeholder="search" class="form-control">
                        </div>
                    </div>
                        
                        <br>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Kode_Barang</th>
                                    <th>Nama_barang</th>
                                    <th>Harga_Beli</th>
                                    <th>Harga_Jual</th>
                                    <th>Stok_Barang</th>
                                    <th>Created_At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($master_data_barang as $data)
                                <tr>
                                    <td>{{$data->kode_barang}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>Rp.{{number_format($data->harga_beli,2) }}</td>
                                    <td>Rp.{{number_format($data->harga_jual,2) }}</td>
                                    <td>{{$data->stok_barang}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                        <button wire:click="setMasterDataBarang({{$data->id}})" class="btn btn-info btn-sm">Edit</button>
                                        <button wire:click="destroy({{$data->id}})" class="btn btn-danger btn-sm">Hapus </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $master_data_barang->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
