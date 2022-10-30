<?php include 'header.php';


$desteksor = $db->prepare("SELECT * FROM destek where destek_id=:id");
$desteksor->execute(array(

    'id' => $_GET['destek_id']

));
$destekcek = $desteksor->fetch(PDO::FETCH_ASSOC);


?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Destek Talepleri /</span> Detay </h4>

    <?php

    if (!empty($_SESSION['durum'] == "no")) { ?>

        <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem
            Başarısız!
        </div>

    <?php unset($_SESSION['durum']);
    } ?>
    <?php

    if (!empty($_SESSION['durum'] == "ok")) { ?>

        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem
            Başarılı!
        </div>

    <?php unset($_SESSION['durum']);
    } ?>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Ad</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname" value="<?php echo $destekcek['destek_ad']; ?>" name="destek_ad" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Soyad</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="destek_soyad" id="basic-icon-default-fullname" value="<?php echo $destekcek['destek_soyad']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Telefon Numarası</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">TR (+90)</span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname" value="<?php echo $destekcek['destek_gsm']; ?>" name="destek_gsm" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Mail</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" class="form-control" name="destek_mail" id="basic-icon-default-fullname" value="<?php echo $destekcek['destek_mail']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label" for="basic-icon-default-fullname">Mesajınız</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" class="form-control" name="destek_mesaj" id="basic-icon-default-fullname" value="<?php echo $destekcek['destek_mesaj']; ?>" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label" for="basic-icon-default-fullname">Yanıt</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" name="destek_yanit" id="basic-icon-default-fullname" value="<?php echo $destekcek['destek_yanit']; ?>" />
                        </div>
                    </div>
                    <input type="hidden" name="destek_id" value="<?php echo $destekcek['destek_id']; ?>">

                    <a href="destek"><button type="submit" class="btn btn-primary">Yeni talep oluştur</button></a>
                    <a href="../../admin/netting/islem.php?destek_id=<?php echo $destekcek['destek_id']; ?>&desteksildetay=ok"><button type="submit" class="btn btn-danger m-2">Talebi Sil</button></a>

                </div>
            </div>
        </div>
        <div class="col-xl">

        </div>
    </div>
</div>
<!-- / Content -->
<?php include 'footer.php'; ?>