<div class="main py-4">
    <div class="container">
        <div class="col"><?php Flasher::flash() ?></div>
        <div class="p-2 p-lg-3 bg-gray rounded-top ">
            <div class="row justify-content-between">
                <div class="col-8">
                    <h2 class="text-light">FORM INPUT VISMEN LIST ORDER</h2>
                </div>
                <div class="col-4 text-end">
                    <a href="/landing/tambah_vismen" type="button" class="btn btn-light tambah">Tambah</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
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
                    <?php $nomor = 1;
                    // $date = $data['product'];
                    // $time = new DateTime($date['mulai_pro']);
                    foreach ($data['vismen'] as $vs) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $vs['nm_product']; ?></td>
                            <td><?= $vs['id_product']; ?></td>
                            <td><?= $vs['panjang_qty']; ?></td>
                            <td><?= $vs['qty_palet']; ?></td>
                            <td><?= tgl_indo($vs['start_produksi'], true); ?></td>
                            <td><?= tgl_indo($vs['finish_produksi'], true); ?></td>
                            <td><?= tgl_indo($vs['est_pengiriman']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <script>
    const btn = document.querySelector('.tambah');

    btn.addEventListener('click', function() {
        if (btn.innerHTML === "Tambah") {
            btn.innerHTML = "Batal";
        } else {
            btn.innerHTML = "Tambah";
        }
    })
</script> -->