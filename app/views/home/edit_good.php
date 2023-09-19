<!-- <div class="container mt-4"> -->
<div class="m-4">
    <a href="/produksi/home" class="btn btn-danger"><i class="fa-solid fa-reply"></i> Back</a>
</div>
<div class="row justify-content-center mx-5 my-1">
    <?php Flasher::flash() ?>
</div>
<div class="card rounded-3 mx-4 p-1">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Edit Good Receipt</h3>
    </div>
    <hr>
    <div class="row justify-content-center">
        <!-- Tanggal jam -->

    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover" id="editReceipt">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Batch</th>
                    <!-- <th>Pro Numb</th> -->
                    <th>Matr Number</th>
                    <th>Status</th>
                    <th>Start</th>
                    <th>Finish</th>
                    <th class="lebar-3">Joint</th>
                    <th>Panjang</th>
                    <th>Ukuran</th>
                    <th class="lebar-6">Defect</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                foreach ($data['product'] as $pr) : ?>
                    <tr>
                        <th><?= $nomor++; ?></th>
                        <td><?= $pr['nm_batch']; ?></td>
                        <!-- <td><?= $pr['id_product']; ?></td> -->
                        <td><?= $pr['material']; ?></td>
                        <td><?= $pr['status_pro']; ?></td>
                        <td><?= $pr['mulai_pro']; ?></td>
                        <td><?= $pr['selesai_pro']; ?></td>
                        <td><?= $pr['angka']; ?></td>
                        <td><?= $pr['panjang_qty']; ?></td>
                        <td><?= $pr['qty_palet']; ?></td>
                        <td><?= $pr['kat_defect']; ?></td>
                        <td><a class="btn btn-success btn-sm tampilModalResend" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $pr['id_report']; ?>">Resend</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- </div> -->

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLabel">Form Repost Data Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="/produksi/edit-receipt" method="post">
                    <div class="row">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Batch :</label>
                            <input type="hidden" class="form-control" name="modalIdReport" id="modalIdReport" readonly>
                            <input type="text" class="form-control" name="modalBatch" id="modalBatch" readonly>
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Pro Number :</label>
                            <input type="text" class="form-control" name="" id="modalProduct" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Start :</label>
                            <input type="datetime-local" class="form-control" name="modalStart" id="modalStart" placeholder="Select Date...">
                            <!-- <input type="text" class="form-control" name="modalStart" id="modalStart"> -->
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Finish :</label>
                            <input type="datetime-local" class="form-control" name="modalFinish" id="modalFinish" placeholder="Select Date...">
                            <!-- <input type="text" class="form-control" name="modalFinish" id="modalFinish" aria-label="Last name"> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Matr Number :</label>
                            <input type="text" class="form-control" name="modalMaterial" id="modalMaterial" readonly>
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Status :</label>
                            <select class="form-select" name="modalStatus" id="modalStatus" aria-label="Default select example">
                                <option value="OK">OK</option>
                                <option value="NC">NC</option>
                                <option value="Reject">Reject</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Total Sambungan :</label>
                            <input type="text" class="form-control" name="modalAngka" id="modalAngka">
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Panjang :</label>
                            <input type="text" class="form-control" name="" id="modalPanjang" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Ukuran :</label>
                            <input type="text" class="form-control" name="" id="modalUkuran" readonly>
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Defect :</label>
                            <select class="form-select" name="modalDefect" id="modalDefect" aria-label="Default select example">
                                <option value="No Defect">No Defect</option>
                                <option value="Defect">Defect</option>
                                <option value="Keriput">Keriput</option>
                                <option value="Material">Material</option>
                                <option value="Out Spec">Out Spec</option>
                                <option value="Spot">Spot</option>
                                <option value="Print Coating">Print Coating</option>
                                <option value="Join">Join</option>
                                <option value="Trim">Trim</option>
                                <option value="Marking">Marking</option>
                                <option value="Startup">Startup</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Resend Data</button>

                </form>
            </div>
        </div>
    </div>
</div>