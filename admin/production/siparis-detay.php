<?php include 'header.php';

$siparis_detaysor = $db->prepare("SELECT * FROM siparis_detay where siparisdetay_id=:id");
$siparis_detaysor->execute(array(

    'id' => $_GET['siparisdetay_id']

));
$siparis_detaycek = $siparis_detaysor->fetch(PDO::FETCH_ASSOC);


$yardimsor = $db->prepare("SELECT * FROM yardim 
INNER JOIN siparis_detay
ON yardim_il=sepet_sehir 
where siparisdetay_id ={$_GET['siparisdetay_id']} 
and yardim_durum='0'");

$yardimsor->execute();

?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">

                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-4">Bağışcı Bilgileri</h6>
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

                <form action="../netting/islem.php" method="POST">

                    <div class="mb-3">
                        <div class="row">
                            <div class="col"><label class="form-label">Ad</label>
                                <input type="text" class="form-control" value="<?php echo $siparis_detaycek['sepet_ad']; ?>">
                            </div>
                            <div class="col"><label class="form-label">Soyad</label>
                                <input type="text" class="form-control" value="<?php echo $siparis_detaycek['sepet_soyad']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col"><label class="form-label">Telefon Numarası</label>
                                <input type="text" class="form-control" value="<?php echo $siparis_detaycek['sepet_gsm']; ?>">
                            </div>
                            <div class="col"><label class="form-label">Şehir</label>
                                <input type="text" class="form-control" value="<?php echo $siparis_detaycek['sepet_sehir']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col"><label class="form-label">Toplam Kg</label>
                                <input type="text" class="form-control" value="<?php echo $siparis_detaycek['sepet_kg']; ?>">
                            </div>
                            <div class="col"><label class="form-label">Bağış Oranı</label>
                                <input type="text" class="form-control" value="<?php echo $siparis_detaycek['sepet_oran']; ?>">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="col-sm-6">
                        <h6 class="mb-4">Gönüllü Bilgileri</h6>
                    </div>


                    <div class="mb-3">
                        <div class="row">
                            <div class="col"><label class="form-label">Gönüllü İD giriniz</label>
                                <input type="number" name="gonullu_id" class="form-control" value="<?php echo $siparis_detaycek['gonullu_id']; ?>">
                            </div>

                        </div>
                    </div>

                    <input type="hidden" name="siparisdetay_id" value="<?php echo $_GET['siparisdetay_id']; ?>">


                    <hr>
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="BagisAtama" class="btn btn-success">Atama Yap</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4 ">
                <h6 class="mb-4">Yardım Talepleri</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sıra</th>
                            <th scope="col">ID</th>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Şehir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $say = 0;

                        while ($yardimcek = $yardimsor->fetch(PDO::FETCH_ASSOC)) {
                            $say++; ?>
                            <tr>
                                <th scope="row"><?php echo $say ?></th>
                                <td><?php echo $yardimcek['yoksul_id']; ?></td>
                                <td><?php echo $yardimcek['yardim_ad'], " ", $yardimcek['yardim_soyad']; ?></td>
                                <td><?php echo $yardimcek['yardim_il']; ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- Form End -->

<?php include 'footer.php'; ?>