<div>
    <form wire:submit.prevent="scan_store_kode_barang">
        <div class="form-row">
            <div class="col">
                <input wire:model="scan_kode_barang" type="text" class="form-control" placeholder="masukan kode barang">
            </div>
            <div class="col">
                <button  type="submit" class="btn btn-primary">scan manual</button>
            </div>
        </div>
    </form>
</div>
