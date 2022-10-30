<?php include 'header.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bağış Taleplerim</span></h4>
    <div class="card">

        <h5 class="card-header">Tüm Yardım Taleplerim</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Tarih</th>
                        <th>Ad Soyad</th>
                        <th>Şehir</th>
                        <th>Durum</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <?php

                    $yoksul_id = $yoksulcek['yoksul_id'];
                    $yardimsor = $db->prepare("SELECT * FROM yardim where yoksul_id=:id");
                    $yardimsor->execute(array(

                        'id' => $yoksul_id

                    ));

                    $say = 0;

                    while ($yardimcek = $yardimsor->fetch(PDO::FETCH_ASSOC)) {
                        $say++;


                    ?>

                        <!-- Tarihi parçalama işlemi -->
                        <?php

                        $zaman = explode(" ", $yardimcek['yardim_zaman']);

                        ?>


                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $say ?></strong>
                            <td><?php echo $zaman[0]; ?></td>
                            <td><?php echo $yardimcek['yardim_ad'], " ", $yardimcek['yardim_soyad']; ?></td>
                            <td><?php echo $yardimcek['yardim_il']; ?></td>
                            <td>
                                <?php

                                if ($yardimcek['yardim_durum'] == 1) { ?>

                                    <button type="button" class="btn btn-sm  btn-outline-success">Onaylandı</button>
                                <?php } elseif ($yardimcek['yardim_durum'] == 0) { ?>

                                    <button type="button" class="btn btn-sm  btn-outline-danger">Onay Bekleniyor</button>
                                <?php   } ?>
                            </td>
                            <td>
                                <?php

                                if ($yardimcek['yardim_durum'] == 1) { ?>

                                    <a href="talep-detay?yardim_id=<?php echo $yardimcek['yardim_id']; ?>"><button type="button" class="btn btn-sm  btn-outline-info">Detay</button></a>
                                <?php } ?>

                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->

<?php include 'footer.php'; ?>