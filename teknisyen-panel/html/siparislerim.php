<?php include 'header.php';

$siparis_detaysor = $db->prepare("SELECT * FROM siparis_detay 
INNER JOIN basvuru 
ON sepet_sehir=basvuru_il
where siparis_detay.gonullu_id is not null
");
$siparis_detaysor->execute();



?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siparişlerim</span></h4>
    <?php

    if (!empty($_SESSION['durum'] == "ok")) { ?>

        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşleminiz başarıyla gerçekleşmiştir.</div>

    <?php unset($_SESSION['durum']);
    } ?>

    <?php

    if (!empty($_SESSION['durum'] == "no")) { ?>

        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşleminiz başarıyla gerçekleşmiştir.</div>

    <?php unset($_SESSION['durum']);
    } ?>

    <div class="card">

        <h5 class="card-header">Tüm Siparişlerim</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Ad Soyad</th>
                        <th>Kg</th>
                        <th>Bağış Oranı</th>
                        <th>Şehir</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <?php

                    $say = 0;

                    while ($siparis_detaycek = $siparis_detaysor->fetch(PDO::FETCH_ASSOC)) {
                        $say++;

                    ?>
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $say ?></strong>
                            <td><?php echo $siparis_detaycek['sepet_ad'], " ", $siparis_detaycek['sepet_soyad']; ?></td>
                            <td><?php echo $siparis_detaycek['sepet_kg']; ?></td>
                            <td><?php echo $siparis_detaycek['sepet_oran']; ?></td>
                            <td><?php echo $siparis_detaycek['sepet_sehir']; ?></td>
                            <td>
                                <a href="siparis-detay?siparisdetay_id=<?php echo $siparis_detaycek['siparisdetay_id']; ?>&gonullu_id=<?php echo $siparis_detaycek['gonullu_id']; ?>"><button type="button" class="btn btn-sm  btn-outline-info">Sipariş Detayı</button></a>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->



</div>
<!-- / Content -->

<?php include 'footer.php'; ?>