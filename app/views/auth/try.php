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

    <div class="form-signin">
        <div class="row">
            <div class="col-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(139, 0, 0, 1);">
                    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path>
                </svg>
            </div>
            <div class="col-9">
                <h5 class="mb-3 text-danger"><strong>Program out of date.!</strong> </h5>
            </div>
            <div class="col-2 mt-3">
                <div id="preloader_1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="row px-3 justify-content-center">
            <a href="<?= BASEURL; ?>" class="btn btn-sm btn-danger col-3">OK</a>
        </div>
    </div>

    <script>
        var BASEURL = '<?= BASEURL; ?>';
    </script>
    <script src="<?= BASEURL; ?>/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/flatpickr.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/Datatables/datatables.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/Datatables/DataTables/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/script.js"></script>
</body>

</html>