<?php include 'header.php'; 

$siparissor = $db-> prepare("SELECT * FROM siparis where siparis_id=:id");
$siparissor->execute(array(

  'id'=> $_GET['siparis_id']

));
$sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siparişlerim /</span> Detaylar</h4>
    <?php

    if (!empty($_SESSION['siparisdurum'] == "ok")) { ?>

        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">Siparişiniz başarıyla gerçekleşmiştir.</div>

    <?php unset($_SESSION['siparisdurum']);
    } ?>

    <div class="card">

        <h5 class="card-header">Sipariş Detayları</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Bağışcı Ad soyad</th>
                        <th>Bağış Türü</th>
                        <th>Adet</th>
                        <th>Bağış Oranı</th>
                        <th>Şehir</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <?php

                    $siparis_id = $sipariscek['siparis_id'];
                    $siparisdetaysor = $db->prepare("SELECT * FROM siparis_detay where siparis_id=:id");
                    $siparisdetaysor->execute(array(

                        'id' => $siparis_id

                    ));

                    $say = 0;

                    while ($siparisdetaycek = $siparisdetaysor->fetch(PDO::FETCH_ASSOC)) {
                        $say++;


                    ?>

                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $say ?></strong>
                            </td>
                            <td><?php echo $siparisdetaycek['sepet_ad']," ",$siparisdetaycek['sepet_soyad']; ?></td>
                            <td><?php echo $siparisdetaycek['sepet_kategori']?></td>
                            <td><?php echo $siparisdetaycek['sepet_adet']; ?></td>
                            <td><?php echo $siparisdetaycek['sepet_oran']; ?></td>
                            <td><?php echo $siparisdetaycek['sepet_sehir']; ?></td>
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