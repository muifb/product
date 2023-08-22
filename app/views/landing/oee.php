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
        max-width: 70em !important;
        height: 85vh;
        padding-right: var(--bs-gutter-x, 9.5rem);
        padding-left: var(--bs-gutter-x, 9.5rem);
        margin-right: auto;
        margin-left: auto;
    }
</style>
<main class="main py-4">
    <div class="container-cari cari">
        <div class="p-2 p-lg-3 bg-gray rounded-top text-center">
            <h1 class="text-light">OEE</h1>
        </div>
        <div class="p-2 p-lg-3 bg-light-gray rounded-bottom">
            <form class="mx-4 p-3" id="formOee">
                <div class="row mb-3">
                    <label for="plant" class="col-sm-3 col-form-label fw-bolder">PLANT</label>
                    <div class="col-sm-2">
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

    <div class="container-oee my-3">
        <div class="p-2 p-lg-3 bg-gray rounded-top text-center">
            <h1 class="text-light">OEE</h1>
        </div>
        <div class="p-2 p-lg-4 bg-light-gray rounded-bottom">
            <div class="row justify-content-center">
                <div class="col col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col">Shift 1</th>
                                        <th scope="col">Shift 2</th>
                                        <th scope="col">Shift 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Planned Operating Time</th>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Planned Shut Down</th>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Unplanned Shut Down</th>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Operating Time</th>
                                        <td>3.5%</td>
                                        <td>3.5%</td>
                                        <td>3.5%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Ok</th>
                                        <td>20 BOB</td>
                                        <td>20 BOB</td>
                                        <td>20 BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product NC</th>
                                        <td>7 BOB</td>
                                        <td>7 BOB</td>
                                        <td>7 BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Reject</th>
                                        <td>1 BOB</td>
                                        <td>1 BOB</td>
                                        <td>1 BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total Product</th>
                                        <td>87%</td>
                                        <td>87%</td>
                                        <td>87%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <h4 class="card-title col-lg-6">Performance</h4>
                                <div class="col-lg-6">
                                    <span class="badge rounded-pill bg-danger px-3">100 %</span>
                                    <span class="badge rounded-pill bg-warning text-dark px-3">100 %</span>
                                    <span class="badge rounded-pill bg-success px-3">100 %</span>
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="card-title col-lg-6">Quality</h4>
                                <div class="col-lg-6">
                                    <span class="badge rounded-pill bg-danger px-3">100 %</span>
                                    <span class="badge rounded-pill bg-warning text-dark px-3">100 %</span>
                                    <span class="badge rounded-pill bg-success px-3">100 %</span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <h4 class="card-title col-lg-6">OEE</h4>
                                <div class="col-lg-6">
                                    <span class="badge rounded-pill bg-danger px-3">100 %</span>
                                    <span class="badge rounded-pill bg-warning text-dark px-3">100 %</span>
                                    <span class="badge rounded-pill bg-success px-3">100 %</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                    <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                                </svg>
                                OEE
                            </h4>
                            <hr>
                            <span class="fs-6 text-muted">Shift 1</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 39.3%" aria-valuenow="39.3" aria-valuemin="0" aria-valuemax="100">39.3%</div>
                            </div>
                            <span class="fs-6 text-muted">Shift 2</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 49.1%" aria-valuenow="49.1" aria-valuemin="0" aria-valuemax="100">49.1%</div>
                            </div>
                            <span class="fs-6 text-muted">Shift 3</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 11.6%" aria-valuenow="11.6" aria-valuemin="0" aria-valuemax="100">11.6%</div>
                            </div>
                            <span class="fs-6 text-muted">All Shift</span>
                            <div class="progress mb-1" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                            <!-- Pie Chart -->
                            <div class="mt-4" id="availibility"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(".container-oee").hide();
    $("#formOee").submit((e) => {
        e.preventDefault();
        let formdata = new FormData(e.target);
        let data = {};
        [...formdata.keys()].forEach((key) => {
            let values = formdata.getAll(key);
            data[key] = values.length > 1 ? values : values.join();
        });
        $.ajax({
            url: "/landing/search",
            type: "POST",
            data: data,
            success: (res) => {
                // console.log(res);
                $(".cari").hide();
                $(".container-oee").show();

                // $(() => {
                new ApexCharts(document.querySelector("#availibility"), {
                    series: [39.3, 49.1, 11.6],
                    chart: {
                        height: 220,
                        type: 'pie',
                        // toolbar: {
                        //     show: true
                        // }
                    },
                    labels: ['Shift 1', 'Shift 2', 'Shift 3']
                }).render()
                // })

            }
        })
    });
</script>