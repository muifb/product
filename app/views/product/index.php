<div class="card rounded-3 p-2 ms-4">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Data Produksi Product <?= $_SESSION['login']['id_pro']; ?></h3>
    </div>
    <hr>
    <div class="row justify-content-center">
        <!-- Tanggal jam -->

    </div>
    <div class="card-body">
        <table class="table table-striped table-hover" id="dataProduct">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Pro Number</th>
                    <th>Batch</th>
                    <th>Matr Number</th>
                    <th>Status</th>
                    <th>Ket Defect</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                foreach ($data['product'] as $pro) : ?>
                    <tr>
                        <th><?= $nomor++; ?></th>
                        <td><?= $pro['tgl_cetak']; ?></td>
                        <td><?= $pro['id_product']; ?></td>
                        <td><?= $pro['nm_batch']; ?></td>
                        <td><?= $pro['material']; ?>/</td>
                        <td><?= $pro['status_pro']; ?></td>
                        <td><?= $pro['kat_defect']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>