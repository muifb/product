<!-- Page content-->
<style>
    .rounded-top {
        border-top-left-radius: 0.75rem !important;
        border-top-right-radius: 0.75rem !important;
    }

    .rounded-bottom {
        border-bottom-right-radius: 0.50rem !important;
        border-bottom-left-radius: 0.50rem !important;
    }
</style>
<main class="main p-4 mx-4">
    <div class="container mb-5">
        <div class="p-2 p-lg-3 bg-gray rounded-top text-center">
            <h1 class="text-light">OEE</h1>
        </div>
        <div class="p-2 p-lg-3 bg-light-gray rounded-bottom">
            <form action="/produksi/hasil-oee" id="formOee" method="post">
                <div class="row mb-3">
                    <label for="plant" class="col-sm-3 col-form-label fw-bolder text-end">PLANT</label>
                    <div class="col-sm-2">
                        <select class="form-select" id="plant" name="plant" required>
                            <option value="2500">2500</option>
                            <option value="2400">2400</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bolder text-end">TANGGAL AWAL</label>
                    <div class="col-md-4">
                        <input type="datetime-local" class="flatpickr-input" name="start_produksi" id="tglAwal" placeholder="Select Date..." required>
                        <label class="col-form-label ms-5 fw-bolder">SAMPAI</label>
                        <input type="datetime-local" class="flatpickr-input" name="finish_produksi" id="tglSampai" placeholder="Select Date..." required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mesin" class="col-sm-3 col-form-label fw-bolder text-end">MESIN</label>
                    <div class="col-sm-3">
                        <select class="form-select" id="mesin" name="mesin" required>
                            <option value="" selected>Pilih Mesin...</option>
                            <option value="SLITTING 7">SLITTING 7</option>
                            <option value="SLITTING 10">SLITTING 10</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_product" class="col-sm-3 col-form-label fw-bolder text-end">PRO</label>
                    <div class="col-sm-4">
                        <select class="form-select" id="id_product" name="id_product" required>
                            <?php foreach ($data['product'] as $pro) : ?>
                                <?php if ($_SESSION['login']['id_pro'] == $pro['id_product']) : ?>
                                    <option value="<?= $pro['id_product']; ?>" selected><?= $pro['id_product']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $pro['id_product']; ?>"><?= $pro['id_product']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>