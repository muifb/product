<div class="card rounded-3 p-2 ms-4">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Data Product OK - <?= $_SESSION['login']['id_pro']; ?></h3>
    </div>
    <hr>

    <div class="card-body">
        <table class="table table-striped table-hover" id="vismenList">
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
                // $date = $data['product'];
                // $time = new DateTime($date['mulai_pro']);
                foreach ($data['product'] as $vis) : ?>
                    <tr>
                        <th><?= $nomor++; ?></th>
                        <td><?= $vis['tgl_cetak']; ?></td>
                        <td><?= $vis['nm_batch']; ?></td>
                        <td><?= $vis['material']; ?>/</td>
                        <td><?= $vis['kel_shift']; ?></td>
                        <td><?= $vis['nik']; ?></td>
                        <td><?= $vis['status_pro']; ?></td>
                        <td><?= $vis['kat_defect']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>