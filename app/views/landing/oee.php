<!-- Page content-->
<style>
    table {
        border: 2px solid black;
        border-collapse: collapse;
    }

    .rounded-top {
        border-top-left-radius: 0.75rem !important;
        border-top-right-radius: 0.75rem !important;
    }

    .rounded-bottom {
        border-bottom-right-radius: 0.50rem !important;
        border-bottom-left-radius: 0.50rem !important;
    }

    .container-oee {
        width: 100%;
        padding-right: var(--bs-gutter-x, .25rem);
        padding-left: var(--bs-gutter-x, .25rem);
        margin-right: auto;
        margin-left: auto;
    }

    .container-cari {
        width: 100%;
        max-width: 100em !important;
        height: 75vh;
        padding-right: var(--bs-gutter-x, 9.5rem);
        padding-left: var(--bs-gutter-x, 9.5rem);
        margin-right: auto;
        margin-left: auto;
    }
</style>
<main class="main py-4">
    <div class="container-cari mb-5 cari">
        <div class="p-2 p-lg-3 bg-gray rounded-top text-center">
            <h1 class="text-light">OEE</h1>
        </div>
        <div class="p-2 p-lg-3 bg-light-gray rounded-bottom">
            <form action="/oee/search" class="mx-4 p-3" id="formOee" method="post">
                <div class="row mb-3">
                    <label for="plant" class="col-sm-3 col-form-label fw-bolder">PLANT</label>
                    <div class="col-sm-3">
                        <select class="form-select" id="plant" name="plant" required>
                            <option value="2500">2500</option>
                            <option value="2400">2400</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bolder">TANGGAL AWAL</label>
                    <div class="col-md-4">
                        <input type="datetime-local" class="flatpickr-input" name="start_produksi" id="tglAwal" placeholder="Select Date..." required>
                        <label class="col-form-label ms-5 fw-bolder">SAMPAI</label>
                        <input type="datetime-local" class="flatpickr-input" name="finish_produksi" id="tglSampai" placeholder="Select Date..." required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mesin" class="col-sm-3 col-form-label fw-bolder">MESIN</label>
                    <div class="col-sm-3">
                        <select class="form-select" id="mesin" name="mesin" required>
                            <option value="" selected>Pilih Mesin...</option>
                            <option value="SLITTING 7">SLITTING 7</option>
                            <option value="SLITTING 10">SLITTING 10</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_product" class="col-sm-3 col-form-label fw-bolder">PRO</label>
                    <div class="col-sm-3">
                        <select class="form-select" id="id_product" name="id_product" required>
                            <option value="" selected>Pilih Pro...</option>
                            <?php foreach ($data['product'] as $pro) : ?>
                                <option value="<?= $pro['id_product']; ?>"><?= $pro['id_product']; ?></option>
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