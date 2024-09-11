<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> - Sistem Informasi Tracer Study Alumni Program Studi Sistem Informasi UIN Suska Riau</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?= env('ALUMNI'); ?>css/dashboard/dashboard.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/examples/modals/modals.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans+Mono:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="<?= env('ALUMNI'); ?>fontawesome/css/all.css" rel="stylesheet">
    <script src="<?= env('ALUMNI'); ?>tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
        :root {
            --bs-font-sans-serif: "Noto Sans", "Noto Sans Arabic", system-ui, -apple-system, sans-serif, "Noto Color Emoji";
            --bs-font-monospace: "Noto Sans Mono", "Courier New", monospace, "Noto Color Emoji";
            font-variant-numeric: proportional-nums;
        }

        .bg-gradient {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
        }

        .bg-gradient-header {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 20px, rgba(64, 64, 64, 0.15) 20px, rgba(192, 192, 192, 0.15) 100%) !important;
        }

        .bg-gradient-navbar {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 24px, rgba(64, 64, 64, 0.15) 24px, rgba(64, 64, 64, 0.15) 100%) !important;
        }

        .form-control::file-selector-button {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
        }

        .dropdown-menu {
            padding: 0.5rem 0.5rem;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
            color: var(--bs-dropdown-link-hover-color);
            background-color: var(--bs-dropdown-link-hover-bg);
            box-shadow: inset 0 0 0 1px var(--bs-dropdown-border-color);
        }

        .dropdown-item.active,
        .dropdown-item:active {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
            color: var(--bs-dropdown-link-active-color);
            text-decoration: none;
            background-color: var(--bs-dropdown-link-active-bg);
            box-shadow: inset 0 0 0 1px #0d6efd;
        }

        .date {
            font-variant-numeric: tabular-nums;
        }

        div.dt-buttons {
            display: flex;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: center;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            justify-content: center;
        }

        div.dataTables_wrapper div.dataTables_info {
            padding-top: 0;
            font-size: 1rem;
        }

        .nomor {
            font-variant-numeric: tabular-nums;
            -moz-appearance: textfield;
        }

        .nomor::-webkit-outer-spin-button,
        .nomor::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* #textarea {
      height: 360px;
      overflow: auto;
      resize: none;
    } */
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

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .modal {
            backdrop-filter: blur(50px);
        }

        .modal-backdrop {
            --bs-backdrop-opacity: 0;
        }

        .fade {
            transition: opacity 0.15s linear;
        }

        .modal.fade .modal-dialog {
            backdrop-filter: blur(50px);
            transition: transform 0.15s ease-in-out;
            transform: scale(0.9);
        }

        .modal.show .modal-dialog {
            backdrop-filter: blur(50px);
            transform: none;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <header class="navbar bg-body-secondary sticky-top flex-md-nowrap p-0 border-bottom bg-gradient-navbar" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
        <span class="navbar-brand col-md-3 col-lg-2 me-0 px-3 py-md-1 fs-6 text-start text-md-center lh-1"><span style="font-weight: 300;">Tracer Study</span><br><span style="font-weight: 500;">Sistem Informasi</span></span>
        <button class="navbar-toggler position-absolute d-md-none bg-gradient collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex flex-nowrap w-100 align-items-center">
            <div class="navbar-text w-100 px-3 text-truncate">
                <div class="d-flex align-items-center">
                    <div class="border borrder-2 border-primary rounded-pill me-2" style="background-image: url('<?= (session()->get('foto_user') == NULL) ? env('ALUMNI') . 'images/profile/blank.jpg' : (env('ALUMNI') . '/images/profile/' . session()->get('foto_user')); ?>'); background-color: #cccccc; width: 32px; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;"></div>
                    <span class="lh-1"><?= session()->get('nama_lengkap'); ?> <small class="text-muted">@<?= session()->get('username'); ?></small><br><span style="font-size: 8pt; font-weight: 500; letter-spacing: 2px;"><?= (session()->get('type') == 1) ? 'MASTER ADMIN' : ((session()->get('type') == 2) ? 'ADMIN' : ''); ?></span></span>
                </div>
            </div>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <button type="button" class="btn btn-danger btn-sm mx-3 my-2 bg-gradient" data-bs-toggle="modal" data-bs-target="#logoff1">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="modal modal-sheet p-4 py-md-5 fade" id="logoff1" tabindex="-1" aria-labelledby="logoff1" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Akhiri Sesi Anda?</h5>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <a class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end" href="<?= base_url('/logout-admin'); ?>">Ya</a>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENTS -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-secondary sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/home-admin'); ?>">
                                <div class="d-flex align-items-start">
                                    <div style="width: 24px; text-align: center;">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <div class="w-100 ms-2 text-body">
                                        Beranda
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/pengumuman-admin'); ?>">
                                <div class="d-flex align-items-start">
                                    <div style="width: 24px; text-align: center;">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </div>
                                    <div class="w-100 ms-2 text-body">
                                        Pengumuman
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/kuesioner-admin'); ?>">
                                <div class="d-flex align-items-start">
                                    <div style="width: 24px; text-align: center;">
                                        <i class="fa-solid fa-list-check"></i>
                                    </div>
                                    <div class="w-100 ms-2 text-body">
                                        Kuesioner
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/alumni-admin'); ?>">
                                <div class="d-flex align-items-start">
                                    <div style="width: 24px; text-align: center;">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </div>
                                    <div class="w-100 ms-2 text-body">
                                        Alumni
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php if (session()->get('type') == 1) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/admin'); ?>">
                                    <div class="d-flex align-items-start">
                                        <div style="width: 24px; text-align: center;">
                                            <i class="fa-solid fa-user-group"></i>
                                        </div>
                                        <div class="w-100 ms-2 text-body">
                                            Admin
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/profil-admin'); ?>">
                                <div class="d-flex align-items-start">
                                    <div style="width: 24px; text-align: center;">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="w-100 ms-2 text-body">
                                        Profil Anda
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/changepassword-admin'); ?>">
                                <div class="d-flex align-items-start">
                                    <div style="width: 24px; text-align: center;">
                                        <i class="fa-solid fa-key"></i>
                                    </div>
                                    <div class="w-100 ms-2 text-body">
                                        Ubah Kata Sandi
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- FOOTER -->
                    <div class="mx-2" style="font-size: 9pt;">
                        <hr>
                        <p class="text-center">&copy; 2023 <?= (date('Y') !== "2023") ? "- " . date('Y') : ''; ?> Program Studi Sistem Informasi UIN Suska Riau<br>Made with <a class="text-decoration-none" href="https://getbootstrap.com/" target="_blank">Bootstrap</a></p>
                    </div>
                </div>
            </nav>

            <?= $this->renderSection('content'); ?>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
            <script src="<?= env('ALUMNI'); ?>fontawesome/js/all.js"></script>
            <script src="<?= env('ALUMNI'); ?>js/dashboard/dashboard.js"></script>
            <script src="<?= env('ALUMNI'); ?>js/color-modes.js"></script>
            <?= $this->renderSection('datatable'); ?>
            <?= $this->renderSection('tinymce'); ?>
            <?= $this->renderSection('chartjs'); ?>
            <script>
                function previewImg() {
                    const foto = document.querySelector('#foto_user');
                    const imgPreview = document.querySelector('.img-preview');
                    const fileFoto = new FileReader();
                    fileFoto.readAsDataURL(foto.files[0]);
                    fileFoto.onload = function(e) {
                        imgPreview.src = e.target.result;
                    }
                }
            </script>
</body>

</html>