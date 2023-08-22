<?php
Printer::print();
Printer::printIn()
?>
<div class="bg-white p-3 m-3 no-print rounded-3">
    <div class="row mb-3">
        <h3 class="col align-self-start">Create Batch</h3>
        <div class="col col-4 align-self-end">
            <div class="col"><?php Flasher::flash() ?></div>
        </div>
    </div>
    <?php
    if (!is_array($data['kode'])) {
    ?>
        <form action="/home/tambah" method="POST">
            <div class="row" style="padding-left: 0; padding-right: 0;">
                <?php $pro = $data['vismen']; ?>
                <input type="hidden" class="card-title form-control-plaintext namaProduct" value="<?= $pro['nm_product']; ?> <?= $pro['qty_palet']; ?>MMx<?= $pro['panjang_qty']; ?>M" name="namaProduct" id="namaProduct" placeholder="Nama Product">
                <?php $k = $data['kode'];
                $no = 1;
                $jumlah = 6;
                for ($no; $no <= $jumlah; $no++) : ?>
                    <div class="col-sm-4 p-0">
                        <div class="card m-1">
                            <div class="row">
                                <div class="col-1">
                                    <label style="margin-top: .9em; margin-left: .3em;"><span class="material-symbols-outlined">priority_high</span></label>
                                </div>
                                <div class="card-body col-11 p-2">
                                    <p class="m-0">
                                        <label class="fw-normal label-pro" for="" style="font-size: .7rem;"><strong><?= $pro['nm_product']; ?> <?= $pro['qty_palet']; ?>MMx<?= $pro['panjang_qty']; ?>M</strong></label>
                                    </p>
                                    <input type="hidden" class="card-title form-control-plaintext inputProduct" value="<?= $pro['id_product']; ?>" name="inputProduct[]" id="inputProduct">
                                    <input type="hidden" class="card-title form-control-plaintext" name="inputBatch[]" value="<?= $val = $k++; ?>" id="inputBatch">
                                    <?php
                                    $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
                                    echo $generator->getBarcode($val, $generator::TYPE_CODE_128_B);
                                    ?>

                                    <p class="m-0">
                                        <label class="card-title fw-bold" for=""><?= $val; ?></label>
                                    </p>
                                    <input type="hidden" class="card-title form-control-plaintext" value="<?= $_SESSION['login']['id_shift']; ?>" name="shift[]" id="inputBatch">
                                    <input type="hidden" class="card-title form-control-plaintext" value="<?= $_SESSION['login']['nik']; ?>" name="nip[]" id="inputBatch">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="col align-self-end text-end mt-3">
                <button type="submit" class="btn btn-primary btn-sm p-2">Cetak Batch Dalam</button>
            </div>
        </form>
    <?php
    } else {
    ?>
        <form action="/home/update" method="POST">
            <div class="row" style="padding-left: 0; padding-right: 0;">
                <?php foreach ($data['kode'] as $pro) : ?>
                    <div class="col-sm-4 p-0">
                        <div class="card m-1">
                            <div class="card-body p-2">
                                <p class="m-0">
                                    <label class="fw-normal label-pro" for="" style="font-size: .7rem;"><strong><?= $pro['nm_product']; ?> <?= $pro['qty_palet']; ?>MMx<?= $pro['panjang_qty']; ?>M</strong></label>
                                </p>
                                <input type="hidden" class="card-title form-control-plaintext namaProduct" value="<?= $pro['nm_product']; ?> <?= $pro['qty_palet']; ?>MMx<?= $pro['panjang_qty']; ?>M" name="namaProduct[]" id="namaProduct" placeholder="Nama Product">
                                <input type="hidden" class="card-title form-control-plaintext" name="inputBatch[]" value="<?= $pro['nm_batch']; ?>" id="inputBatch">
                                <?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
                                echo $generator->getBarcode($pro['nm_batch'], $generator::TYPE_CODE_128_B);
                                ?>

                                <p class="m-0">
                                    <label class="card-title fw-bold" for=""><?= $pro['nm_batch']; ?></label>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col align-self-end text-end mt-3">
                <button type="submit" class="btn btn-primary btn-sm p-2">Cetak Batch Luar</button>
            </div>
        </form>
    <?php
    }
    ?>
</div>