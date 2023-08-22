<style>
    .add-vismen {
        max-width: 70em !important;
    }
</style>
<div class="main py-4">
    <div class="container add-vismen">
        <div class="col"><?php Flasher::flash() ?></div>
        <div class="p-2 p-lg-3 bg-gray rounded-top ">
            <div class="row justify-content-between accordion-header" id="headingThree">
                <div class="col-8">
                    <h2 class="text-light">FORM INPUT VISMEN LIST ORDER</h2>
                </div>
                <div class="col-4 text-end">
                    <button type="button" class="btn btn-light tambah" data-bs-toggle="collapse" data-bs-target="#tambahVismen" aria-expanded="false" aria-controls="tambahVismen">Tambah</button>
                </div>
            </div>
        </div>
        <div class="p-2 p-lg-3 bg-light-gray rounded-bottom accordion-collapse collapse" id="tambahVismen" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <form action="/landing/store" class="accordion-body px-5 py-3" method="post">
                <div class="row mb-3">
                    <label for="materialProduct" class="col-sm-2 col-form-label">Material Product</label>
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" name="id_product" id="idPro">
                        <input type="hidden" class="form-control" name="nm_product" id="nmPro">
                        <select class="form-select" id="materialProduct" required>
                            <option value="" selected>Select Material Product...</option>
                            <?php foreach ($data['product'] as $pro) : ?>
                                <option value="<?= $pro['id_product']; ?>"><?= $pro['nm_product']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nomorPro" class="col-sm-2 col-form-label">Nomor Pro</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="id_product" id="nomorPro" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="panjangQty" class="col-sm-2 col-form-label">Panjang QTY</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" name="panjang_qty" id="panjangQty" required>
                    </div>
                </div>
                <div class="row mb-3">
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
    <div class="card my-3">
        <div class="card-body">
            <h2 class="card-title">Vismen List Order</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Material</th>
                        <th scope="col">Pro</th>
                        <th scope="col">Panjang QTY</th>
                        <th scope="col">QTY(Palet)</th>
                        <th scope="col">Start</th>
                        <th scope="col">Finish</th>
                        <th scope="col">Pengiriman</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $nomor = 1;
                    // $date = $data['product'];
                    // $time = new DateTime($date['mulai_pro']);
                    foreach ($data['vismen'] as $vs) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $vs['nm_product']; ?></td>
                            <td><?= $vs['id_product']; ?></td>
                            <td><?= $vs['panjang_qty']; ?></td>
                            <td><?= $vs['qty_palet']; ?></td>
                            <td><?= tgl_indo($vs['start_produksi'], true); ?></td>
                            <td><?= tgl_indo($vs['finish_produksi'], true); ?></td>
                            <td><?= tgl_indo($vs['est_pengiriman']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const btn = document.querySelector('.tambah');

    btn.addEventListener('click', function() {
        if (btn.innerHTML === "Tambah") {
            btn.innerHTML = "Batal";
        } else {
            btn.innerHTML = "Tambah";
        }
    })
</script>