<?php include 'header.php';

$yoksulsor = $db->prepare("SELECT * FROM yoksul where yoksul_id=:id");
$yoksulsor->execute(array(

    'id' => $_GET['yoksul_id']

));
$yoksulcek = $yoksulsor->fetch(PDO::FETCH_ASSOC);
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
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_zaman']; ?>">
                        </div>
                        <div class="col"><label class="form-label">İD</label>
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_id']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">Ad</label>
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_ad']; ?>">
                        </div>
                        <div class="col"><label class="form-label">Soyad</label>
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_soyad']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">TC</label>
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_tc']; ?>">
                        </div>
                        <div class="col"><label class="form-label">Mail</label>
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_mail']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col"><label class="form-label">İl</label>
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_il']; ?>">
                        </div>
                        <div class="col"><label class="form-label">İlçe</label>
                            <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_ilce']; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Adres</label>
                    <input type="text" class="form-control" value="<?php echo $yoksulcek['yoksul_adres']; ?>">
                </div>

                <div class="row">
                    <div class="col">
                        <a href="../netting/islem.php?yoksul_id=<?php echo $yoksulcek['yoksul_id']; ?>&yoksulonecikar=hayir"><button type="submit" class="btn btn-success">Onayla</button></a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="../netting/islem.php?yoksul_id=<?php echo $yoksulcek['yoksul_id']; ?>&yoksulsil=ok"><button type="submit" class="btn btn-primary">Sil</button></a>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Gönüllü Resim</h6>
                <div class="mb-3 d-flex justify-content-center">

                    <?php
                    if (!empty($yoksulcek['yoksul_resim']) > 0) { ?>
                        <img class="border border-success" height="400" src="../../<?php echo $yoksulcek['yoksul_resim']; ?>" class="d-block rounded">
                    <?php } else { ?>
                        <img class="border border-primary" height="400" width="400" src="../../yoksul-panel/assets/img/avatars/profil.png" class="d-block rounded">
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
                    if (!empty($yoksulcek['yoksul_kimlikKart']) > 0) { ?>
                        <img class="border border-success" height="300" src="../../<?php echo $yoksulcek['yoksul_kimlikKart']; ?>" class="d-block rounded">
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
                <h6 class="mb-4">Gelir Belgesi</h6>
                <div class="mb-3 d-flex justify-content-center">

                    <?php
                    if (!empty($yoksulcek['yoksul_gelirBelgesi']) > 0) { ?>
                        <img class="border border-success" height="300" src="../../<?php echo $yoksulcek['yoksul_gelirBelgesi']; ?>" class="d-block rounded">
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