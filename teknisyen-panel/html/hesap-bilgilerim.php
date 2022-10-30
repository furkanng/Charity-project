<?php include 'header.php';

$teknisyensor = $db->prepare("SELECT * FROM teknisyen where teknisyen_mail=:mail");
$teknisyensor->execute(array(

    'mail' => $_SESSION['userteknisyen_mail']

));
$say = $teknisyensor->rowCount();
$teknisyencek = $teknisyensor->fetch(PDO::FETCH_ASSOC);

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
                                if (!empty($teknisyencek['teknisyen_resim']) > 0) { ?>
                                    <img height="100" width="100" src="../../<?php echo $teknisyencek['teknisyen_resim']; ?>" class="d-block rounded">
                                <?php } else { ?>
                                    <img height="100" width="100" src="../assets/img/avatars/profil.png" class="d-block rounded">
                                <?php }
                                ?>
                                <input type="hidden" name="eski_yol" value="<?php echo $teknisyencek['teknisyen_resim']; ?>">

                                <input type="hidden" name="teknisyen_id" value="<?php echo $teknisyencek['teknisyen_id']; ?>">

                                <div class="button-wrapper">
                                    <label for="upload" class="me-2 mb-4" tabindex="0">
                                        <input class="form-control" type="file" name="teknisyen_resim" id="formFile" />
                                    </label>
                                    <button type="submit" name="teknisyenResimGuncelle" class="btn btn-outline-success account-image-reset ">
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
                                <input class="form-control" required="" type="text" id="firstName" name="teknisyen_ad" value="<?php echo $teknisyencek['teknisyen_ad']; ?>" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Soyad</label>
                                <input class="form-control" required="" type="text" name="teknisyen_soyad" id="lastName" value="<?php echo $teknisyencek['teknisyen_soyad']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Mail</label>
                                <input class="form-control" type="email" id="email" name="teknisyen_mail" value="<?php echo $teknisyencek['teknisyen_mail']; ?>" required="" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">TC KİMLİK NO</label>
                                <input type="text" required="" class="form-control" id="organization" name="teknisyen_tc" value="<?php echo $teknisyencek['teknisyen_tc']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Telefon numarası</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">TR (+90)</span>
                                    <input type="text" required="" id="phoneNumber" name="teknisyen_gsm" value="<?php echo $teknisyencek['teknisyen_gsm']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">İl</label>
                                <input type="text" required="" class="form-control" id="state" name="teknisyen_il" value="<?php echo $teknisyencek['teknisyen_il']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">ilçe</label>
                                <input class="form-control" required="" type="text" id="state" name="teknisyen_ilce" value="<?php echo $teknisyencek['teknisyen_ilce']; ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="zipCode" class="form-label">Adres</label>
                                <input type="text" required="" class="form-control" id="zipCode" name="teknisyen_adres" value="<?php echo $teknisyencek['teknisyen_adres']; ?>" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="zipCode" class="form-label">İşyeri Adı</label>
                                <input type="text" required="" class="form-control" id="zipCode" name="teknisyen_isyeriadi" value="<?php echo $teknisyencek['teknisyen_isyeriadi']; ?>" />
                            </div>

                            <input type="hidden" name="teknisyen_id" value="<?php echo $teknisyencek['teknisyen_id']; ?>">
                        </div>
                        <div class="mt-2">
                            <button type="submit" name="teknisyenhesapkaydet" class="btn btn-primary me-2">Bilgileri
                                Kaydet</button>
                            <button type="reset" class="btn">

                                <?php

                                if (!empty($teknisyencek['teknisyen_tc'] && $teknisyencek['teknisyen_adres'] && $teknisyencek['teknisyen_il'] &&
                                    $teknisyencek['teknisyen_ilce'] && $teknisyencek['teknisyen_gsm'] && $teknisyencek['teknisyen_isyeribelge'] && $teknisyencek['teknisyen_isyeriadi'] && $teknisyencek['teknisyen_resim'] && $teknisyencek['teknisyen_kimlikKart'] && $teknisyencek['teknisyen_ustalikBelgesi'] && $teknisyencek['teknisyen_ad']
                                    && $teknisyencek['teknisyen_soyad'] && $teknisyencek['teknisyen_mail'])) {
                                    if ($teknisyencek['teknisyen_durum'] == '0') { ?>
                                        Onay bekleniyor
                                    <?php } elseif ($teknisyencek['teknisyen_durum'] == '1') { ?>

                                        Onaylandı
                                    <?php }
                                } else { ?>

                                    Kurban bağışı sistemi teknisyeni olabilmek için lütfen tüm bilgileri eksiksiz doldurunuz

                                <?php }


                                ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Belge yükleme bölümü -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">TC Kimlik Kartı</h5>
                    <!-- Account -->
                    <div class="card-body">

                        <form action="../../admin/netting/islem.php" method="POST" enctype="multipart/form-data">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">

                                <?php
                                if (!empty($teknisyencek['teknisyen_kimlikKart']) > 0) { ?>
                                    <img height="200" width="300" src="../../<?php echo $teknisyencek['teknisyen_kimlikKart']; ?>" class="d-block rounded border border-secondary">
                                <?php } else { ?>
                                    <img height="200" width="200" src="../assets/img/avatars/resim-yok.jpg" class="d-block rounded border border-secondary">
                                <?php }
                                ?>
                                <input type="hidden" name="eski_yolKimlik" value="<?php echo $teknisyencek['teknisyen_kimlikKart']; ?>">

                                <input type="hidden" name="teknisyen_id" value="<?php echo $teknisyencek['teknisyen_id']; ?>">

                                <div class="button-wrapper">
                                    <label for="upload" class="me-2 mb-4" tabindex="0">
                                        <input class="form-control" type="file" name="teknisyen_kimlikKart" id="formFile" />
                                    </label>
                                    <button type="submit" name="teknisyenResimKimlik" class="btn btn-outline-success account-image-reset ">
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
                    </div>
                </div>
            </div>
            <!-- Belge yükleme bölümü -->

            <!-- Belge yükleme bölümü -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Ustalık Belgesi</h5>
                    <!-- Account -->
                    <div class="card-body">

                        <form action="../../admin/netting/islem.php" method="POST" enctype="multipart/form-data">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">

                                <?php
                                if (!empty($teknisyencek['teknisyen_ustalikBelgesi']) > 0) { ?>
                                    <img height="200" width="300" src="../../<?php echo $teknisyencek['teknisyen_ustalikBelgesi']; ?>" class="d-block rounded border border-secondary">
                                <?php } else { ?>
                                    <img height="200" width="200" src="../assets/img/avatars/resim-yok.jpg" class="d-block rounded border border-secondary">
                                <?php }
                                ?>
                                <input type="hidden" name="eski_yolustalik" value="<?php echo $teknisyencek['teknisyen_ustalikBelgesi']; ?>">

                                <input type="hidden" name="teknisyen_id" value="<?php echo $teknisyencek['teknisyen_id']; ?>">

                                <div class="button-wrapper">
                                    <label for="upload" class="me-2 mb-4" tabindex="0">
                                        <input class="form-control" type="file" name="teknisyen_ustalikBelgesi" id="formFile" />
                                    </label>
                                    <button type="submit" name="teknisyenResimustalik" class="btn btn-outline-success account-image-reset ">
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
                    </div>
                </div>
            </div>
            <!-- Belge yükleme bölümü -->


            <!-- Belge yükleme bölümü -->
<div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">İşyeri Açma Belgesi</h5>
                    <!-- Account -->
                    <div class="card-body">

                        <form action="../../admin/netting/islem.php" method="POST" enctype="multipart/form-data">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">

                                <?php
                                if (!empty($teknisyencek['teknisyen_isyeribelge']) > 0) { ?>
                                    <img height="200" width="300" src="../../<?php echo $teknisyencek['teknisyen_isyeribelge']; ?>" class="d-block rounded border border-secondary">
                                <?php } else { ?>
                                    <img height="200" width="200" src="../assets/img/avatars/resim-yok.jpg" class="d-block rounded border border-secondary">
                                <?php }
                                ?>
                                <input type="hidden" name="eski_yolisyeri" value="<?php echo $teknisyencek['teknisyen_isyeribelge']; ?>">

                                <input type="hidden" name="teknisyen_id" value="<?php echo $teknisyencek['teknisyen_id']; ?>">

                                <div class="button-wrapper">
                                    <label for="upload" class="me-2 mb-4" tabindex="0">
                                        <input class="form-control" type="file" name="teknisyen_isyeribelge" id="formFile" />
                                    </label>
                                    <button type="submit" name="teknisyenResimisyeri" class="btn btn-outline-success account-image-reset ">
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
                    </div>
                </div>
            </div>
            <!-- Belge yükleme bölümü -->




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
                            <input class="form-check-input" type="checkbox" name="hesabimsilTeknisyen" id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">Hesabımın devre dışı
                                bırakılmasını onaylıyorum</label>
                        </div>
                        <input type="hidden" name="teknisyen_id" value="<?php echo $teknisyencek['teknisyen_id']; ?>">
                        <button name="hesapkaldirTeknisyen" type="submit" class="btn btn-danger deactivate-account">Hesabımı Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?php include 'footer.php'; ?>