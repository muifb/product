<div class="card rounded-3 p-2 ms-4">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Data Product OK</h3>
    </div>
    <hr>

    <div class="card-body">
        <table class="table table-striped table-sm table-hover" id="vismenList">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Pro Number</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Matr Number</th>
                    <th scope="col">Group</th>
                    <th scope="col">Personal Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ket Defect</th>
                </tr>
            </thead>

            <tbody>
                <?php $nomor = 1;
                // $date = $data['product'];
                // $time = new DateTime($date['mulai_pro']);
                foreach ($data['product'] as $vis) : ?>
                    <tr>
                        <th scope="row"><?= $nomor++; ?></th>
                        <td><?= $vis['tgl_cetak']; ?></td>
                        <td><?= $vis['id_product']; ?></td>
                        <td><?= $vis['nm_batch']; ?></td>
                        <td><?= $vis['material']; ?>/</td>
                        <td class="text-center"><?= $vis['kel_shift']; ?></td>
                        <td class="text-center"><?= $vis['nik']; ?></td>
                        <td class="text-center"><?= $vis['status_pro']; ?></td>
                        <td><?= $vis['kat_defect']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>