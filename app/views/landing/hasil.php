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

    .print {
        display: none;
    }

    @media print {
        .no-print {
            display: none;
        }

        ul.a {
            list-style-type: circle;
        }

        .print {
            display: block;
        }

        .btn {
            display: none;
        }

        .halaman {
            break-after: page;
        }

        .card {
            border: none;
        }

        .apexcharts-legend-series {
            display: none;
        }
    }
</style>
<main class="main py-3">
    <?php
    $total_semua = $data['search']['total_semua'];
    $total_shift1 = $data['search']['total_shift1'];
    $total_shift2 = $data['search']['total_shift2'];
    $total_shift3 = $data['search']['total_shift3'];
    $shift1_ok = $data['search']['shift1_ok'];
    $shift1_nc = $data['search']['shift1_nc'];
    $shift1_reject = $data['search']['shift1_reject'];
    $shift2_ok = $data['search']['shift2_ok'];
    $shift2_nc = $data['search']['shift2_nc'];
    $shift2_reject = $data['search']['shift2_reject'];
    $shift3_ok = $data['search']['shift3_ok'];
    $shift3_nc = $data['search']['shift3_nc'];
    $shift3_reject = $data['search']['shift3_reject'];

    $planned1 = ($data['search']['lost1'] != 0) ? 420 / $data['search']['lost1'] : 0;
    $planned2 = ($data['search']['lost2'] != 0) ? 420 / $data['search']['lost2'] : 0;
    $planned3 = ($data['search']['lost3'] != 0) ? 420 / $data['search']['lost3'] : 0;

    $time1 =  $total_shift1 != 0 ? '420' - $data['search']['lost1'] : 0;
    $time2 =  $total_shift2 != 0 ? '420' - $data['search']['lost2'] : 0;
    $time3 =  $total_shift3 != 0 ? '420' - $data['search']['lost3'] : 0;

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

    $oee1 = $total_shift1 != 0 ? (($availability1 / 100) * ($performance1 / 100) * ($quality1 / 100)) * 100 : 0;
    $oee2 = $total_shift2 != 0 ? (($availability2 / 100) * ($performance2 / 100) * ($quality2 / 100)) * 100 : 0;
    $oee3 = $total_shift3 != 0 ? (($availability3 / 100) * ($performance3 / 100) * ($quality3 / 100)) * 100 : 0;
    ?>
    <div class="container-oee">
        <div class="p-2 p-lg-3 bg-gray rounded-top">
            <div class="row justify-content-start">
                <div class="col-4">
                    <a href="/landing/oee" class="btn btn-danger"><i class="fa-solid fa-reply"></i> Back</a>
                </div>
                <div class="col-4 text-center">
                    <h1 class="text-light">OEE</h1>
                </div>
                <div class="col-4 text-end">
                    <button type="button" class="btn btn-warning" id="print">Print <i class="fa-solid fa-print"></i></button>
                </div>
            </div>
        </div>
        <div class="p-lg-3 bg-light-gray rounded-bottom">
            <div class="list-group list-group-checkable no-print">
                <div class="row mb-2">
                    <div class="col">
                        <label class="list-group-item py-2" for="listGroupCheckableRadios1">
                            Date OEE
                            <span class="d-block small opacity-75"><?= $data['search']['start_produksi']; ?> / <?= $data['search']['finish_produksi']; ?></span>
                        </label>
                    </div>
                    <div class="col">
                        <label class="list-group-item py-2" for="listGroupCheckableRadios1">
                            Pro Number
                            <span class="d-block small opacity-75"><?= $data['search']['id_product']; ?></span>
                        </label>
                    </div>
                    <div class="col">
                        <label class="list-group-item py-2" for="listGroupCheckableRadios1">
                            Mesin
                            <span class="d-block small opacity-75"><?= $data['search']['mesin']; ?></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="container print">
                <div class="row">
                    <div class="col-3"><strong>Date OEE</strong></div>
                    <div class="col-1"><strong>:</strong></div>
                    <div class="col-8"><strong><?= $data['search']['start_produksi']; ?> / <?= $data['search']['finish_produksi']; ?></strong></div>
                </div>
                <div class="row">
                    <div class="col-3"><strong>Pro Number</strong></div>
                    <div class="col-1"><strong>:</strong></div>
                    <div class="col-8"><strong><?= $data['search']['id_product']; ?></strong></div>
                </div>
                <div class="row">
                    <div class="col-3"><strong>Mesin</strong></div>
                    <div class="col-1"><strong>:</strong></div>
                    <div class="col-8"><strong><?= $data['search']['mesin']; ?></strong></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
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
                                        <td><?= round($planned1, 1); ?>%</td>
                                        <td><?= round($planned2, 1); ?>%</td>
                                        <td><?= round($planned3, 1); ?>%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Planned Shut Down</th>
                                        <td><?= round($data['search']['lost1'] / 60, 1); ?>Jam</td>
                                        <td><?= round($data['search']['lost2'] / 60, 1); ?>Jam</td>
                                        <td><?= round($data['search']['lost3'] / 60, 1); ?>Jam</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Unplanned Shut Down</th>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Operating Time</th>
                                        <td><?= round($operatingTime1, 1); ?> jam</td>
                                        <td><?= round($operatingTime2, 1); ?> jam</td>
                                        <td><?= round($operatingTime3, 1); ?> jam</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Ok</th>
                                        <td><?= $shift1_ok; ?> BOB</td>
                                        <td><?= $shift2_ok; ?> BOB</td>
                                        <td><?= $shift3_ok; ?> BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product NC</th>
                                        <td><?= $shift1_nc; ?> BOB</td>
                                        <td><?= $shift2_nc; ?> BOB</td>
                                        <td><?= $shift3_nc; ?> BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Reject</th>
                                        <td><?= $shift1_reject; ?> BOB</td>
                                        <td><?= $shift2_reject; ?> BOB</td>
                                        <td><?= $shift3_reject; ?> BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total Product</th>
                                        <td><?= $total_shift1; ?> BOB</td>
                                        <td><?= $total_shift2; ?> BOB</td>
                                        <td><?= $total_shift3; ?> BOB</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Availability</th>
                                        <td>
                                            <span class="badge rounded-pill bg-danger text-dark px-3"><?= round($availability1, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-warning text-dark px-3"><?= round($availability2, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-success text-dark px-3"><?= round($availability3, 1); ?> %</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Performance</th>
                                        <td>
                                            <span class="badge rounded-pill bg-danger text-dark px-3"><?= round($performance1, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-warning text-dark px-3"><?= round($performance2, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-success text-dark px-3"><?= round($performance3, 1); ?> %</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Quality</th>
                                        <td>
                                            <span class="badge rounded-pill bg-danger text-dark px-3"><?= round($quality1, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-warning text-dark px-3"><?= round($quality2, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-success text-dark px-3"><?= round($quality3, 1); ?> %</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">OEE</th>
                                        <td>
                                            <span class="badge rounded-pill bg-danger text-dark px-3"><?= round($oee1, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-warning text-dark px-3"><?= round($oee2, 1); ?> %</span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-success text-dark px-3"><?= round($oee3, 1); ?> %</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                    <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                                </svg>
                                OEE
                            </h4>
                            <hr>
                            <?php
                            // $allShift = (round($oee1) + round($oee2) + round($oee3)) / 3;
                            $avai = [round($availability1), round($availability1), round($availability1)];
                            $sumAvai = array_sum($avai);
                            $performa = [round($performance1), round($performance2), round($performance3)];
                            $sumPerforma = array_sum($performa);
                            $quality = [round($quality1), round($quality2), round($quality3)];
                            $sumQuality = array_sum($quality);
                            $chart = [round($oee1), round($oee2), round($oee3)];
                            $chartPie = [round($sumAvai, 1), round($sumPerforma, 1), round($sumQuality, 1)];
                            $all = [];
                            foreach ($chart as $key => $value) {
                                if ($value != 0) {
                                    $all[] = $value;
                                }
                            }
                            $jumlahTotal = array_sum($all);
                            $shift = count($all);
                            $allShift = $jumlahTotal != 0 ? $jumlahTotal / $shift : 0;
                            $pieChart = json_encode($chartPie, true);
                            ?>
                            <div class="no-print">
                                <span class="fs-6 text-muted">Shift 1</span>
                                <div class="progress mb-1" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= round($oee1, 1); ?>%" aria-valuenow="<?= round($oee1, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($oee1, 1); ?>%</div>
                                </div>
                                <span class="fs-6 text-muted">Shift 2</span>
                                <div class="progress mb-1" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= round($oee2, 1); ?>%" aria-valuenow="<?= round($oee2, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($oee2, 1); ?>%</div>
                                </div>
                                <span class="fs-6 text-muted">Shift 3</span>
                                <div class="progress mb-1" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?= round($oee3, 1); ?>%" aria-valuenow="<?= round($oee3, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($oee3, 1); ?>%</div>
                                </div>
                                <span class="fs-6 text-muted">All Shift</span>
                                <div class="progress mb-1" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= round($allShift, 1); ?>%" aria-valuenow="<?= round($allShift, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($allShift, 1); ?>%</div>
                                </div>
                            </div>
                            <div class="print">
                                <div class="row">
                                    <span class="col-2">Shift 1</span>
                                    <span class="col-1">:</span>
                                    <span class="col-4"><?= round($oee1, 1); ?>%</span>
                                </div>
                                <div class="row">
                                    <span class="col-2">Shift 2</span>
                                    <span class="col-1">:</span>
                                    <span class="col-4"><?= round($oee2, 1); ?>%</span>
                                </div>
                                <div class="row">
                                    <span class="col-2">Shift 3</span>
                                    <span class="col-1">:</span>
                                    <span class="col-4"><?= round($oee3, 1); ?>%</span>
                                </div>
                                <div class="row halaman">
                                    <span class="col-2">All Shift</span>
                                    <span class="col-1">:</span>
                                    <span class="col-4"><?= round($allShift, 1); ?>%</span>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">Availability</div>
                                    <div class="col-1">:</div>
                                    <div class="col-2">Biru</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Performance</div>
                                    <div class="col-1">:</div>
                                    <div class="col-2">Hijau</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Quality</div>
                                    <div class="col-1">:</div>
                                    <div class="col-2">Kuning</div>
                                </div>
                            </div>
                            <!-- Pie Chart -->
                            <div id="oee"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#oee"), {
                                        series: <?= $pieChart; ?>,
                                        chart: {
                                            height: 265,
                                            type: 'pie',
                                            // toolbar: {
                                            //     show: true
                                            // }
                                        },
                                        labels: ['Availability', 'Performance', 'Quality']
                                    }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 halaman">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M18 2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22V4c0-1.103-.897-2-2-2zm0 16.553-6-3.428-6 3.428V4h12v14.553z"></path>
                        </svg>
                        AVAILIBILITY
                    </h4>
                    <hr>
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
                    <div class="no-print">
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
                        <div class="progress mb-2" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= round($allAvai, 1); ?>%" aria-valuenow="<?= round($allAvai, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($allAvai, 1); ?>%</div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="print">
                        <div class="row">
                            <span class="col-2">Shift 1</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Biru</span>
                        </div>
                        <div class="row">
                            <span class="col-2">Shift 2</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Hijua</span>
                        </div>
                        <div class="row">
                            <span class="col-2">Shift 3</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Kuning</span>
                        </div>
                    </div>
                    <div id="availibility"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#availibility"), {
                                series: <?= $pieChartAvai; ?>,
                                chart: {
                                    height: 280,
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
                    <div class="no-print">
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
                        <div class="progress mb-2" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= round($allPerforma, 1); ?>%" aria-valuenow="<?= round($allPerforma, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($allPerforma, 1); ?>%</div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="print">
                        <div class="row">
                            <span class="col-2">Shift 1</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Biru</span>
                        </div>
                        <div class="row">
                            <span class="col-2">Shift 2</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Hijua</span>
                        </div>
                        <div class="row">
                            <span class="col-2">Shift 3</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Kuning</span>
                        </div>
                    </div>
                    <div id="performance"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#performance"), {
                                series: <?= $pieChartPerforma; ?>,
                                chart: {
                                    height: 280,
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
                    <div class="no-print">
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
                        <div class="progress mb-2" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= round($allQuality, 1); ?>%" aria-valuenow="<?= round($allQuality, 1); ?>" aria-valuemin="0" aria-valuemax="100"><?= round($allQuality, 1); ?>%</div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="print">
                        <div class="row">
                            <span class="col-2">Shift 1</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Biru</span>
                        </div>
                        <div class="row">
                            <span class="col-2">Shift 2</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Hijua</span>
                        </div>
                        <div class="row">
                            <span class="col-2">Shift 3</span>
                            <span class="col-1">:</span>
                            <span class="col-4">Kuning</span>
                        </div>
                    </div>
                    <div id="quality"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#quality"), {
                                series: <?= $pieChartQuality; ?>,
                                chart: {
                                    height: 280,
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
<script>
    const print = document.querySelector('#print');

    print.addEventListener('click', function() {
        const nav = document.querySelector("nav");
        nav.classList.add("d-none");
        window.print();
        nav.classList.remove("d-none");

    })
</script>