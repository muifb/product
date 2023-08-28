<!-- Page content-->
<div class="main py-4">
    <div class="col"><?php Flasher::flash() ?></div>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Data Product</h2>
            <button type="button" class="btn btn-outline-success fw-bolder my-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Product</button>
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

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/landing/storeProduct" class="px-5" method="post">
                                <div class="row mb-3">
                                    <label for="inputProNumber" class="col-sm-2 col-form-label">Pro Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="id_product" id="inputProNumber">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNamaProduct" class="col-sm-2 col-form-label">Nama Product</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="nm_product" id="inputNamaProduct">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">&nbsp;</div>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>