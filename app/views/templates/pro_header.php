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
    <link href="<?= BASEURL; ?>/assets/css/flatpickr.min.css" rel="stylesheet" />

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

        .text-small {
            font-size: 85%;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
        <div class="container-fluid mx-3">
            <a class="navbar-brand" href="/produksi/home" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Halaman Awal">Laporan Produksi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/produksi/home" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Halaman Awal">Home</a>
                        <!-- <a class="nav-link" href="#">Product</a>
                        <a class="nav-link" href="#">Output</a>
                        <a class="nav-link" href="#">Vismen</a>
                        <a class="nav-link" href="#">Data Nc</a>
                        <a class="nav-link" href="#">Data Reject</a> -->
                    </li>
                    <strong class="navbar-text text-white fs-6 mx-4" id=""><?= Tanggal::tanggal_indo(date('Y-m-d'), true); ?></strong>
                    <strong class="navbar-text text-white fs-6" id="clock"></strong>
                </ul>
                <!--  -->
                <div class="d-flex">
                    <span class="navbar-text text-white">User : <strong><?= $_SESSION['login']['nik']; ?></strong></span>
                    <div class="dropdown navbar-text">
                        <a href="#" class="text-decoration-none dropdown-toggle mx-4" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-white"><strong><?= $_SESSION['login']['nama']; ?></strong></span>
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li>
                                <a class="dropdown-item text-dark" href="/produksi/profile">
                                    <i class="fa-regular fa-user"></i> &ensp;Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-dark" href="/auth/logout" id="logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&ensp;Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>