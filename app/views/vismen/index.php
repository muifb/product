<div class="container">
    <h2>Vismen List Order</h2>
    <table class="table table-striped table-sm table-hover" id="vismenList">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Material</th>
                <th scope="col">Pro</th>
                <th scope="col">Start</th>
                <th scope="col">Finish</th>
            </tr>
        </thead>

        <tbody>
            <?php $nomor = 1;
            // $date = $data['product'];
            // $time = new DateTime($date['mulai_pro']);
            foreach ($data['vismen'] as $vis) : ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $vis['nm_product']; ?></td>
                    <td><?= $vis['id_product']; ?></td>
                    <td><?= tgl_indo($vis['start_produksi'], true); ?></td>
                    <td><?= tgl_indo($vis['finish_produksi'], true); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>