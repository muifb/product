<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Produksi - <?= $data['judul']; ?></title>
    <!-- Favicon-->
    <link href='<?= BASEURL; ?>/assets/img/global/logo.svg' rel='shortcut icon'>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="<?= BASEURL; ?>/assets/css/index.css" rel="stylesheet" />
    <link href="<?= BASEURL; ?>/assets/css/flatpickr.min.css" rel="stylesheet" />
    <style>
        .main {
            margin-left: 7em;
            margin-right: 6em;
        }

        .btn-light:hover {
            color: #fff;
            background-color: #bdbdbd;
            border-color: #9e9e9e;
        }

        .ms-7 {
            margin-left: 5rem !important;
        }

        .text-small {
            font-size: 85%;
        }
    </style>
    <!-- Jquery JS -->
    <script src="<?= BASEURL; ?>/assets/js/jquery.min.js"></script>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
        <div class="container-fluid ms-5">
            <a class="navbar-brand" href="/vismen/list">Laporan Produksi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            if ($data['nav'] == 'vismen') {
                                                echo 'active';
                                            }
                                            ?>" href="<?= APPURL; ?>/vismen/list">Vismen</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php
                    if (isset($_SESSION['login-admin'])) {
                    ?>
                        <div class="dropdown navbar-text">
                            <a href="#" class="text-decoration-none dropdown-toggle mx-4" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-white"><strong><?= $_SESSION['login-admin']['nama']; ?></strong></span>
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li>
                                    <a class="dropdown-item text-dark" href="/admin-ppic">
                                        <strong>Admin PPIC</strong>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-dark" href="/admin-ppic">
                                        <strong><?= $_SESSION['login-admin']['nik']; ?></strong>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-dark" href="/auth/logout" id="logout">
                                        Sign out <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a class="me-3 btn btn-outline-light btn-sm" href="/auth/login">
                            Login
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>