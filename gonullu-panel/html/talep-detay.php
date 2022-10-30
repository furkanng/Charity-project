<?php include 'header.php';

$yardimsor = $db->prepare("SELECT * FROM yardim where yardim_id=:id");
$yardimsor->execute(array(

    'id' => $_GET['yardim_id']

));
$yardimcek = $yardimsor->fetch(PDO::FETCH_ASSOC);

$teknisyen_id = $yardimcek['teknisyen_id'];

$teknisyensor = $db->prepare("SELECT * FROM teknisyen where teknisyen_id=$teknisyen_id");
$teknisyensor->execute();
$teknisyencek = $teknisyensor->fetch(PDO::FETCH_ASSOC);


?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bağış Taleplerim /</span> Talep Detay</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-2"></div>
        <div class="col-xl">

            <?php

            if (!empty($_SESSION['durum'] == "ok")) { ?>

                <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!</div>

            <?php unset($_SESSION['durum']);
            } ?>

            <?php

            if (!empty($_SESSION['durum'] == "no")) { ?>

                <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!</div>

            <?php unset($_SESSION['durum']);
            } ?>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h5 class="mb-0 ">Teknisyen Bilgileri</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Ad</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_ad']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Soyad</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_soyad']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">TC KİMLİK NO</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_tc']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">mail</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_mail']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">telefon numarası</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_gsm']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">il</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_il']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">ilçe</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_ilce']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">adres</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_adres']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">işyeri adı</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" disabled class="form-control" id="basic-icon-default-fullname" value="<?php echo $teknisyencek['teknisyen_isyeriadi']; ?>" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!-- / Content -->

<?php include 'footer.php'; ?>