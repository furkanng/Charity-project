<?php include 'header.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Destek Talepleri</span></h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Tüm Taleplerim</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <?php

                if (!empty($_SESSION['durum'] == "ok")) { ?>

                    <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem
                        Başarılı!
                    </div>

                <?php unset($_SESSION['durum']);
                } ?>

                <?php

                if (!empty($_SESSION['durum'] == "no")) { ?>

                    <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem
                        Başarısız!
                    </div>

                <?php unset($_SESSION['durum']);
                } ?>
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Kişiler</th>
                        <th>Durum</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <?php

                    $yoksul_id = $yoksulcek['yoksul_id'];
                    $desteksor = $db->prepare("SELECT * FROM destek where yoksul_id=:id");
                    $desteksor->execute(array(

                        'id' => $yoksul_id

                    ));

                    $say = 0;

                    while ($destekcek = $desteksor->fetch(PDO::FETCH_ASSOC)) {
                        $say++;


                    ?>



                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $say ?></strong>
                            </td>
                            <td><?php echo $destekcek['destek_ad']; ?></td>
                            <td><?php echo $destekcek['destek_soyad']; ?></td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="<?php echo $yoksulcek['yoksul_ad'] ?>">
                                    <?php
                                        if (!empty($yoksulcek['yoksul_resim']) > 0) { ?>
                                            <img src="../../<?php echo $yoksulcek['yoksul_resim']; ?>" class="rounded-circle">
                                        <?php } else { ?>
                                            <img src="../assets/img/avatars/profil.png" class="rounded-circle">
                                        <?php }
                                        ?>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Admin">
                                        <img src="../../admin/production/img/user.jpg" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <?php

                                if ($destekcek['destek_durum'] == 1) { ?>

                                    <span class="badge bg-label-primary me-1">Cevaplanmış</span>

                                <?php } else { ?>

                                    <span class="badge bg-label-warning me-1">Yanıt Bekleniyor</span>

                                <?php } ?>
                            </td>
                            <td>
                                <a href="destek-detay?destek_id=<?php echo $destekcek['destek_id']; ?>"><button type="button" class="btn btn-sm  btn-outline-info">Detay</button></a>
                            </td>
                            <td>
                                <a href="../../admin/netting/islem.php?destek_id=<?php echo $destekcek['destek_id']; ?>&desteksiltalepGonullu=ok"><button type="button" class="btn btn-sm  btn-outline-danger">Sil</button></a>
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