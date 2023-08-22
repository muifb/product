<div class="card rounded-3 p-2 ms-4">
    <div class="row mt-3 mx-auto">
        <h3 class="judul m-0">Data Output Product</h3>
    </div>
    <hr>
    <?php
    $product = $data['product'];
    $jumlah = count($product) / 6;
    ?>
    <div class="card-body">
        <table class="table table-striped table-hover" id="dataProduct">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Pro Number</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Start Up</th>
                    <th scope="col">Turn Up</th>
                    <th scope="col">Group</th>
                    <th scope="col">Personal Numb</th>
                    <th scope="col">Status</th>
                    <th scope="col">ket Defect</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                foreach ($data['product'] as $pro) : ?>
                    <tr>
                        <th scope="row"><?= $nomor++; ?></th>
                        <td><?= $pro['tgl_cetak']; ?></td>
                        <td><?= $pro['id_product']; ?></td>
                        <td><?= $pro['nm_batch']; ?></td>
                        <td><?= $pro['mulai_pro']; ?></td>
                        <td><?= $pro['selesai_pro']; ?></td>
                        <td class="text-center"><?= $pro['kel_shift']; ?></td>
                        <td class="text-center"><?= $pro['nik']; ?></td>
                        <td class="text-center"><?= $pro['status_pro']; ?></td>
                        <td><?= $pro['kat_defect']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <th class="text-end" colspan="9">#Total Semua</th>
                <th scope="col"><?= $jumlah; ?> Output</th>
            </tr>
        </table>
    </div>
</div>