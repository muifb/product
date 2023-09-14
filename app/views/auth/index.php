<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL - Signin</title>
    <link href='<?= BASEURL; ?>/assets/img/global/logo.svg' rel='shortcut icon'>
    <link href="<?= BASEURL; ?>/assets/css/index.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/css/signin.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body class="text-center bg-primary">

    <div class="form-signin bg-light">
        <form action="/auth/login" method="POST">
            <img class="mb-4" src="<?= BASEURL; ?>/assets/img/global/logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="row">
                <div class="col-lg">
                    <?php Flasher::flash() ?>
                </div>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control nik" name="nik" id="nik" required>
                <label for="floatingInput">NIK Operator</label>
            </div>
            <div class="form-floating">
                <select class="form-select" name="shift" id="shift" required>
                    <option value="" selected></option>
                    <?php foreach ($data['shift'] as $shift) : ?>
                        <option value="<?= $shift['id_shift']; ?>"><?= $shift['kel_shift']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="floatingSelect">Shift/Group</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control no-pro" name="noPro" id="noPro" required>
                <label for="floatingInput">No. Pro</label>
            </div>

            <div class="row">
                <button class="col ms-3 me-3 btn btn-lg btn-primary" type="submit">Sign in</button>
                <a href="/vismen/list" class="col me-3 btn btn-lg btn-secondary" type="submit">Vismen</a>
                <p class="mt-5 mb-3 text-muted">&copy; Skripsi - Laporan Product <?= date('Y'); ?></p>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>