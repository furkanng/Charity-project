<?php include 'header.php';

$siparis_detaysor = $db->prepare("SELECT * FROM siparis_detay where siparisdetay_id=:id");
$siparis_detaysor->execute(array(

    'id' => $_GET['siparisdetay_id']

));
$siparis_detaycek = $siparis_detaysor->fetch(PDO::FETCH_ASSOC);

$siparisdetay_id = $siparis_detaycek['siparisdetay_id'];
$siparisdetaysor = $db->prepare("SELECT * FROM siparis_detay where siparisdetay_id=:id");
$siparisdetaysor->execute(array(

    'id' => $siparisdetay_id

));


$yoksul_id = $siparis_detaycek['gonullu_id'];

$yardimsor = $db->prepare("SELECT * FROM yardim where yoksul_id=$yoksul_id");
$yardimsor->execute();
$yardimcek = $yardimsor->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siparişlerim /</span> Detaylar</h4>
    <?php

    if (!empty($_SESSION['siparisdurum'] == "ok")) { ?>

        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">Siparişiniz başarıyla gerçekleşmiştir.
        </div>

    <?php unset($_SESSION['siparisdurum']);
    } ?>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="../../admin/netting/islem.php" method="POST">
                    <div class="row">
                        <h6 class="form-label mb-4">Bağış Bilgileri</h6>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Ad</label>
                                <input type="text" disabled class="form-control" id="basic-default-fullname" value="<?php echo $siparis_detaycek['sepet_ad'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">soyad</label>
                                <input type="text" disabled class="form-control" id="basic-default-company" value="<?php echo $siparis_detaycek['sepet_soyad'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">bağış türü</label>
                                <input type="text" disabled class="form-control" id="basic-default-fullname" value="<?php echo $siparis_detaycek['sepet_kategori'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">bağış oranı</label>
                                <input type="text" disabled class="form-control" id="basic-default-company" value="<?php echo $siparis_detaycek['sepet_oran'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Toplam kg</label>
                                <input type="text" disabled class="form-control" id="basic-default-fullname" value="<?php echo $siparis_detaycek['sepet_kg'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">bağış adedi</label>
                                <input type="text" disabled class="form-control" id="basic-default-company" value="<?php echo $siparis_detaycek['sepet_adet'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Şehir</label>
                                <input type="text" disabled class="form-control" id="basic-default-fullname" value="<?php echo $siparis_detaycek['sepet_sehir'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Telefon numarası</label>
                                <input type="text" disabled class="form-control" id="basic-default-company" value="<?php echo $siparis_detaycek['sepet_gsm'] ?>" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="form-label mb-4">Gönüllü Bilgileri</h6>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Gönüllü İd</label>
                                <input type="text" disabled class="form-control" id="basic-default-fullname" value="<?php echo $siparis_detaycek['gonullu_id'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Ad SOYAD</label>
                                <input type="text" disabled class="form-control" id="basic-default-company" value="<?php echo $yardimcek['yardim_ad'], " ", $yardimcek['yardim_soyad']; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Telefon numarası</label>
                                <input type="text" disabled class="form-control" id="basic-default-fullname" value="<?php echo $yardimcek['yardim_gsm'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">tc kimlik no</label>
                                <input type="text" disabled class="form-control" id="basic-default-company" value="<?php echo $yardimcek['yardim_tc'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">şehir</label>
                                <input type="text" disabled class="form-control" id="basic-default-fullname" value="<?php echo $yardimcek['yardim_il'] ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">mail</label>
                                <input type="text" disabled class="form-control" id="basic-default-company" value="<?php echo $yardimcek['yardim_mail']; ?>" />
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="teknisyen_id" value="<?php echo $teknisyencek['teknisyen_id']; ?>">
                    <input type="hidden" name="yoksul_id" value="<?php echo $yoksul_id; ?>">


                    <button type="submit" name="yardimAta" class="btn btn-primary">Gönder</button>

                </form>
                <div class="d-flex justify-content-end">
                    <?php

                    if (strlen($yardimcek['teknisyen_id'] > 0)) { ?>

                        <button class="btn btn-outline-success">Teknisyen bilgisi ulaştırıldı</button>
                    <?php } else { ?>

                        <button class="btn btn-outline-secondary">Henüz Bilgi Verilmedi</button>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>





</div>
<!-- / Content -->

<?php include 'footer.php'; ?>