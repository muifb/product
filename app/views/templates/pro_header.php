<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL - <?= $data['judul']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='<?= BASEURL; ?>/assets/img/global/logo.svg' rel='shortcut icon'>
    <link href="<?= BASEURL; ?>/assets/css/index.css" rel="stylesheet">

    <style>
        .lebar-3 {
            width: 3em !important;
        }

        .lebar-4 {
            width: 4em !important;
        }

        .lebar {
            width: 5em !important;
        }

        .lebar-6 {
            width: 6em !important;
        }

        .lebar-7 {
            width: 6.5em !important;
        }

        .lebar-8 {
            width: 7.3em !important;
        }

        .lebar-9 {
            width: 9em !important;
        }

        .lebar-10 {
            width: 9.5em !important;
        }

        .lebar-11 {
            width: 10.5em !important;
        }

        .lebar-12 {
            width: 11.5em !important;
        }

        .lebar-date {
            width: 14em !important;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
        <div class="container container-fluid">
            <a class="navbar-brand" href="/home" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Halaman Awal">Laporan Produksi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/home" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Halaman Awal">Home</a>
                    <!-- <a class="nav-link" href="#">Product</a>
                    <a class="nav-link" href="#">Output</a>
                    <a class="nav-link" href="#">Vismen</a>
                    <a class="nav-link" href="#">Data Nc</a>
                    <a class="nav-link" href="#">Data Reject</a> -->
                </div>
                <!--  -->
                <strong class="navbar-brand fs-6 mx-4" id=""><?= tanggal_indo(date('Y-m-d'), true); ?></strong>
                <strong class="navbar-brand fs-6" id="clock"></strong>
            </div>
            <span class="document-desc text-white">User : <strong><?= $_SESSION['login']['nik']; ?></strong></span>
            <span class="document-desc text-white mx-3"><strong><?= $_SESSION['login']['nama']; ?></strong></span>
        </div>
        <a class="navbar-brand fs-6 me-4" href="/auth/logout" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Keluar">
            <span>Logout</span>
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </nav>