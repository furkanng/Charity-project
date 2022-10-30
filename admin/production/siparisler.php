<?php include 'header.php';

$siparis_detaysor = $db->prepare("SELECT * FROM siparis_detay order by siparisdetay_id ASC");
$siparis_detaysor->execute();

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">


                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-4">Sipariş Verileri</h6>
                    </div>
                    <div class="col-sm-4">

                        <?php

                        if (!empty($_SESSION['siparis_detaydurum'] == "ok")) { ?>

                            <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!
                            </div>

                        <?php

                            unset($_SESSION['siparis_detaydurum']);
                        } elseif (!empty($_SESSION['siparis_detaydurum'] == "no")) { ?>

                            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!
                            </div>

                        <?php unset($_SESSION['siparis_detaydurum']);
                        };


                        ?>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sıra</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Bağış Türü</th>
                                <th scope="col">Adet</th>
                                <th scope="col">Bağış Oranı</th>
                                <th scope="col">Şehir</th>
                                <th scope="col">Durum</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $say = 0;

                            while ($siparis_detaycek = $siparis_detaysor->fetch(PDO::FETCH_ASSOC)) {
                                $say++; ?>
                                <tr>
                                    <th scope="row"><?php echo $say ?></th>
                                    <td><?php echo $siparis_detaycek['sepet_ad'], " ", $siparis_detaycek['sepet_soyad']; ?></td>
                                    <td><?php echo $siparis_detaycek['sepet_kategori']; ?></td>
                                    <td><?php echo $siparis_detaycek['sepet_adet']; ?></td>
                                    <td><?php echo $siparis_detaycek['sepet_oran']; ?></td>
                                    <td><?php echo $siparis_detaycek['sepet_sehir']; ?></td>
                                    <td><?php

                                        if (strlen($siparis_detaycek['gonullu_id']) > 0 ) { ?>

                                            <button class="btn btn-outline-success btn-sm">Gönüllü İd: <?php echo $siparis_detaycek['gonullu_id']; ?></button>

                                        <?php } else { ?>

                                            <button class="btn btn-outline-primary btn-sm">Atanmadı</button>

                                        <?php } ?>
                                    </td>
                                    <td><a href="siparis-detay?siparisdetay_id=<?php echo $siparis_detaycek['siparisdetay_id']; ?>"><button class="btn btn-outline-info btn-sm">Atama yap</button></td>
                                    <td><a href="../netting/islem.php?siparisdetay_id=<?php echo $siparis_detaycek['siparisdetay_id']; ?>&siparisdetaysil=ok"><button class="btn btn-outline-danger btn-sm">Sil</button></td>
                                </tr>
                            <?php  }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<?php include 'footer.php'; ?>