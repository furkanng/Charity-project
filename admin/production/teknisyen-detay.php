<?php include 'header.php';

$teknisyensor = $db->prepare("SELECT * FROM teknisyen where teknisyen_id=:id");
$teknisyensor->execute(array(

    'id' => $_GET['teknisyen_id']

));
$teknisyencek = $teknisyensor->fetch(PDO::FETCH_ASSOC);
?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">

                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-4">Gönüllü Bilgileri</h6>
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


                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">Kayıt Tarihi</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_zaman']; ?>">
                        </div>
                        <div class="col"><label class="form-label">İD</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_id']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">Ad</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_ad']; ?>">
                        </div>
                        <div class="col"><label class="form-label">Soyad</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_soyad']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">TC</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_tc']; ?>">
                        </div>
                        <div class="col"><label class="form-label">Mail</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_mail']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">İl</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_il']; ?>">
                        </div>
                        <div class="col"><label class="form-label">İlçe</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_ilce']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">Adres</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_adres']; ?>">
                        </div>
                        <div class="col"><label class="form-label">İşyeri Adı</label>
                            <input type="text" class="form-control" value="<?php echo $teknisyencek['teknisyen_isyeriadi']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="../netting/islem.php?teknisyen_id=<?php echo $teknisyencek['teknisyen_id']; ?>&teknisyenonecikar=hayir"><button type="submit" class="btn btn-success">Onayla</button></a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="../netting/islem.php?teknisyen_id=<?php echo $teknisyencek['teknisyen_id']; ?>&teknisyensil=ok"><button type="submit" class="btn btn-primary">Sil</button></a>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Gönüllü Resim</h6>
                <div class="mb-3 d-flex justify-content-center">

                    <?php
                    if (!empty($teknisyencek['teknisyen_resim']) > 0) { ?>
                        <img class="border border-success" height="400" src="../../<?php echo $teknisyencek['teknisyen_resim']; ?>" class="d-block rounded">
                    <?php } else { ?>
                        <img class="border border-primary" height="400" width="400" src="../../teknisyen-panel/assets/img/avatars/profil.png" class="d-block rounded">
                    <?php }
                    ?>

                    <br>
                </div>
            </div>
        </div>


    </div>

    <div class="row mt-2 g-4">
        
         <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">TC Kimlik Kartı</h6>
                <div class="mb-3 d-flex justify-content-center">

                    <?php
                    if (!empty($teknisyencek['teknisyen_kimlikKart']) > 0) { ?>
                        <img class="border border-success" height="300" src="../../<?php echo $teknisyencek['teknisyen_kimlikKart']; ?>" class="d-block rounded">
                    <?php } else { ?>
                        <img class="border border-primary" height="300" width="400" src="../../gonullu-panel/assets/img/avatars/resim-yok.jpg" class="d-block rounded">
                    <?php }
                    ?>

                    <br>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Ustalık Belgesi</h6>
                <div class="mb-3 d-flex justify-content-center">

                    <?php
                    if (!empty($teknisyencek['teknisyen_ustalikBelgesi']) > 0) { ?>
                        <img class="border border-success" height="300" src="../../<?php echo $teknisyencek['teknisyen_ustalikBelgesi']; ?>" class="d-block rounded">
                    <?php } else { ?>
                        <img class="border border-primary" height="300" width="400" src="../../gonullu-panel/assets/img/avatars/resim-yok.jpg" class="d-block rounded">
                    <?php }
                    ?>

                    <br>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">İşyeri Açma Belgesi</h6>
                <div class="mb-3 d-flex justify-content-center">

                    <?php
                    if (!empty($teknisyencek['teknisyen_isyeribelge']) > 0) { ?>
                        <img class="border border-success" height="300" src="../../<?php echo $teknisyencek['teknisyen_isyeribelge']; ?>" class="d-block rounded">
                    <?php } else { ?>
                        <img class="border border-primary" height="300" width="400" src="../../gonullu-panel/assets/img/avatars/resim-yok.jpg" class="d-block rounded">
                    <?php }
                    ?>

                    <br>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- Form End -->

<?php include 'footer.php'; ?>