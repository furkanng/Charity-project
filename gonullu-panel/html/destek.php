<?php include 'header.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Destek</span></h4>

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
                    <h5 class="mb-0 ">Bizimle İletişime Geçin</h5>
                </div>
                <div class="card-body">
                    <form action="../../admin/netting/islem.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Ad</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" required="" id="basic-icon-default-fullname" value="<?php echo $yoksulcek['yoksul_ad']; ?>" name="destek_ad" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Soyad</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" required="" name="destek_soyad" id="basic-icon-default-fullname" value="<?php echo $yoksulcek['yoksul_soyad']; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Mail</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input class="form-control" required="" type="email" id="email" name="destek_mail" value="<?php echo $yoksulcek['yoksul_mail']; ?>" required="" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">TELEFON NUMARASI</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">TR (+90)</span>
                                <input type="text" required="" id="phoneNumber" name="destek_gsm" value="<?php echo $yoksulcek['yoksul_gsm']; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">Mesajınız</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="destek_mesaj" placeholder="Mesajınızı buraya giriniz." class="form-control"></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="yoksul_id" value="<?php echo $yoksulcek['yoksul_id']; ?>">

                        <button type="submit" name="destekGonullu" class="btn btn-primary">Gönder</button>
                    </form>
                </div>


            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!-- / Content -->

<?php include 'footer.php'; ?>