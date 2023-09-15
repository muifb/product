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
                    <a href="<?php echo BASEURL; ?>/../vismen/list" type="button" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </div>
        <div class="p-2 p-lg-3 bg-light-gray rounded-bottom">
            <form action="/vismen/tambah" class="accordion-body px-5 py-2" method="post">
                <div class="col-lg-8">
                    <div class="row mb-2">
                        <label for="idProduct" class="col-sm-3 col-form-label text-end">Nomor Pro</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="id_product" id="idProduct" value="<?= $data['nopro']; ?>" required readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="materialProduct" class="col-sm-3 col-form-label text-end">Material Product</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nm_product" id="materialProduct" required>
                            <!-- 1075 , 1050 , 1130 , 1145 -->
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="ukuranProduct" class="col-sm-3 col-form-label text-end">Ukuran Product</label>
                        <div class="col-sm-3">
                            <select class="form-select" id="ukuranProduct" name="ukuran" required>
                                <option value="" selected>Ukuran...</option>
                                <option value="1075">1075</option>
                                <option value="1050">1050</option>
                                <option value="1130">1130</option>
                                <option value="1145">1145</option>
                            </select>
                            <!-- 1075 , 1050 , 1130 , 1145 -->
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="qtyPalet" class="col-sm-3 col-form-label text-end">QTY(Palet)</label>
                        <!-- 76 , 58 , 62 , 54 , 152 ,160 , 80 ,87 -->
                        <div class="col-sm-3">
                            <select class="form-select" id="qtyPalet" name="qty_palet" required>
                                <option value="" selected>Qty(Palet)</option>
                                <option value="76">76</option>
                                <option value="58">58</option>
                                <option value="62">62</option>
                                <option value="54">54</option>
                                <option value="152">152</option>
                                <option value="160">160</option>
                                <option value="80">80</option>
                                <option value="87">87</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="panjangQty" class="col-sm-3 col-form-label text-end">Panjang QTY</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="panjang_qty" id="panjangQty" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="mesin" class="col-sm-3 col-form-label text-end">Mesin</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="mesin" name="mesin" required>
                                <option value="" selected>Select Mesin...</option>
                                <option value="SLITTING 7">SLITTING 7</option>
                                <option value="SLITTING 10">SLITTING 10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="material_numb" class="col-sm-3 col-form-label text-end">Material Numb</label>
                        <div class="col-sm-6">
                            <input type="text" name="material_numb" id="material_numb" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="customer" class="col-sm-3 col-form-label text-end">Customer Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="customer" id="customer" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Mulai</label>
                        <div class="col-sm-5">
                            <input type="datetime-local" class="flatpickr-input" name="start_produksi" id="startProduksi" placeholder="Select Date Start..." required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Selesai</label>
                        <div class="col-sm-5">
                            <input type="datetime-local" class="flatpickr-input " name="finish_produksi" id="finishProduksi" placeholder="Select Date Finish..." required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 col-form-label text-end">Pengiriman</label>
                        <div class="col-sm-4">
                            <input type="datetime-local" class="flatpickr-input" name="est_pengiriman" id="pengiriman" placeholder="Select Date Send..." required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <label class="col-sm-3 col-form-label">&nbsp;</label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>