<!-- Page content-->
<div class="main py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Data Product</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pro Number</th>
                        <th scope="col">Nama Product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1;
                    foreach ($data['product'] as $pro) : ?>
                        <tr>
                            <th scope="row"><?= $nomor++; ?></th>
                            <td><?= $pro['id_product']; ?></td>
                            <td><?= $pro['nm_product']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>