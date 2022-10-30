<?php include 'header.php';

$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(

    'id' => 1

));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">

                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-4">Admin Bilgileri</h6>
                    </div>
                    <div class="col-sm-6">

                        <?php

                        if (!empty($_SESSION['durum'] == "ok")) { ?>

                            <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!
                            </div>

                        <?php

                            unset($_SESSION['durum']);
                        } elseif (!empty($_SESSION['durum'] == "no")) { ?>

                            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!
                            </div>

                        <?php unset($_SESSION['durum']);
                        };


                        ?>

                    </div>

                </div>

                <?php

                $isim = explode(" ", $kullanicicek['kullanici_adsoyad']);

                ?>


                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">Kayıt Tarihi</label>
                            <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_zaman']; ?>">
                        </div>
                        <div class="col"><label class="form-label">İD</label>
                            <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">Ad</label>
                            <input type="text" class="form-control" value="<?php echo $isim[0]; ?>">
                        </div>
                        <div class="col"><label class="form-label">Soyad</label>
                            <input type="text" class="form-control" value="<?php echo $isim[1]; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">TC</label>
                            <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_tc']; ?>">
                        </div>
                        <div class="col"><label class="form-label">Mail</label>
                            <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_mail']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">İl</label>
                            <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_il']; ?>">
                        </div>
                        <div class="col"><label class="form-label">İlçe</label>
                            <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_ilce']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Adres</label>
                    <input type="text" class="form-control" value="<?php echo $kullanicicek['kullanici_adres']; ?>">
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Admin Resim</h6>
                <div class="mb-3 d-flex justify-content-center">
                    <img class="border border-success" height="400" src="img/user.jpg" class="d-block rounded">
                    <br>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Form End -->

<?php include 'footer.php'; ?>