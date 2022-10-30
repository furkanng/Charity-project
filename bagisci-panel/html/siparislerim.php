<?php include 'header.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siparişlerim</span></h4>
    <?php

    if (!empty($_SESSION['siparisdurum'] == "ok")) { ?>

        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">Siparişiniz başarıyla gerçekleşmiştir.</div>

    <?php unset($_SESSION['siparisdurum']);
    } ?>

    <div class="card">

        <h5 class="card-header">Tüm Siparişlerim</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Sipariş No</th>
                        <th>Sipariş Tarihi</th>
                        <th>Ödenen Tutar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <?php

                    $bagisci_id = $bagiscicek['bagisci_id'];
                    $siparissor = $db->prepare("SELECT * FROM siparis where bagisci_id=:id");
                    $siparissor->execute(array(

                        'id' => $bagisci_id

                    ));

                    $say = 0;

                    while ($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC)) {
                        $say++;


                    ?>

                        <!-- Tarihi parçalama işlemi -->
                        <?php

                        $zaman = explode(" ", $sipariscek['siparis_zaman']);

                        ?>


                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $say ?></strong>
                            <td><?php echo $sipariscek['siparis_id']; ?></td>
                            <td><?php echo $zaman[0]; ?></td>
                            <td><?php echo $sipariscek['odenecek_tutar']; ?> ₺</td>
                            <td>
                            <a href="siparis-detay?siparis_id=<?php echo $sipariscek['siparis_id']; ?>"><button type="button" class="btn btn-sm  btn-outline-info">Sipariş Detayı</button></a>
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