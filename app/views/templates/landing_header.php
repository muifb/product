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
    </style>
    <!-- Jquery JS -->
    <script src="<?= BASEURL; ?>/assets/js/jquery.min.js"></script>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
        <div class="container ms-7 ps-5">
            <a class="navbar-brand" href="<?php echo BASEURL; ?>/home">Halaman Awal</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link <?php
                                        if ($data['nav'] == 'index') {
                                            echo 'active';
                                        }
                                        ?>" href="/landing/index">Home</a>
                    <a class="nav-link <?php
                                        if ($data['nav'] == 'product') {
                                            echo 'active';
                                        }
                                        ?>" href="/landing/product">Product</a>
                    <a class="nav-link <?php
                                        if ($data['nav'] == 'vismen') {
                                            echo 'active';
                                        }
                                        ?>" href="/landing/vismen">Vismen</a>
                    <a class="nav-link <?php
                                        if ($data['nav'] == 'oee') {
                                            echo 'active';
                                        }
                                        ?>" href="/landing/oee">OEE</a>
                    <!-- <a class="nav-link" href="#">Data Nc</a> -->
                    <!-- <a class="nav-link" href="#">Data Reject</a> -->
                </div>
                <!--  -->
                <!-- <div class="d-flex justify-content-end">
                    <strong class="navbar-brand fs-6 mx-4" id=""><?= tanggal_indo(date('Y-m-d'), true); ?></strong>
                    <strong class="navbar-brand fs-6" id="clock"></strong>
                </div> -->
            </div>
        </div>
        <a class="me-3 btn btn-outline-light btn-sm fw-bolder" href="/auth/index">
            Login
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
        </a>
    </nav>