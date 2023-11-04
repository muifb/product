<style>
    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 140px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 150%;
        left: 50%;
        margin-left: -75px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }
</style>
<div class="main py-4">
    <!-- <div class="container"> -->
    <div class="col"><?php Flasher::flash() ?></div>
    <div class="p-2 p-lg-3 bg-gray rounded-top ">
        <div class="row justify-content-between">
            <div class="col-8">
                <h2 class="text-light">VISMEN LIST ORDER</h2>
            </div>
            <div class="col-4 text-end">
                <a href="/vismen/tambah" type="button" class="btn btn-light">Tambah</a>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Vismen List Order</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Material</th>
                        <th scope="col">Pro</th>
                        <th scope="col">Panjang QTY</th>
                        <th scope="col">QTY(Palet)</th>
                        <th scope="col">Start</th>
                        <th scope="col">Finish</th>
                        <th scope="col">Pengiriman</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (empty($data['vismen'])) {
                    ?>
                        <tr>
                            <td colspan="8" class="text-center document-desc">
                                <h5><i>Tidak ada data untuk ditampilkan.</i></h5>
                            </td>
                        </tr>
                        <?php
                    } else {
                        $nomor = 1;
                        foreach ($data['vismen'] as $vs) : ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $vs['nm_product']; ?></td>
                                <td>
                                    <div id="myTooltip" onclick="copyToClipboard(<?php echo $vs['id_product']; ?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to Clipboard">
                                        <?= $vs['id_product']; ?>
                                    </div>
                                </td>
                                <td><?= $vs['panjang_qty']; ?></td>
                                <td><?= $vs['qty_palet']; ?></td>
                                <td><?= Tanggal::tgl_indo($vs['start_produksi'], true); ?></td>
                                <td><?= Tanggal::tgl_indo($vs['finish_produksi'], true); ?></td>
                                <td><?= Tanggal::tgl_indo($vs['est_pengiriman']); ?></td>
                            </tr>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(e) {
        navigator.clipboard.writeText(e);
    }
</script>