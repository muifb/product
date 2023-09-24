<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL - <?= $data['judul']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='<?= BASEURL; ?>/assets/img/global/logo.svg' rel='shortcut icon'>
    <link href="<?= BASEURL; ?>/assets/css/index.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/css/flatpickr.min.css" rel="stylesheet" />

    <style>
        .main {
            margin-left: 7em;
            margin-right: 6em;
            /* visibility: hidden; */
        }

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

        @media print {
            .main {
                /* visibility: visible; */
            }

            .halaman {
                break-after: page;
            }
        }
    </style>

</head>

<body>
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

        $avai = [round($availability1), round($availability2), round($availability3)];
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
        <div class="container-fluid">
            <center>
                <h2>Laporan OEE</h2>
            </center>
            <div class="row my-2">
                <label class="col-3">
                    Date OEE
                </label>
                <div class="col-9">
                    <label class="d-block">: <?= Tanggal::tanggal_indo($data['search']['start_produksi']); ?> - <?= Tanggal::tanggal_indo($data['search']['finish_produksi']); ?></label>
                </div>
            </div>
            <div class="row my-2">
                <label class="col-3">
                    Pro Number
                </label>
                <div class="col-9">
                    <label class="d-block">: <?= $data['search']['id_product']; ?></label>
                </div>
            </div>
            <div class="row my-2">
                <label class="col-3">
                    Mesin
                </label>
                <div class="col-9">
                    <label class="d-block">: <?= $data['search']['mesin']; ?></label>
                </div>
            </div>
            <div class="row my-5">
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
            <!-- <div class="row mt-5"> -->
            <div class="row halaman">
                <div class="col">
                    <h5>Oee</h5>
                    <span class="fs-6 text-muted">Shift 1 = <?= round($oee1, 1); ?>%</span>
                    <span class="fs-6 text-muted">Shift 2 = <?= round($oee2, 1); ?>%</span>
                    <span class="fs-6 text-muted">Shift 3 = <?= round($oee3, 1); ?>%</span>
                    <span class="fs-6 text-muted">All Shift = <?= round($allShift, 1); ?>%</span>
                </div>
                <div class="col">
                    <div id="oeePrint"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#oeePrint"), {
                                series: <?= $pieChart; ?>,
                                chart: {
                                    height: 250,
                                    type: 'pie',
                                },
                                // legend: false,
                                labels: ['Availability : Biru', 'Performance : Hijau', 'Quality : Kuning']
                            }).render();
                        });
                    </script>
                </div>
            </div>
            <!-- </div> -->
            <div class="row mt-5">
                <div class="col">
                    <h5>Availability</h5>
                </div>
                <div class="col">
                    <div id="availibilityPrint"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#availibilityPrint"), {
                                series: <?= $pieChartAvai; ?>,
                                chart: {
                                    height: 250,
                                    type: 'pie',
                                },
                                // legend: false,
                                labels: ['Shift 1 : Biru', 'Shift 2 : Hijau', 'Shift 3 : Kuning']
                            }).render();
                        });
                    </script>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h5>Performance</h5>
                </div>
                <div class="col">
                    <div id="performancePrint"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#performancePrint"), {
                                series: <?= $pieChartPerforma; ?>,
                                chart: {
                                    height: 250,
                                    type: 'pie',
                                },
                                // legend: false,
                                labels: ['Shift 1 : Biru', 'Shift 2 : Hijau', 'Shift 3 : Kuning']
                            }).render();
                        });
                    </script>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h5>Quality</h5>
                </div>
                <div class="col">
                    <div id="qualityPrint"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#qualityPrint"), {
                                series: <?= $pieChartQuality; ?>,
                                chart: {
                                    height: 250,
                                    type: 'pie',
                                },
                                // legend: false,
                                labels: ['Shift 1 : Biru', 'Shift 2 : Hijau', 'Shift 3 : Kuning']
                            }).render();
                        });
                    </script>
                </div>
            </div>
        </div>
    </main>

    <script>
        var BASEURL = '<?= BASEURL; ?>';
    </script>
    <script src="<?= BASEURL; ?>/assets/js/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/flatpickr.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/Datatables/datatables.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/Datatables/DataTables/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/script.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.print();
        });
    </script>

</body>

</html>