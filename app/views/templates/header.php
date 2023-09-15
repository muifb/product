<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produksi - <?= $data['judul']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='<?= BASEURL; ?>/assets/img/global/logo.svg' rel='shortcut icon'>
    <link href="<?= BASEURL; ?>/assets/css/index.css" rel="stylesheet">

    <style>
        .tombol {
            cursor: pointer;
        }

        .print-cetak {
            display: none;
        }

        @media print {
            .no-print {
                display: none;
            }

            .print-cetak {
                display: block;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <a href="/produksi/home" class="sidebar-logo">
            <div class="d-flex justify-content-start align-items-center">
                <img src="<?= BASEURL; ?>/assets/img/global/logo.svg" alt="">
                <span>LAPORAN PRODUKSI</span>
            </div>

            <button id="toggle-navbar" onclick="toggleNavbar()">
                <img src="<?= BASEURL; ?>/assets/img/global/navbar-times.svg" alt="">
            </button>
        </a>
        <h5 class="sidebar-title daily">Daily Use</h5>
        <a class="sidebar-item proses <?= $data['judul'] == 'Laporan Produksi' || $data['judul'] == 'Create Batch' ? 'active' : ''; ?>" href="/produksi/home">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span>Proses Produksi</span>
        </a>

        <a class="sidebar-item produksi <?= $data['judul'] == 'Data Product' ? 'active' : ''; ?>" href="/produksi/product">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 12C21 13.66 17 15 12 15C7 15 3 13.66 3 12" stroke="#F19E59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 8C16.9706 8 21 6.65685 21 5C21 3.34315 16.9706 2 12 2C7.02944 2 3 3.34315 3 5C3 6.65685 7.02944 8 12 8Z" stroke="#F19E59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#F19E59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span>Data Produksi</span>
        </a>

        <a class="sidebar-item output <?= $data['judul'] == 'Data Output Product' ? 'active' : ''; ?>" href="/produksi/output">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM4 19V7h16l.002 12H4z"></path>
                <path d="M7 14h3v3h4v-3h3l-5-5z"></path>
            </svg>

            <span>Data Output Produksi</span>
        </a>

        <!-- <a class="sidebar-item vismen" href="/vismen">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                        <path d="m21.484 7.125-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5a1 1 0 0 0-.002-1.749z"></path>
                        <path d="m12 15.856-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.971-1.748L12 15.856z"></path>
                        <path d="m12 19.856-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.971-1.748L12 19.856z"></path>
                    </svg>

                    <span>Vismen List Order</span>
                </a> -->

        <h5 class="sidebar-title">Others</h5>

        <a class="sidebar-item <?= $data['judul'] == 'Lost Time Product' ? 'active' : ''; ?>" href="/produksi/lost">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm.002 16H5V8h14l.002 12z"></path>
                <path d="M11 10h2v5h-2zm0 6h2v2h-2z"></path>
            </svg>

            <span>Lost Time Product</span>
        </a>

        <a class="sidebar-item <?= $data['judul'] == 'Data Product OK' ? 'active' : ''; ?>" href="/produksi/ok">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="M22 8a.76.76 0 0 0 0-.21v-.08a.77.77 0 0 0-.07-.16.35.35 0 0 0-.05-.08l-.1-.13-.08-.06-.12-.09-9-5a1 1 0 0 0-1 0l-9 5-.09.07-.11.08a.41.41 0 0 0-.07.11.39.39 0 0 0-.08.1.59.59 0 0 0-.06.14.3.3 0 0 0 0 .1A.76.76 0 0 0 2 8v8a1 1 0 0 0 .52.87l9 5a.75.75 0 0 0 .13.06h.1a1.06 1.06 0 0 0 .5 0h.1l.14-.06 9-5A1 1 0 0 0 22 16V8zm-10 3.87L5.06 8l2.76-1.52 6.83 3.9zm0-7.72L18.94 8 16.7 9.25 9.87 5.34zM4 9.7l7 3.92v5.68l-7-3.89zm9 9.6v-5.68l3-1.68V15l2-1v-3.18l2-1.11v5.7z"></path>
            </svg>

            <span>Data Product OK</span>
        </a>

        <a class="sidebar-item <?= $data['judul'] == 'Data Product NC' ? 'active' : ''; ?>" href="/produksi/nc">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="m20.48 6.105-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.99.99 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014a1.001 1.001 0 0 0-.548-.795zm-8.447 13.792C5.265 16.625 4.944 9.642 4.999 7.635l7.034-3.517 7.029 3.515c.038 1.989-.328 9.018-7.029 12.264z"></path>
                <path d="M14.293 8.293 12 10.586 9.707 8.293 8.293 9.707 10.586 12l-2.293 2.293 1.414 1.414L12 13.414l2.293 2.293 1.414-1.414L13.414 12l2.293-2.293z"></path>
            </svg>

            <span>Data Product NC</span>
        </a>
        <a class="sidebar-item reject <?= $data['judul'] == 'Data Product Reject' ? 'active' : ''; ?>" href="/produksi/reject">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="M3 20c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15zM5 5h2v2h10V5h2v15H5V5z"></path>
                <path d="M14.292 10.295 12 12.587l-2.292-2.292-1.414 1.414 2.292 2.292-2.292 2.292 1.414 1.414L12 15.415l2.292 2.292 1.414-1.414-2.292-2.292 2.292-2.292z"></path>
            </svg>

            <span>Data Product Reject</span>
        </a>

        <a class="sidebar-item reject <?= $data['judul'] == 'Data OEE' ? 'active' : ''; ?>" href="/produksi/oee">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                <path d="M3 20c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15zM5 5h2v2h10V5h2v15H5V5z"></path>
                <path d="M14.292 10.295 12 12.587l-2.292-2.292-1.414 1.414 2.292 2.292-2.292 2.292 1.414 1.414L12 15.415l2.292 2.292 1.414-1.414-2.292-2.292 2.292-2.292z"></path>
            </svg>

            <span>OEE</span>
        </a>

        <!-- <a class="sidebar-item lost" href="/user">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(171, 179, 196, 1);">
                        <path d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z"></path>
                    </svg>


                    <span>Profile User</span>
                </a> -->

        <a class="sidebar-item" href="/auth/logout" id="logout">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 17L21 12L16 7" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21 12H9" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>


            <span>Logout</span>
        </a>

    </aside>


    <main class="mian" id="main">
        <nav class="nav no-print">
            <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                <button class="btn-notif d-block d-md-none"><img src="<?= BASEURL; ?>/assets/img/global/bell.svg" alt=""></button>
            </div>
            <div class="d-flex justify-content-between align-items-center nav-input-container">
                <button class="btn-notif d-none d-md-block" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile" onclick="document.location='/produksi/profile'"><img src="<?= BASEURL; ?>/assets/img/global/profile.svg" alt=""></button>
            </div>
        </nav>
        <section class="content" id="content">