<div class="card rounded-3 p-2 ms-4">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Data Product Reject</h3>
    </div>
    <hr>
    <!-- <div class="row justify-content-center">
    </div> -->
    <div class="card-body">
        <table class="table table-striped table-hover" id="dataProduct">
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
                foreach ($data['product'] as $pro) : ?>
                    <tr>
                        <th scope="row"><?= $nomor++; ?></th>
                        <td><?= $pro['tgl_cetak']; ?></td>
                        <td><?= $pro['id_product']; ?></td>
                        <td><?= $pro['nm_batch']; ?></td>
                        <td><?= $pro['material']; ?>/</td>
                        <td class="text-center"><?= $pro['kel_shift']; ?></td>
                        <td class="text-center"><?= $pro['nik']; ?></td>
                        <td class="text-center"><?= $pro['status_pro']; ?></td>
                        <td><?= $pro['kat_defect']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>