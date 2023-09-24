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
            <div class="py-4 px-2 print-cetak">
                <center class="my-4">
                    <span class="fs-3"><strong>Cetak Batch Dalam</strong></span>
                </center>
                <div class="row">';
            foreach ($dataBatch['batch'] as $batch) {
                echo '
                        <div class="col-6 my-1">
                            <div class="row p-1">
                                <div class="col-1">
                                    <label style="margin-top: .5em;"><span class="material-symbols-outlined">priority_high</span></label>
                                </div>
                                <div class="col-11">
                                    <p class="m-0">
                                        <label class="fw-normal label-pro" for="" style="font-size: .7rem;"><strong>' . $_SESSION['print']['product'] . '</strong></label>
                                    </p>
                                    ' . $generator->getBarcode($batch, $generator::TYPE_CODE_93) . '
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
            <div class="py-4 px-2 print-cetak">
                <center class="my-4">
                    <span class="fs-3"><strong>Cetak Batch Luar</strong></span>
                </center>
                <div class="row">';
            foreach ($dataBatch['batch'] as $batch) {
                echo '
                        <div class="col-6 my-1">
                            <div class="p-1">
                                <p class="m-0">
                                    <label class="fw-normal label-pro" for="" style="font-size: .7rem;"><strong>' . $dataPro[$no] . '</strong></label>
                                </p>
                                ' . $generator->getBarcode($batch, $generator::TYPE_CODE_93) . '
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
