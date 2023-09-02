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
            <form action="/landing/search" class="mx-4 p-3" id="formOee" method="post">
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

    <div class="row">
        <?php
        $total_semua = $data['grafik']['total_semua'];
        $total_shift1 = $data['grafik']['total_shift1'];
        $total_shift2 = $data['grafik']['total_shift2'];
        $total_shift3 = $data['grafik']['total_shift3'];
        $shift1_ok = $data['grafik']['shift1_ok'];
        $shift1_nc = $data['grafik']['shift1_nc'];
        $shift1_reject = $data['grafik']['shift1_reject'];
        $shift2_ok = $data['grafik']['shift2_ok'];
        $shift2_nc = $data['grafik']['shift2_nc'];
        $shift2_reject = $data['grafik']['shift2_reject'];
        $shift3_ok = $data['grafik']['shift3_ok'];
        $shift3_nc = $data['grafik']['shift3_nc'];
        $shift3_reject = $data['grafik']['shift3_reject'];

        $planned1 = ($data['grafik']['lost1'] != 0) ? 420 / $data['grafik']['lost1'] : 0;
        $planned2 = ($data['grafik']['lost2'] != 0) ? 420 / $data['grafik']['lost2'] : 0;
        $planned3 = ($data['grafik']['lost3'] != 0) ? 420 / $data['grafik']['lost3'] : 0;

        $time1 =  $total_shift1 != 0 ? '420' - $data['grafik']['lost1'] : 0;
        $time2 =  $total_shift2 != 0 ? '420' - $data['grafik']['lost2'] : 0;
        $time3 =  $total_shift3 != 0 ? '420' - $data['grafik']['lost3'] : 0;

        $operatingTime1 = $total_shift1 != 0 ? $time1 / 60 : 0;
        $operatingTime2 = $total_shift2 != 0 ? $time2 / 60 : 0;
        $operatingTime3 = $total_shift3 != 0 ? $time3 / 60 : 0;

        $availability1 = $total_shift1 != 0 ? $time1 / 420 * 100 : 0;
        $availability2 = $total_shift2 != 0 ? $time2 / 420 * 100 : 0;
        $availability3 = $total_shift3 != 0 ? $time3 / 420 * 100 : 0;

        $performance1 = $total_shift1 != 0 ? ($total_shift1 / $time1) * 100 : 0;
        $performance2 = $total_shift2 != 0 ? ($total_shift2 / $time2) * 100 : 0;
        $performance3 = $total_shift3 != 0 ? ($total_shift3 / $time3) * 100 : 0;

        $quality1 = $total_shift1 != 0 ? ($shift1_ok / $total_shift1) * 100 : 0;
        $quality2 = $total_shift2 != 0 ? ($shift2_ok / $total_shift2) * 100 : 0;
        $quality3 = $total_shift3 != 0 ? ($shift3_ok / $total_shift3) * 100 : 0;

        // $oee1 = $total_shift1 != 0 ? (($availability1 / 100) * ($performance1 / 100) * ($quality1 / 100)) * 100 : 0;
        // $oee2 = $total_shift2 != 0 ? (($availability2 / 100) * ($performance2 / 100) * ($quality2 / 100)) * 100 : 0;
        // $oee3 = $total_shift3 != 0 ? (($availability3 / 100) * ($performance3 / 100) * ($quality3 / 100)) * 100 : 0;
        ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                        </svg>
                        AVAILIBILITY
                    </h4>
                    <hr>
                    <span class="fs-6 text-muted">Shift 1</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= round($availability1, 1); ?>%" aria-valuenow="<?= round($availability1, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($availability1, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 2</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= round($availability2, 1); ?>%" aria-valuenow="<?= round($availability2, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($availability2, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 3</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?= round($availability3, 1); ?>%" aria-valuenow="<?= round($availability3, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($availability3, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">All Shift</span>
                    <?php

                    $availability = [round($availability1), round($availability2), round($availability3)];
                    $allAvai = [];
                    foreach ($availability as $key => $avai) {
                        if ($avai != 0) {
                            $allAvai[] = $avai;
                        }
                    }
                    $sumAvai = array_sum($allAvai);
                    $countAvai = count($allAvai);
                    $allAvai = $sumAvai != 0 ? $sumAvai / $countAvai : 0;
                    $pieChartAvai = json_encode($availability, true);
                    ?>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= round($allAvai, 1); ?>%" aria-valuenow="<?= round($allAvai, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($allAvai, 1); ?>%</div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="mt-3" id="availibility"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#availibility"), {
                                series: <?= $pieChartAvai; ?>,
                                chart: {
                                    height: 380,
                                    type: 'pie',
                                    // toolbar: {
                                    //     show: true
                                    // }
                                },
                                labels: ['Shift 1', 'Shift 2', 'Shift 3']
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                        </svg>
                        PERFORMANCE
                    </h4>
                    <hr>
                    <span class="fs-6 text-muted">Shift 1</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= round($performance1, 1); ?>%" aria-valuenow="<?= round($performance1, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($performance1, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 2</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= round($performance2, 1); ?>%" aria-valuenow="<?= round($performance2, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($performance2, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 3</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?= round($performance3, 1); ?>%" aria-valuenow="<?= round($performance3, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($performance3, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">All Shift</span>
                    <?php

                    $performance = [round($performance1), round($performance2), round($performance3)];
                    $allPerforma = [];
                    foreach ($performance as $key => $performa) {
                        if ($performa != 0) {
                            $allPerforma[] = $performa;
                        }
                    }
                    $sumPerforma = array_sum($allPerforma);
                    $countPerforma = count($allPerforma);
                    $allPerforma = $sumPerforma != 0 ? $sumPerforma / $countPerforma : 0;
                    $pieChartPerforma = json_encode($performance, true);
                    ?>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= round($allPerforma, 1); ?>%" aria-valuenow="<?= round($allPerforma, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($allPerforma, 1); ?>%</div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="mt-3" id="performance"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#performance"), {
                                series: <?= $pieChartPerforma; ?>,
                                chart: {
                                    height: 380,
                                    type: 'pie',
                                    // toolbar: {
                                    //     show: true
                                    // }
                                },
                                labels: ['Shift 1', 'Shift 2', 'Shift 3']
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                        </svg>
                        QUALITY
                    </h4>
                    <hr>
                    <span class="fs-6 text-muted">Shift 1</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= round($quality1, 1); ?>%" aria-valuenow="<?= round($quality1, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($quality1, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 2</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= round($quality2, 1); ?>%" aria-valuenow="<?= round($quality2, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($quality2, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">Shift 3</span>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?= round($quality3, 1); ?>%" aria-valuenow="<?= round($quality3, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($quality3, 1); ?>%</div>
                    </div>
                    <span class="fs-6 text-muted">All Shift</span>
                    <?php

                    $quality = [round($quality1), round($quality2), round($quality3)];
                    $allQuality = [];
                    foreach ($quality as $key => $qty) {
                        if ($qty != 0) {
                            $allQuality[] = $qty;
                        }
                    }
                    $sumQuality = array_sum($allQuality);
                    $countQuality = count($allQuality);
                    $allQuality = $sumQuality != 0 ? $sumQuality / $countQuality : 0;
                    $pieChartQuality = json_encode($quality, true);
                    ?>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= round($allQuality, 1); ?>%" aria-valuenow="<?= round($allQuality, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($allQuality, 1); ?>%</div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="mt-3" id="quality"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#quality"), {
                                series: <?= $pieChartQuality; ?>,
                                chart: {
                                    height: 380,
                                    type: 'pie',
                                    // toolbar: {
                                    //     show: true
                                    // }
                                },
                                labels: ['Shift 1', 'Shift 2', 'Shift 3']
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
    </div>
</main>