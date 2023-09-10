<div class=""><?php Flasher::flash() ?></div>
<div class="card rounded-3 p-2">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Data Lost Time Pro <?= $_SESSION['login']['id_pro']; ?></h3>
    </div>
    <hr>
    <div class="card-body">
        <a href="/lost/create" class="btn btn-primary mb-3">Tambah</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col">Pro Numb</th> -->
                    <th scope="col">Nik</th>
                    <th scope="col">Shift</th>
                    <th scope="col">Kategory Lt</th>
                    <th scope="col">Mulai Lt</th>
                    <th scope="col">Selesai Lt</th>
                    <th scope="col">Sebab Lt</th>
                    <th scope="col">Jenis Lt</th>
                    <th scope="col">Tanggal Lt</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (empty($data['lost'])) {
                ?>
                    <tr>
                        <td colspan="9" class="text-center document-desc">
                            <h5><i>Tidak ada Lost Time untuk ditampilkan dari Pro <?= $_SESSION['login']['id_pro']; ?>.</i></h5>
                        </td>
                    </tr>
                    <?php
                } else {
                    $nomor = 1;
                    foreach ($data['lost'] as $lost) : ?>
                        <tr>
                            <th scope="row"><?= $nomor++; ?></th>
                            <!-- <td><?= $lost['id_product']; ?></td> -->
                            <td class="text-center"><?= $lost['nik']; ?></td>
                            <td class="text-center"><?= $lost['kel_shift']; ?></td>
                            <td><?= substr($lost['kategori_lt'], 10); ?></td>
                            <td><?= $lost['jam_mulai']; ?></td>
                            <td><?= $lost['jam_selesai']; ?></td>
                            <td class="text-center"><?= $lost['sebab_lt']; ?></td>
                            <td><?= $lost['jenis_lt']; ?></td>
                            <td><?= $lost['tgl_lost']; ?></td>
                        </tr>
                <?php endforeach;
                } ?>
            </tbody>
        </table>
    </div>
</div>