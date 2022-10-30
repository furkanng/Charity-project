<?php include 'header.php';


$bagiscisor = $db->prepare("SELECT * FROM bagisci where bagisci_id DESC");
$bagiscisor->execute();
$bagiscicek = $bagiscisor->fetch(PDO::FETCH_ASSOC);

$desteksor = $db->prepare("SELECT * FROM destek order by destek_id DESC");
$desteksor->execute();

?>
<?php

if (!empty($_SESSION['giris'] == "basarili")) { ?>

    <div class="p-2 mb-2 bg-success text-white alert" align="center" role="alert">Giriş Başarılı!</div>


<?php

    unset($_SESSION['giris']);
};


?>

<!-- Üst veriler başlangıç -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Toplam Bağış (₺)</p>
                    <h6 class="mb-0"><?php echo $toplamTutar; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Bağışcı Sayısı</p>
                    <h6 class="mb-0"><?php echo $toplamBagisci; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Gönüllü Sayısı</p>
                    <h6 class="mb-0"><?php echo $toplamGonullu; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Teknisyen Sayısı</p>
                    <h6 class="mb-0"><?php echo $toplamTeknisyen; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Üst veriler bitiş -->


<!-- burası boş ilerde dolacak-->

<!-- burası boş ilerde dolacak-->


<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0">Mesajlar</h6>
                    <a href="iletisim">Tümü Göster</a>
                </div>

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


                    <div class="d-flex align-items-center pt-3">
                        <?php
                        if (!empty($ybagiscicek['bagisci_resim']) > 0) { ?>
                            <img src="../../<?php echo $ybagiscicek['bagisci_resim']; ?>" style="width: 40px; height: 40px;" class="rounded-circle flex-shrink-0">
                        <?php } else { ?>
                            <img src="../../bagisci-panel/assets/img/avatars/profil.png" style="width: 40px; height: 40px;" class="rounded-circle flex-shrink-0">
                        <?php }
                        ?>
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0"><?php echo $destekcek['destek_ad']; ?></h6>
                                <small><?php echo $zaman[0]; ?></small>
                            </div>
                            <span><?php echo substr($destekcek['destek_mesaj'], 0, 35); ?>...</span>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Takvim</h6>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Yapılacaklar</h6>
                </div>
                <form action="../netting/islem.php" method="POST">
                    <div class="d-flex mb-2">
                        <input class="form-control bg-dark border-0" type="text" name="yapilacak_is" placeholder="Görev Giriniz">
                        <button type="submit" name="yapilacakEkle" class="btn btn-primary ms-2">Ekle</button>
                    </div>
                </form>
                <?php
                $yapilacaksor = $db->prepare("SELECT * FROM yapilacak order by yapilacak_id DESC");
                $yapilacaksor->execute();

                while ($yapilacakcek = $yapilacaksor->fetch(PDO::FETCH_ASSOC)) { ?>

                    <div class="d-flex align-items-center pt-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span><?php echo $yapilacakcek['yapilacak_is']; ?></span>
                                <a href="../netting/islem.php?yapilacak_id=<?php echo $yapilacakcek['yapilacak_id']; ?>&yapilacaksil=ok"><button class="btn btn-sm"><i class="fa fa-times"></i></button></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->

<?php include 'footer.php'; ?>