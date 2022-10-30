<?php
ob_start();
session_start();

include '../netting/baglan.php';

$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(

    'mail' => $_SESSION['kullanici_mail']

));
$say = $kullanicisor->rowCount();
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['kullanici_mail'])) {
    header("Location:login");
}

$bagiscisor = $db->prepare("SELECT * FROM bagisci where bagisci_id DESC");
$bagiscisor->execute();
$bagiscicek = $bagiscisor->fetch(PDO::FETCH_ASSOC);

$desteksor = $db->prepare("SELECT * FROM destek order by destek_id DESC");
$desteksor->execute();

/* toplam fiyat sorgusu */
$bilgi = $db->query("SELECT sum(odenecek_tutar) FROM siparis");
while ($row = $bilgi->fetch()) {
    $toplamTutar = $row[0];
}
/* toplam bağışcı sorgusu */
$bilgi2 = $db->query("SELECT COUNT(*) FROM bagisci");
while ($row = $bilgi2->fetch()) {
    $toplamBagisci = $row[0];
}
/* toplam gönüllü sorgusu */
$bilgi3 = $db->query("SELECT COUNT(*) FROM yoksul");
while ($row = $bilgi3->fetch()) {
    $toplamGonullu = $row[0];
}
/* toplam teknisyen sorgusu */
$bilgi4 = $db->query("SELECT COUNT(*) FROM teknisyen");
while ($row = $bilgi4->fetch()) {
    $toplamTeknisyen = $row[0];
}



error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />


    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Yükleniyor...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-code me-2"></i>Yönetim</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Furkan NG</h6>
                        <span>admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">

                    <a href="index" class="nav-item nav-link"><i class="fa fa-home me-2"></i>Ana Sayfa</a>
                    <a href="bagiscilar" class="nav-item nav-link"><i class="fa fa-star-o me-2"></i>Bağışcı Verileri</a>
                    <a href="gonulluler" class="nav-item nav-link"><i class="fa fa-star-o me-2"></i>Gönüllü Verileri</a>
                    <a href="teknisyenler" class="nav-item nav-link"><i class="fa fa-star-o me-2"></i>Teknisyen Verileri</a>
                    <a href="iletisim" class="nav-item nav-link"><i class="fa fa-comments-o me-2"></i>İletişim</a>
                    <a href="siparisler" class="nav-item nav-link"><i class="fa fa-bar-chart me-2"></i>Siparişler</a>
                    <a href="yardim-talep" class="nav-item nav-link"><i class="fa fa-bars me-2"></i>Yardım Talepleri</a>
                    <a href="basvuru-talep" class="nav-item nav-link"><i class="fa fa-bars me-2"></i>Başvuru Talepleri</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Mesajlar</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">


                            <?php while ($destekcek = $desteksor->fetch(PDO::FETCH_ASSOC)) {

                                $ybagisci_id = $destekcek['bagisci_id'];

                                $ybagiscisor = $db->prepare("SELECT * FROM bagisci where bagisci_id=:id");
                                $ybagiscisor->execute(array(

                                    'id' => $ybagisci_id

                                ));

                                $ybagiscicek = $ybagiscisor->fetch(PDO::FETCH_ASSOC);


                            ?>

                                <?php

                                $zaman = explode(" ", $destekcek['destek_zaman']);

                                ?>


                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <?php
                                        if (!empty($ybagiscicek['bagisci_resim']) > 0) { ?>
                                            <img src="../../<?php echo $ybagiscicek['bagisci_resim']; ?>" style="width: 40px; height: 40px;" class="rounded-circle">
                                        <?php } else { ?>
                                            <img src="../../bagisci-panel/assets/img/avatars/profil.png" style="width: 40px; height: 40px;" class="rounded-circle">
                                        <?php }
                                        ?>
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0"><?php echo $destekcek['destek_ad']; ?></h6>
                                            <small><?php echo $zaman[0]; ?></small>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>

                            <hr class="dropdown-divider">
                            <a href="iletisim" class="dropdown-item text-center">Tüm mesajları gör</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Furkan NG</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="profilim" class="dropdown-item">Profilim</a>
                            <a href="logout" class="dropdown-item">Güvenli Çıkış</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- İşlem başarılı alertinin javascript kodu (kodun bir süre sonra kaybolması için) -->
            <script type="text/javascript">
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 2000);
            </script>