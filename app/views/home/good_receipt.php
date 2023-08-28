<!-- <div class="container mt-4"> -->
<div class="m-4">
    <a href="/home" class="btn btn-danger"><i class="fa-solid fa-reply"></i> Back</a>
</div>
<div class="card rounded-3 m-4 p-1">
    <div class="row mt-4 mx-auto">
        <h3 class="judul">Good Receipt</h3>
    </div>
    <hr>
    <div class="row justify-content-center mx-5">
        <?php Flasher::flash() ?>
    </div>
    <div class="row justify-content-center">
        <!-- Tanggal jam -->
        <div class="row justify-content-center">
            <div class="col-2">
                <strong>Material Number</strong>
                <form>
                    <select class="form-select" name="matrNumber" id="matrNumber" aria-label="Default select example">
                        <option value="">Pilih</option>
                        <option value="321-000025">321-000025</option>
                    </select>
                </form>
            </div>
            <div class="col-1">
                <strong>Status</strong>
                <form>
                    <select class="form-select" name="pilStatus" id="pilStatus" aria-label="Default select example">
                        <option value="">Pilih</option>
                        <option value="OK">OK</option>
                        <option value="NC">NC</option>
                        <option value="Reject">Reject</option>
                    </select>
                </form>
            </div>
            <div class="col-3">
                <strong>Start Up</strong>
                <form>
                    <input type="datetime-local" class="form-control" id="flatpickr1" placeholder="Select Date...">
                </form>
            </div>
            <div class="col-3">
                <strong>Turn Up</strong>
                <form>
                    <input type="datetime-local" class="form-control" id="flatpickr2" placeholder="Select Date...">
                </form>
            </div>
            <div class="col-1">
                <strong>Joint</strong>
                <form>
                    <select class="form-select" name="pilAngka" id="pilAngka" aria-label="Default select example">
                        <option value="">Pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </form>
            </div>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Pro Number</th>
                    <th scope="col">Matr Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Start</th>
                    <th scope="col">Finish</th>
                    <th scope="col">Joint</th>
                    <th scope="col">Panjang</th>
                    <th scope="col">Ukuran</th>
                    <th class="lebar-11">Defect</th>
                    <!-- <th scope="col">Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <form action="/home/posting" method="POST">
                    <?php
                    if (empty($data['batch'])) {
                    ?>
                        <tr>
                            <td colspan="11" class="text-center document-desc">
                                <h5><i>Tidak ada data untuk ditampilkan.</i></h5>
                            </td>
                        </tr>
                        <?php
                    } else {
                        $nomor = 1;
                        foreach ($data['batch'] as $bt) : ?>
                            <tr>
                                <th scope="row"><?= $nomor++; ?></th>
                                <td>
                                    <input type="text" name="batch[]" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bt['nm_batch']; ?>">
                                </td>
                                <td>
                                    <input type="text" name="product[]" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bt['id_product']; ?>">
                                </td>
                                <td>
                                    <div class="input-group  lebar-8">
                                        <input type="text" name="matrial[]" id="" value="" class="form-control matrial text-center">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group lebar">
                                        <input type="text" name="status[]" id="" value="" class="form-control status text-center">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group lebar-11">
                                        <input type="text" name="start[]" id="start[]" class="form-control start">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group lebar-11">
                                        <input type="text" name="finish[]" id="finish[]" class="form-control finish">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group lebar-3">
                                        <input type="text" name="angka[]" id="" class="form-control text-center angka">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group lebar">
                                        <input readonly type="text" name="panjang[]" id="" value="<?= $bt['panjang_qty']; ?>" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group lebar-4">
                                        <input readonly type="text" name="ukuran[]" id="" value="<?= $bt['qty_palet']; ?>" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <select class="form-select" name="defect[]" id="" aria-label="Default select example">
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
                                </td>
                                <!-- <td><button class="btn btn-primary">Posting</button></td> -->
                            </tr>
                            <!-- </form> -->
                        <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row px-3 justify-content-end">
            <button class="btn btn-primary col-3">Posting</button>
        </div>
        </form>

    <?php
                    }
    ?>
    </div>
</div>
<!-- </div> -->