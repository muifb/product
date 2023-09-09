<div class="main py-4">
    <div class="container">
        <div class="col"><?php Flasher::flash() ?></div>
        <div class="p-2 p-lg-3 bg-gray rounded-top ">
            <div class="row justify-content-between">
                <div class="col-8">
                    <h2 class="text-light">FORM INPUT VISMEN LIST ORDER</h2>
                </div>
                <div class="col-4 text-end">
                    <!-- <button type="button" class="btn btn-light tambah" data-bs-toggle="collapse" data-bs-target="#tambahVismen" aria-expanded="false" aria-controls="tambahVismen">Tambah</button> -->
                    <a href="/landing/vismen" type="button" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </div>
        <div class="p-2 p-lg-3 bg-light-gray rounded-bottom">
            <form action="/landing/store" class="accordion-body px-5 py-3" method="post">
                <div class="row mb-3">
                    <label for="idProduct" class="col-sm-2 col-form-label">Nomor Pro</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="id_product" id="idProduct" value="<?= $data['nopro']; ?>" required readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="materialProduct" class="col-sm-2 col-form-label">Material Product</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nm_product" id="materialProduct" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="panjangQty" class="col-sm-2 col-form-label">Panjang QTY</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" name="panjang_qty" id="panjangQty" required>
                    </div>
                    <label for="qtyPalet" class="col-sm-2 col-form-label">QTY(Palet)</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" name="qty_palet" id="qtyPalet" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mesin" class="col-sm-2 col-form-label">Mesin</label>
                    <div class="col-sm-2">
                        <select class="form-select" id="mesin" name="mesin" required>
                            <option value="" selected>Select Mesin...</option>
                            <option value="SLITTING 7">SLITTING 7</option>
                            <option value="SLITTING 10">SLITTING 10</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="material_numb" class="col-sm-2 col-form-label">Material Numb</label>
                    <div class="col-sm-3">
                        <input type="text" name="material_numb" id="material_numb" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="customer" class="col-sm-2 col-form-label">Customer Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="customer" id="customer" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Mulai</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="flatpickr-input" name="start_produksi" id="startProduksi" placeholder="Select Date Start..." required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Selesai</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="flatpickr-input " name="finish_produksi" id="finishProduksi" placeholder="Select Date Finish..." required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Pengiriman</label>
                    <div class="col-sm-3">
                        <input type="datetime-local" class="flatpickr-input" name="est_pengiriman" id="pengiriman" placeholder="Select Date Send..." required>
                    </div>
                </div>
                <div class="row mt-4">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>