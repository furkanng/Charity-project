<?php include 'header.php';

$desteksor = $db->prepare("SELECT * FROM destek order by destek_id DESC");
$desteksor->execute();

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
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


                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-4">Destek Mesajları</h6>
                    </div>
                    <div class="col-sm-4">

                        <?php

                        if (!empty($_SESSION['destekdurum'] == "ok")) { ?>

                            <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!
                            </div>

                        <?php

                            unset($_SESSION['destekdurum']);
                        } elseif (!empty($_SESSION['destekdurum'] == "no")) { ?>

                            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!
                            </div>

                        <?php unset($_SESSION['destekdurum']);
                        };


                        ?>
                    </div>

                </div>



                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sıra</th>
                                <th scope="col">Ad</th>
                                <th scope="col">Soyad</th>
                                <th scope="col">Mail</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $say = 0;

                            while ($destekcek = $desteksor->fetch(PDO::FETCH_ASSOC)) {
                                $say++; ?>
                                <tr>
                                    <th scope="row"><?php echo $say ?></th>
                                    <td><?php echo $destekcek['destek_ad']; ?></td>
                                    <td><?php echo $destekcek['destek_soyad']; ?></td>
                                    <td><?php echo $destekcek['destek_mail']; ?></td>
                                    <td align="right"><?php

                                                        if ($destekcek['destek_durum'] == 1) { ?>

                                            <button class="btn btn-outline-success btn-sm">Cevaplanmış</button>

                                        <?php } else { ?>

                                            <button class="btn btn-outline-danger btn-sm">Yanıt Bekliyor</button>

                                        <?php } ?>
                                    </td>
                                    <td align="right"><a href="destek-cevapla?destek_id=<?php echo $destekcek['destek_id']; ?>"><button class="btn btn-outline-info btn-sm">Cevapla</button></td>
                                    <td align="right"><a href="../netting/islem.php?destek_id=<?php echo $destekcek['destek_id']; ?>&desteksililetisim=ok&$gelen_url"><button class="btn btn-outline-danger btn-sm">Sil</button></td>
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