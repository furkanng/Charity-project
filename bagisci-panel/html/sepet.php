<?php include 'header.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Alışveris Sepeti</h4>
    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">Sepetim</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>Bağışcı</th>
                            <th>Şehir</th>
                            <th>Adet</th>
                            <th>Bağış Türü</th>
                            <th>Bağış Oranı</th>
                            <th>Fiyat</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        $bagisci_id = $bagiscicek['bagisci_id'];
                        $sepetsor = $db->prepare("SELECT * FROM sepet where bagisci_id=:id");
                        $sepetsor->execute(array(

                            'id' => $bagisci_id

                        ));

                        $say = 0;

                        while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {
                            $say++;

                            $toplam_fiyat += 5000 * $sepetcek['sepet_adet'];
                            $kdv = $toplam_fiyat*(18/100);
                            $kasap_fiyat += 300 * $sepetcek['sepet_adet'];
                            $odenecek_tutar=$kasap_fiyat+$kdv+$toplam_fiyat;

                        ?>
                            <tr>
                                <td width="30px">
                                    <i class="text-danger me-3"></i> <strong><?php echo $say ?></strong>
                                </td>
                                <td><?php echo $sepetcek['sepet_ad'], ' ', $sepetcek['sepet_soyad']; ?></td>
                                <td><?php echo $sepetcek['sepet_sehir']; ?></td>
                                <td><?php echo $sepetcek['sepet_adet']; ?></td>
                                <td><?php echo $sepetcek['sepet_kategori']; ?></td>
                                <td><?php echo $sepetcek['sepet_oran']; ?></td>
                                <td><?php echo $sepetcek['sepet_adet'] * 5000; ?> ₺</td>

                            
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="col-lg-5 ms-auto">
                <div class="demo-inline-spacing mt-3">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Toplam Fiyat
                            <span class="badge bg-primary"><?php echo $toplam_fiyat; ?> ₺</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            KDV (18%)
                            <span class="badge bg-danger"><?php echo $kdv; ?> ₺</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kasap Payı
                            <span class="badge bg-warning"><?php echo $kasap_fiyat; ?> ₺</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ödenecek Tutar
                            <span class="badge bg-success"><?php echo $odenecek_tutar; ?> ₺</span>
                        </li>

                        <?php echo $_POST[$odenecek_tutar]; ?>

                        <a href="odeme"><button class="btn btn-outline-success mt-3" type="submit">Ödeme Yap</button></a>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- / Content -->
<?php include 'footer.php'; ?>