<style>
    @media print {
        .halaman {
            break-after: page;
        }
    }
</style>
<?php
Printer::print();
Printer::printIn();
$pro = $data['vismen'];
?>
<div class="ps-3 no-print">
    <a href="/produksi/home" class="btn btn-danger"><i class="fa-solid fa-reply"></i> Back</a>
</div>
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
        <form action="/produksi/create-batch" method="POST">
            <div class="row" style="padding-left: 0; padding-right: 0;">
                <input type="hidden" class="card-title form-control-plaintext namaProduct" value="<?= $pro['nm_product']; ?> <?= $pro['qty_palet']; ?>MMx<?= $pro['panjang_qty']; ?>M" name="namaProduct" id="namaProduct" placeholder="Nama Product">
                <?php $k = $data['kode'];
                $no = 1;
                $ukuran = substr($pro['nm_product'], -4);
                $qty = $pro['qty_palet'];
                $jumlah = round($ukuran / $qty);
                for ($no; $no <= $jumlah; $no++) : ?>
                    <!-- <div class="col-sm-4 p-0"> -->
                    <a href="#" class="col-sm-4 p-0" style="color: black;" data-bs-toggle="modal" data-bs-target="#detail-dalam">
                        <div class="card m-1">
                            <div class="row">
                                <div class="col-1">
                                    <label style="margin-top: .9em; margin-left: .3em;"><span class="material-symbols-outlined">priority_high</span></label>
                                </div>
                                <div class="card-body col-11 p-2">
                                    <p class="m-0">
                                        <label class="fw-normal label-pro" style="font-size: .7rem;"><strong><?= $pro['nm_product']; ?> <?= $pro['qty_palet']; ?>MMx<?= $pro['panjang_qty']; ?>M</strong></label>
                                    </p>
                                    <input type="hidden" class="card-title form-control-plaintext inputProduct" value="<?= $pro['id_product']; ?>" name="inputProduct[]" id="inputProduct">
                                    <input type="hidden" class="card-title form-control-plaintext" name="inputBatch[]" value="<?= $val = $k++; ?>" id="inputBatch">
                                    <?php
                                    $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
                                    echo $generator->getBarcode($val, $generator::TYPE_CODE_93);
                                    ?>

                                    <p class="m-0">
                                        <label class="card-title fw-bold"><?= $val; ?></label>
                                    </p>
                                    <input type="hidden" class="card-title form-control-plaintext" value="<?= $_SESSION['login']['id_shift']; ?>" name="shift[]" id="inputBatch">
                                    <input type="hidden" class="card-title form-control-plaintext" value="<?= $_SESSION['login']['nik']; ?>" name="nip[]" id="inputBatch">
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- </div> -->
                <?php endfor; ?>
                <div class="modal fade" id="detail-dalam" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Batch Dalam</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="document-card py-2">
                                    <div class="document-item mb-2 pb-2">
                                        <div cla ss="d-flex justify-content-start align-items-center">

                                            <div class="d-flex flex-column justify-content-between align-items-start">
                                                <h2 class="document-title">Process Order used</h2>
                                                <span class="document-desc"><?= $pro['id_product']; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="document-item mb-2 pb-2">
                                        <div cla ss="d-flex justify-content-start align-items-center">

                                            <div class="d-flex flex-column justify-content-between align-items-start">
                                                <h2 class="document-title">Material Number</h2>
                                                <span class="document-desc"><?= $pro['material_numb'] != null ? $pro['material_numb'] : ''; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="document-item mb-2 pb-2">
                                        <div cla ss="d-flex justify-content-start align-items-center">

                                            <div class="d-flex flex-column justify-content-between align-items-start">
                                                <h2 class="document-title">Material Description</h2>
                                                <span class="document-desc"><?= $pro['nm_product'] ?> <?= $pro['qty_palet'] ?> MM x <?= $pro['panjang_qty'] ?> M</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="document-item mb-2 pb-2">
                                        <div cla ss="d-flex justify-content-start align-items-center">

                                            <div class="d-flex flex-column justify-content-between align-items-start">
                                                <h2 class="document-title">Customer Name</h2>

                                                <span class="document-desc"><?= $pro['customer'] != null ? $pro['customer'] : ''; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="document-item mb-2 pb-2">
                                        <div cla ss="d-flex justify-content-start align-items-center">

                                            <div class="d-flex flex-column justify-content-between align-items-start">
                                                <h2 class="document-title">Start PRO - Finish PRO </h2>

                                                <span class="document-desc"><?= Tanggal::tgl_indo($pro['start_produksi']); ?> - <?= Tanggal::tgl_indo($pro['finish_produksi']); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col align-self-end text-end mt-3">
                <button type="submit" class="btn btn-primary btn-sm p-2">Cetak Batch Dalam</button>
            </div>
        </form>
    <?php
    } else {
    ?>
        <form action="/produksi/update-batch" method="POST">
            <div class="row" style="padding-left: 0; padding-right: 0;">
                <?php foreach ($data['kode'] as $key => $value) : ?>
                    <a href="#" class="col-sm-4 p-0" style="color: black;" data-bs-toggle="modal" data-bs-target="#detail-luar">
                        <div class="card m-1">
                            <div class="card-body p-2">
                                <p class="m-0">
                                    <label class="fw-normal label-pro" style="font-size: .7rem;"><strong><?= $value['nm_product']; ?> <?= $value['qty_palet']; ?>MMx<?= $value['panjang_qty']; ?>M</strong></label>
                                </p>
                                <input type="hidden" class="card-title form-control-plaintext namaProduct" value="<?= $value['nm_product']; ?> <?= $value['qty_palet']; ?>MMx<?= $value['panjang_qty']; ?>M" name="namaProduct[]" id="namaProduct" placeholder="Nama Product">
                                <input type="hidden" class="card-title form-control-plaintext" name="inputBatch[]" value="<?= $value['nm_batch']; ?>" id="inputBatch">
                                <?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
                                echo $generator->getBarcode($value['nm_batch'], $generator::TYPE_CODE_93);
                                ?>

                                <p class="m-0">
                                    <label class="card-title fw-bold"><?= $value['nm_batch']; ?></label>
                                </p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="col align-self-end text-end mt-3">
                <button type="submit" class="btn btn-primary btn-sm p-2">Cetak Batch Luar</button>
            </div>
        </form>
        <div class="modal fade" id="detail-luar" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Batch Luar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="document-card py-2">
                            <div class="document-item mb-2 pb-2">
                                <div cla ss="d-flex justify-content-start align-items-center">

                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                        <h2 class="document-title">Process Order used</h2>
                                        <span class="document-desc"><?= $pro['id_product']; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="document-item mb-2 pb-2">
                                <div cla ss="d-flex justify-content-start align-items-center">

                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                        <h2 class="document-title">Material Number</h2>
                                        <span class="document-desc"><?= $pro['material_numb'] != null ? $pro['material_numb'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="document-item mb-2 pb-2">
                                <div cla ss="d-flex justify-content-start align-items-center">

                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                        <h2 class="document-title">Material Description</h2>
                                        <span class="document-desc"><?= $pro['nm_product'] ?> <?= $pro['qty_palet'] ?> MM x <?= $pro['panjang_qty'] ?> M</span>
                                    </div>
                                </div>
                            </div>

                            <div class="document-item mb-2 pb-2">
                                <div cla ss="d-flex justify-content-start align-items-center">

                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                        <h2 class="document-title">Customer Name</h2>

                                        <span class="document-desc"><?= $pro['customer'] != null ? $pro['customer'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="document-item mb-2 pb-2">
                                <div cla ss="d-flex justify-content-start align-items-center">

                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                        <h2 class="document-title">Start PRO - Finish PRO </h2>

                                        <span class="document-desc"><?= Tanggal::tgl_indo($pro['start_produksi']); ?> - <?= Tanggal::tgl_indo($pro['finish_produksi']); ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>