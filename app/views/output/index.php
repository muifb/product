<div class="card rounded-3 p-2 ms-4">
    <div class="row mt-3 mx-auto">
        <h3 class="judul m-0">Data Output Product <?= $_SESSION['login']['id_pro']; ?></h3>
    </div>
    <hr>
    <?php
    $product = count($data['product']);
    $jumlah = $product / $data['output'];
    ?>
    <div class="card-body">
        <table class="table table-striped table-hover" id="dataProduct">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Batch</th>
                    <th>Start Up</th>
                    <th>Turn Up</th>
                    <th>Group</th>
                    <th>Personal Numb</th>
                    <th>Status</th>
                    <th>ket Defect</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                foreach ($data['product'] as $pro) : ?>
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $pro['tgl_cetak']; ?></td>
                        <td><?= $pro['nm_batch']; ?></td>
                        <td><?= $pro['mulai_pro']; ?></td>
                        <td><?= $pro['selesai_pro']; ?></td>
                        <td><?= $pro['kel_shift']; ?></td>
                        <td><?= $pro['nik']; ?></td>
                        <td><?= $pro['status_pro']; ?></td>
                        <td><?= $pro['kat_defect']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-end" colspan="8">#Total Semua</th>
                    <th scope="col"><?= round($jumlah); ?> Output</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>