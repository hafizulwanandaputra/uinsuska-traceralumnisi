<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Tracer Study Alumni Program Studi Sistem Informasi UIN Suska Riau</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans+Mono:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="<?= base_url('fontawesome/css/all.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('tinymce/js/tinymce/tinymce.min.js'); ?>"></script>
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
                    rgba(192, 192, 192, 0.2) 28px, rgba(64, 64, 64, 0.15) 28px, rgba(64, 64, 64, 0.15) 100%) !important;
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
    <nav class="navbar navbar-expand-md fixed-top bg-gradient bg-body-secondary border-bottom" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
        <div class="container">
            <span class="navbar-brand me-0 py-md-1 fs-6 text-start lh-1"><span style="font-weight: 300;">Tracer Study</span><br><span style="font-weight: 500;">Sistem Informasi</span></span>
            <div class="vr d-none d-md-block mx-3"></div>
            <button class="navbar-toggler bg-gradient" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar" aria-controls="navbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbar" aria-labelledby="navbarLabel">
                <div class="offcanvas-header py-2 bg-gradient border-bottom">
                    <h5 class="offcanvas-title fs-6 lh-1" id="navbarLabel">
                        <span style="font-weight: 300;">Tracer Study</span><br><span style="font-weight: 500;">Sistem Informasi</span>
                    </h5>
                    <button type="button" class="btn btn-danger btn-sm bg-gradient ps-0 pe-0 pt-0 pb-0" data-bs-dismiss="offcanvas" aria-label="Close"><span data-feather="x" class="mb-0" style="width: 30px; height: 30px;"></span></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/about') ?>">Tentang Kami</a>
                        </li>
                    </ul>
                    <hr class="d-block d-md none">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn-group" role="group">
                            <button class="btn btn-secondary bg-gradient dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-right-to-bracket"></i> Login
                            </button>
                            <ul class="dropdown-menu dropdown-menu-md-end w-100" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                                <li><a class="dropdown-item rounded-1" href="<?= env('ADMIN'); ?>">Login Admin</a></li>
                                <li><a class="dropdown-item rounded-1" href="<?= base_url('/login'); ?>">Login Alumni</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?= $this->renderSection('content'); ?>
    <!-- FOOTER -->
    <div class="bg-body-secondary pt-3 pb-1 mb-0">
        <div class="container" style="font-size: 9pt;">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <div class="col">
                    <h6 class="border-bottom border-primary pb-1">Alamat Kami</h6>
                    <p>Program Studi Sistem Informasi Fakultas Sains dan Teknologi UIN Sultan Syarif Kasim Riau<br />
                        <small>Jl. Soebrantas, KM. 15, Pekanbaru Riau<br />
                            e-Mail: faste.sif@uin-suska.ac.id | IG: <a class="text-decoration-none" href="https://instagram.com/si.uin.suska?igshid=MzRlODBiNWFlZA==" target="_blank" rel="noopener">@si.uin.suska</a> | YouTube: <a class="text-decoration-none" href="https://youtube.com/@media-si5436?feature=shared" target="_blank" rel="noopener">MEDIA-SI</a>
                        </small>
                    </p>
                </div>
                <div class="col">
                    <h6 class="border-bottom border-primary pb-1">Tautan Berguna</h6>
                    <ul>
                        <li><a class="text-decoration-none" href="https://uin-suska.ac.id" target="_blank" rel="noopener">Website Kampus</a></li>
                        <li><a class="text-decoration-none" href="https://fst.uin-suska.ac.id" target="_blank" rel="noopener">Website Fakultas</a></li>
                        <li><a class="text-decoration-none" href="https://sif.uin-suska.ac.id" target="_blank" rel="noopener">Website Program Studi</a></li>
                        <li><a class="text-decoration-none" href="https://pmb.uin-suska.ac.id/" target="_blank" rel="noopener">Mahasiswa Baru</a></li>
                        <li><a class="text-decoration-none" href="https://iraisenew.uin-suska.ac.id" target="_blank" rel="noopener">iRaise</a></li>
                        <li><a class="text-decoration-none" href="https://elearning.uin-suska.ac.id/login/index.php" target="_blank" rel="noopener">e-Learning</a></li>
                        <li><a class="text-decoration-none" href="https://ejournal.uin-suska.ac.id/index.php/RMSI" target="_blank" rel="noopener">Jurnal RMSI</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h6 class="border-bottom border-primary pb-1">Produk Mahasiswa</h6>
                    <ul>
                        <li>Sistem Tugas Akhir (SITASI)</li>
                        <li>Sistem Kerja Praktek (SIKAPE)</li>
                        <li>Sistem Repositori (SIREPO)</li>
                        <li>Sistem Inventaris Labor (SITARIS)</li>
                        <li>Sistem Pengunjung Labor (LABVIS)</li>
                        <li>Sistem Penulisan TA (SmartTA)</li>
                    </ul>
                </div>
                <div class="col">
                    <h6 class="border-bottom border-primary pb-1">Tim Riset & Study Club</h6>
                    <ul>
                        <li><a class="text-decoration-none" href="https://isnc.uin-suska.ac.id" target="_blank" rel="noopener">ISNC</a></li>
                        <li>ISOC</li>
                        <li>Pro-Knowledge</li>
                        <li>FOSSDEV</li>
                        <li>IT-GOES</li>
                        <li>MEDIASI</li>
                    </ul>
                </div>
                <div class="col d-none d-md-block"></div>
                <div class="col">
                    <h6 class="border-bottom border-primary pb-1">Kunjungi Kami</h6>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d249.35532347167288!2d101.35590695705991!3d0.46808462561047776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1700152221064!5m2!1sid!2sid" width="100%" height="140px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col">
                    <h6 class="border-bottom border-primary pb-1">Dukungan</h6>
                    <ul>
                        <li><a class="text-decoration-none" href="https://aisnet.org/" target="_blank" rel="noopener">Asosiasi AIS (International)</a></li>
                        <li><a class="text-decoration-none" href="https://aisindo.or.id/" target="_blank" rel="noopener">Asosiasi AISINDO (Indonesia)</a></li>
                        <li><a class="text-decoration-none" href="https://aptikom.org/" target="_blank" rel="noopener">Asosiasi APTIKOM (Indonesia)</a></li>
                        <li><a class="text-decoration-none" href="https://ptipd.uin-suska.ac.id/" target="_blank" rel="noopener">PTIPD UIN Suska Riau</a></li>
                        <li><a class="text-decoration-none" href="https://www.instagram.com/ikasi_uinsuskariau" target="_blank" rel="noopener">IKASI (Alumni SIF)</a></li>
                        <li><a class="text-decoration-none" href="https://isnc.uin-suska.ac.id" target="_blank" rel="noopener">ISNC Research</a></li>
                        <li><a class="text-decoration-none" href="#" target="_blank" rel="noopener">Asisten Lab SI</a></li>
                        <li><a class="text-decoration-none" href="#" target="_blank" rel="noopener">MEDIASI Team</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-primary border-1 opacity-100">
            <p class="text-center">&copy; 2023 <?= (date('Y') !== "2023") ? "- " . date('Y') : ''; ?> Program Studi Sistem Informasi - Made with <a class="text-decoration-none" href="https://getbootstrap.com/" target="_blank">Bootstrap</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="<?= base_url('fontawesome/js/all.js'); ?>"></script>
    <script src="<?= base_url('js/color-modes.js'); ?>"></script>
    <?= $this->renderSection('chartjs'); ?>
    <script>
        feather.replace({
            'aria-hidden': 'true'
        });
    </script>
</body>

</html>