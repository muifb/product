<style>
    .form-lost {
        max-width: 70em !important;
    }
</style>
<div class="container form-lost">
    <div class=""><?php Flasher::flash() ?></div>
    <?php $vs = $data['vismen']; ?>
    <div class="p-2 p-lg-3 bg-gray rounded-top ">
        <div class="row justify-content-between">
            <div class="col-8">
                <h2 class="text-light">LOST TIME PRO <?= $vs['id_product']; ?></h2>
            </div>
        </div>
    </div>
    <div class="p-2 p-lg-3 bg-light-gray rounded-bottom">
        <form action="/lost/store" class="px-5 py-3" method="post">
            <input type="hidden" name="nik" value="<?= $_SESSION['login']['nik']; ?>">
            <input type="hidden" name="kel_shift" value="<?= $_SESSION['login']['shift']; ?>">
            <input type="hidden" name="id_product" value="<?= $vs['id_product']; ?>">
            <div class="row mb-3">
                <label for="jenisLostTime" class="col-sm-4 col-form-label text-end">Jenis Lost Time</label>
                <div class="col-sm-3">
                    <select class="form-select jenis" id="jenisLostTime" name="kategori_lt" required>
                        <option value="LOST TIME PRODUCTION">PRODUCTION</option>
                        <option value="LOST TIME MAINTENANCE">MAINTENANCE</option>
                        <option value="LOST TIME PPIC">PPIC</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-end">Tanggal Lost Time</label>
                <div class="col-sm-3">
                    <input type="datetime-local" class="flatpickr-input" name="tgl_lost" id="tanggalLost" placeholder="Select Date Start..." required>
                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <label class="form-label">Mulai</label>
                            <input type="datetime-local" class="flatpickr-input waktu" name="jam_mulai" id="waktuStart" placeholder="Jam..." required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Selesai</label>
                            <input type="datetime-local" class="flatpickr-input waktu" name="jam_selesai" id="waktuStop" placeholder="Jam..." required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="reasonLt" class="col-sm-4 col-form-label text-end">Sebab Lost Time</label>
                <div class="col-sm-4">
                    <input type="text" name="sebab_lt" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="reasonLt" class="col-sm-4 col-form-label text-end">Reason Lost Time</label>
                <div class="col-sm-4">
                    <select class="form-select" id="reasonLt" name="jenis_lt" required>
                        <option value="human error">HUMAN ERROR</option>
                        <option value="istirahat">ISTIRAHAT</option>
                        <option value="change material & jr/job">CHANGE MATERIAL & JR/JOB</option>
                        <option value="change counter + knife">CHANGE COUNTER + KNIFE</option>
                        <option value="join / web break">JOIN / WEB BREAK</option>
                        <option value="no operator">NO OPERATOR</option>
                        <option value="start up">START UP</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="selisihMinute" class="col-sm-4 col-form-label text-end">Lost Time Duration(minute)</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="selisih_menit" id="selisihMinute" required readonly>
                </div>
            </div>
            <div class="row mb-1">
                <label for="selisihHour" class="col-sm-4 col-form-label text-end">Lost Time Duration(hour)</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="selisih_jam" id="selisihHour" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">&nbsp;</div>
                <div class="col-sm-8">
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        <a href="/lost" class="btn btn-danger mt-4">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const jenisLt = document.querySelector('#jenisLostTime');
    const reasonLt = document.querySelector('#reasonLt');
    jenisLt.addEventListener('change', () => {
        const selectedValues = [].filter
            .call(jenisLt.options, option => option.selected)
            .map(option => option.text);
        const bawaan = [
            "Pilih Jenis"
        ];
        const maintenance = [
            "MTC SHUTDOWN",
            "WATER CLEANER Breakdown /Failure",
            "COMMPRESSOR Breakdown / Failure",
            "ELECTRICAL Breakdown / Failure",
            "ELECTRICAL SHUTDOWN",
            "MECHANICAL Breakdown / Failure",
            "MECHANICAL SHUTDOWN",
            "PLN"
        ];
        const production = [
            "HUMAN ERROR",
            "ISTIRAHAT",
            "CHANGE MATERIAL & JR/BOB",
            "CHANGE COUNTER + KNIFE",
            "JOIN / WEB BREAK",
            "NO OPERATOR",
            "START UP"
        ];
        const ppic = [
            "PPIC"
        ];
        if (selectedValues == "MAINTENANCE") {
            const options = maintenance.map(mt => {
                const value = mt.toLowerCase();
                return `<option value="${value}">${mt}</option>`;
            });
            reasonLt.innerHTML = options;
        } else if (selectedValues == "PRODUCTION") {
            const options = production.map(pro => {
                const value = pro.toLowerCase();
                return `<option value="${value}">${pro}</option>`;
            });
            reasonLt.innerHTML = options;
        } else if (selectedValues == "PPIC") {
            const options = ppic.map(pp => {
                const value = pp.toLowerCase();
                return `<option value="${value}">${pp}</option>`;
            });
            reasonLt.innerHTML = options;
        } else {
            const options = bawaan.map(b => {
                return `<option value="">${b}</option>`;
            });
            reasonLt.innerHTML = options;
        }
    })
</script>