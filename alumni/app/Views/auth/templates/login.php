<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Sistem Informasi Tracer Study Alumni Program Studi Sistem Informasi UIN Suska Riau</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://getbootstrap.com/docs/5.3/examples/sign-in/sign-in.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans+Mono:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="<?= base_url('fontawesome/css/all.css'); ?>" rel="stylesheet">
  <style>
    :root {
      --bs-font-sans-serif: "Noto Sans", "Noto Sans Arabic", system-ui, -apple-system, sans-serif, "Noto Color Emoji";
      --bs-font-monospace: "Noto Sans Mono", "Courier New", monospace, "Noto Color Emoji";
      font-variant-numeric: proportional-nums;
    }

    body {
      background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('<?= base_url(); ?>images/web/Gerbang-UIN-Welcome-scaled.jpg');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }

    @media (prefers-color-scheme: dark) {
      body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url(); ?>images/web/Gerbang-UIN-Welcome-scaled.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }
    }

    .bg-gradient {
      background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
          rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
    }

    .bg-gradient-header {
      background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
          rgba(192, 192, 192, 0.2) 20px, rgba(64, 64, 64, 0.15) 20px, rgba(192, 192, 192, 0.15) 100%) !important;
    }

    .form-control::file-selector-button {
      background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
          rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
    }

    .form-signin .username {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
  </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary text-center" id="background">

  <?= $this->renderSection('content'); ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="<?= base_url('fontawesome/js/all.js'); ?>"></script>
  <script src="<?= base_url('js/color-modes.js'); ?>"></script>
</body>

</html>