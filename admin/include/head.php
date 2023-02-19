<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo empty($title) == true ? "Clever Clothing" : $title  ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Animate css -->
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- sweet alert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <meta property="og:locale" content="en_US" />
  <meta property="og:title" content="Clever Clothing" />
  <meta property="og:site_name" content="Clever Clothing">
  <!-- <meta property="og:url" content="https://www.dnphub.in/" /> -->
  <meta property="og:description" content="Your Stop to but best quality clothes.">
  <meta property="og:type" content="website">
  <!-- <meta property="og:image" content="https://www.dnphub.in/dist/images/logo.png" /> -->
  <!-- <meta property="og:image:secure_url" content="https://www.dnphub.in/dist/images/logo.png" /> -->
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="50" />
  <meta property="og:image:height" content="50" />
  <meta property="og:image:alt" content="Clever Clothing" />
  <!-- favicon -->
  <link rel="manifest" href="manifest.json">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="application-name" content="Clever Clothing">
  <meta name="apple-mobile-web-app-title" content="Clever Clothing">
  <meta name="msapplication-starturl" content="/">
  <meta name="msapplication-TileColor" content="#fdbcae">
  <meta name="theme-color" content="#ff0000">
  <!-- <meta name="msapplication-TileImage" content="dist/images/favicon/ms-icon-144x144.png"> -->
  <link rel="apple-touch-icon" sizes="57x57" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../img/favicon_2.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon_2.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="../img/favicon_2.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon_2.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../img/favicon_2.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon_2.png">
  <style>
    .h1 {
      font-size: 1.7rem;
      text-align: center;
    }
    .h1::before,
    .h1::after {
      display: inline-block;
      content: "";
      border-top: .1rem solid blue;
      width: 05rem;
      margin: 0 1rem;
      transform: translateY(-0.4rem);
    }
    .select2-results__option[aria-selected=true] { display: none !important;}
  </style>
</head>