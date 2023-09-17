<?php

class Printer
{
    public static function setPrint($nmBatch, $product)
    {
        $_SESSION['print'] = [
            'batch' => $nmBatch,
            'product' => $product
        ];
    }

    public static function print()
    {
        if (isset($_SESSION['print'])) {

            $dataBatch = $_SESSION['print'];
            $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
            echo '
            <div class="container bg-white p-4 m-4 print-cetak">
                <center>
                    <h4 class="card-title mb-4"><strong>Cetak Batch Dalam</strong></h4>
                </center>
                <div class="row p-3">';
            foreach ($dataBatch['batch'] as $batch) {
                echo '<div class="mb-3">
                        <div class="row">
                            <div class="col-1">
                                <label style="margin-top: .5em; margin-left: 1.3em;"><span class="material-symbols-outlined">priority_high</span></label>
                            </div>
                            <div class="col-11">
                                <p class="m-0">
                                    <label class="fw-normal label-pro" for="" style="font-size: .7rem;"><strong>' . $_SESSION['print']['product'] . '</strong></label>
                                </p>
                                ' . $generator->getBarcode($batch, $generator::TYPE_CODE_128_B) . '
                                <p class="m-0">
                                    <label class="card-title fw-bold" for="">' . $batch . '</label>
                                </p>
                            </div>
                        </div>
                    </div>';
            }
            echo '
                </div>
            </div>
            <script>window.print()</script>
            ';
            unset($_SESSION['print']);
        }
    }

    public static function setPrintIn($nmBatchIn, $productIn)
    {
        $_SESSION['printIn'] = [
            'batch' => $nmBatchIn,
            'product' => $productIn
        ];
    }

    public static function printIn()
    {
        if (isset($_SESSION['printIn'])) {

            $dataBatch = $_SESSION['printIn'];
            $dataPro = $_SESSION['printIn']['product'];
            $no = 0;
            $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
            echo '
            <div class="container bg-white p-4 m-4 print-cetak">
                <center>
                    <h5 class="card-title m-0"><strong>Cetak Batch Luar</strong></h5>
                </center>
                <div class="row p-3">';
            foreach ($dataBatch['batch'] as $batch) {
                echo '<div class="mb-3">
                            <div class="card ps-3">
                                <p class="m-0">
                                    <label class="fw-normal label-pro" for="" style="font-size: .7rem;"><strong>' . $dataPro[$no] . '</strong></label>
                                </p>
                                ' . $generator->getBarcode($batch, $generator::TYPE_CODE_128_B) . '
                                <p class="m-0">
                                    <label class="card-title fw-bold" for="">' . $batch . '</label>
                                </p>
                            </div>
                        </div>';
                $no++;
            }
            echo '
                </div>
            </div>
            <script>window.print()</script>
            ';
            unset($_SESSION['printIn']);
        }
    }
}
