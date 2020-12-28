<div>
    <form wire:submit.prevent="updateProses">
        <input  wire:model="barang_id" type="hidden" name="">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model="nama_barang" type="text" class="form-control" placeholder="Nama Barang"  name="nama_barang" id="nama_barang">
                </div>
                <div class="col">
                    <input wire:model="harga_beli" type="text" class="form-control" placeholder="Harga Beli" name="harga_beli" id="harga_beli">
                </div>
                <div class="col">
                    <input wire:model="harga_jual" type="text" class="form-control" placeholder="Harga Jual" name="harga_jual" id="harga_jual">
                </div>
                <div class="col">
                    <input wire:model="stok_barang" type="text" class="form-control" placeholder="Stok Barang" name="stok_barang" id="stok_barang">
                </div>
                <div class="col">
                    <button tyle="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
</div>
