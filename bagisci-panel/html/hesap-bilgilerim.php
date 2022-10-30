<?php include 'header.php';

$bagiscisor = $db->prepare("SELECT * FROM bagisci where bagisci_mail=:mail");
$bagiscisor->execute(array(

    'mail' => $_SESSION['userbagisci_mail']

));
$say = $bagiscisor->rowCount();
$bagiscicek = $bagiscisor->fetch(PDO::FETCH_ASSOC);



?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hesap Bilgilerim /</span> Profilim</h4>

        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">Profil Detay</h5>
                    <!-- Account -->
                    <div class="card-body">

                        <form action="../../admin/netting/islem.php" method="POST" enctype="multipart/form-data">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">

                                <?php
                                if (!empty($bagiscicek['bagisci_resim']) > 0) { ?>
                                    <img height="100" width="100" src="../../<?php echo $bagiscicek['bagisci_resim']; ?>" class="d-block rounded">
                                <?php } else { ?>
                                    <img height="100" width="100" src="../assets/img/avatars/profil.png" class="d-block rounded">
                                <?php }
                                ?>
                                <input type="hidden" name="eski_yol" value="<?php echo $bagiscicek['bagisci_resim']; ?>">

                                <input type="hidden" name="bagisci_id" value="<?php echo $bagiscicek['bagisci_id']; ?>">

                                <div class="button-wrapper">
                                    <label for="upload" class="me-2 mb-4" tabindex="0">
                                        <input class="form-control" type="file" name="bagisci_resim" id="formFile" />
                                    </label>
                                    <button type="submit" name="BagisciResimGuncelle" class="btn btn-outline-success account-image-reset ">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Yükle</span>
                                    </button>
                                    <!-- <button type="submit" class="btn btn-outline-danger account-image-reset ">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Kaldır</span>
                                    </button> -->

                                    <p class="text-muted mb-0">Yalnız JPG, GIF or PNG. Maksimum boyut 800K</p>
                                </div>

                        </form>

                        <?php

                        if (!empty($_SESSION['durum'] == "ok")) { ?>

                            <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem
                                Başarılı!
                            </div>

                        <?php unset($_SESSION['durum']);
                        } ?>

                        <?php

                        if (!empty($_SESSION['durum'] == "no")) { ?>

                            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem
                                Başarısız!
                            </div>

                        <?php unset($_SESSION['durum']);
                        } ?>


                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" action="../../admin/netting/islem.php" method="POST">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Ad</label>
                                <input class="form-control" required="" type="text" id="firstName" name="bagisci_ad" value="<?php echo $bagiscicek['bagisci_ad']; ?>" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Soyad</label>
                                <input class="form-control" required="" type="text" name="bagisci_soyad" id="lastName" value="<?php echo $bagiscicek['bagisci_soyad']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Mail</label>
                                <input class="form-control" type="email" id="email" name="bagisci_mail" value="<?php echo $bagiscicek['bagisci_mail']; ?>" required="" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">TC KİMLİK NO</label>
                                <input type="text" required="" class="form-control" id="organization" name="bagisci_tc" value="<?php echo $bagiscicek['bagisci_tc']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Telefon numarası</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">TR (+90)</span>
                                    <input type="text" required="" id="phoneNumber" name="bagisci_gsm" value="<?php echo $bagiscicek['bagisci_gsm']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">İl</label>
                                <input type="text" required="" class="form-control" id="state" name="bagisci_il" value="<?php echo $bagiscicek['bagisci_il']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">ilçe</label>
                                <input class="form-control" required="" type="text" id="state" name="bagisci_ilce" value="<?php echo $bagiscicek['bagisci_ilce']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="zipCode" class="form-label">Adres</label>
                                <input type="text" required="" class="form-control" id="zipCode" name="bagisci_adres" value="<?php echo $bagiscicek['bagisci_adres']; ?>" />
                            </div>

                            <input type="hidden" name="bagisci_id" value="<?php echo $bagiscicek['bagisci_id']; ?>">
                        </div>
                        <div class="mt-2">
                            <button type="submit" name="bagiscihesapkaydet" class="btn btn-primary me-2">Bilgileri
                                Kaydet</button>
                            <button type="reset" class="btn">

                                <?php

                                if (!empty($bagiscicek['bagisci_tc'] && $bagiscicek['bagisci_adres'] && $bagiscicek['bagisci_il'] &&
                                    $bagiscicek['bagisci_ilce'] && $bagiscicek['bagisci_gsm'] && $bagiscicek['bagisci_resim'] && $bagiscicek['bagisci_ad']
                                    && $bagiscicek['bagisci_soyad'] && $bagiscicek['bagisci_mail'])) {
                                    if ($bagiscicek['bagisci_durum'] == '0') { ?>
                                        Onay bekleniyor
                                    <?php } elseif ($bagiscicek['bagisci_durum'] == '1') { ?>

                                        Onaylandı
                                    <?php }
                                } else { ?>

                                    Kurban bağışı yapabilmek için lütfen tüm bilgileri eksiksiz doldurunuz

                                <?php }


                                ?>

                            </button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="card">
                <h5 class="card-header">Hesabımı Sil</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Hesabınızı silmek istediğinizden emin misiniz?
                            </h6>
                            <p class="mb-0">Hesabınızı sildikten sonra geri dönüş yoktur. Lütfen emin olun.
                            </p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" action="../../admin/netting/islem.php" method="POST">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="hesabimsil" id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">Hesabımın devre dışı
                                bırakılmasını onaylıyorum</label>
                        </div>
                        <input type="hidden" name="bagisci_id" value="<?php echo $bagiscicek['bagisci_id']; ?>">
                        <button name="hesapkaldir" type="submit" class="btn btn-danger deactivate-account">Hesabımı Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?php include 'footer.php'; ?>