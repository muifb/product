<div class="row ms-3">
    <div class="col-12">
        <h2 class="content-title">Input number batch</h2>
    </div>
    <div class="col-12 col-md-6 col-lg-4" id="tombol">
        <div class="statistics-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h1 class="content-desc">Create Batch</h1>
                </div>
                <a href="/home/create" type="submit" class="btn-statistics create" name="">
                    <img src="<?= BASEURL ?>/assets/img/global/times.svg" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4" id="tombol">
        <div class="statistics-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h1 class="content-desc">Good Receipt</h1>
                </div>

                <a href="/home/goodReceipt" type="submit" class="btn-statistics good" name="">
                    <img src="<?= BASEURL ?>/assets/img/global/times.svg" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4" id="tombol">
        <div class="statistics-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h1 class="content-desc">Edit Good Receipt</h1>
                </div>
                <a href="/home/editReceipt" type="submit" class="btn-statistics edit" name="">
                    <img src="<?= BASEURL ?>/assets/img/global/times.svg" alt="">
                </a>
            </div>

        </div>
    </div>

    <div class="col-12">
        <?php $pro = $data['vismen']; ?>
        <div class="row mt-5">
            <div class="col-lg-6">
                <h2 class="content-title">Process Order</h2>
                <div class="content-desc mb-4" style="color: rgb(69, 56, 189);"><?= $pro['mesin']; ?></div>



                <div class="document-card">
                    <div class="document-item">
                        <div cla ss="d-flex justify-content-start align-items-center">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Process Order used</h2>

                                <!-- <span class="document-desc">250100302227</span> -->
                                <span class="document-desc"><?= $pro['id_product']; ?></span>
                            </div>
                        </div>



                    </div>

                    <div class="document-item">
                        <div cla ss="d-flex justify-content-start align-items-center">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Material Number</h2>

                                <span class="document-desc"><?= $pro['material_numb'] != null ? $pro['material_numb'] : ''; ?></span>
                            </div>
                        </div>


                    </div>

                    <div class="document-item">
                        <div cla ss="d-flex justify-content-start align-items-center">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Material Description</h2>


                                <!-- <span class="document-desc">BRIGHT SILVER 12 Mic 30 GSM 76 MM x 2000M • Plastic core • FPS </span> -->
                                <span class="document-desc"><?= $pro['nm_product'] ?> <?= $pro['qty_palet'] ?> MM x <?= $pro['panjang_qty'] ?> M</span>
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div cla ss="d-flex justify-content-start align-items-center">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Customer Name</h2>

                                <span class="document-desc"><?= $pro['customer'] != null ? $pro['customer'] : ''; ?></span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-lg-6">
                <h2 class="content-title">Size Product</h2>
                <!-- <div class="content-desc mb-4" style="color: rgb(69, 56, 189);">Lebar 152 mm | Panjang 2000 M</div> -->
                <div class="content-desc mb-4" style="color: rgb(69, 56, 189);">Lebar <?= $pro['qty_palet']; ?> mm | Panjang <?= $pro['panjang_qty']; ?> M</div>


                <div class="document-card">
                    <div class="document-item">
                        <div cla ss="d-flex justify-content-start align-items-center">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Start PRO - Finish PRO </h2>

                                <span class="document-desc"><?= tgl_indo($pro['start_produksi']); ?> - <?= tgl_indo($pro['finish_produksi']); ?></span>
                            </div>
                        </div>


                    </div>

                    <div class="document-item">
                        <div cla ss="d-flex justify-content-start align-items-center">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Target Produksi</h2>

                                <span class="document-desc"><?= $pro['panjang_qty'] ?> BOB</span>
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div cla ss="d-flex justify-content-start align-items-center">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Remain Target</h2>

                                <span class="document-desc"><?= $data['product']['remain']; ?> BOB</span>
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">


                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Delivered (OK+NC)</h2>

                                <span class="document-desc"><?= $data['product']['delivered']; ?> BOB</span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">


                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Target QTY @pallet</h2>

                                <span class="document-desc">- BOB</span>
                            </div>
                        </div>
                        <div class="document-item">
                            <div class="d-flex justify-content-start align-items-center">


                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h2 class="document-title">Delivered (OK+NC)</h2>

                                    <span class="document-desc">- BOB</span>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>

</div>