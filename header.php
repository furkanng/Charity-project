<?php 
ob_start();
session_start();

error_reporting(E_ALL & ~E_NOTICE);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kurban Yardım Programı</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=EB+Garamond:wght@500;700&display=swap"
        rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="index">
                <img src="assets/images/logo-icon.ico" width="50px" alt="">
                <span class="text-dark h4">Kurban</span> <span class="text-primary h4">Bağış</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="hakkimizda">Biz Kimiz</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="yaptiklarimiz">Ne
                                Yapıyoruz</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="iletisim">İletişim</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-outline-success dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Oturum Aç
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="bagisyap">Bağış Yap</a></li>
                            <li><a class="dropdown-item" href="bagisal">Bağış Al</a></li>
                            <li><a class="dropdown-item" href="teknisyen">Teknisyen</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->


    <!-- İşlem başarılı alertinin javascript kodu (kodun bir süre sonra kaybolması için) -->
    <script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
    </script>