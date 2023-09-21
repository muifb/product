<div class="card rounded-3 p-2 ms-4">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Data Product Reject - <?= $_SESSION['login']['id_pro']; ?></h3>
    </div>
    <hr>
    <!-- <div class="row justify-content-center">
    </div> -->
    <div class="card-body">
        <table class="table table-striped table-hover" id="dataProduct">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Batch</th>
                    <th>Matr Number</th>
                    <th>Group</th>
                    <th>Personal Number</th>
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
                        <td><?= $pro['nm_batch']; ?></td>
                        <td><?= $pro['material']; ?>/</td>
                        <td><?= $pro['kel_shift']; ?></td>
                        <td><?= $pro['nik']; ?></td>
                        <td><?= $pro['status_pro']; ?></td>
                        <td><?= $pro['kat_defect']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>