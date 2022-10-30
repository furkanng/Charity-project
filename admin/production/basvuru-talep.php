<?php include 'header.php';

$basvurusor = $db->prepare("SELECT * FROM basvuru order by basvuru_id ASC");
$basvurusor->execute();

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">


                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-4">Başvuru Talep Verileri</h6>
                    </div>
                    <div class="col-sm-4">

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


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sıra</th>
                                <th scope="col">Ad</th>
                                <th scope="col">Soyad</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Tc</th>
                                <th scope="col">Şehir</th>
                                <th scope="col">Durum</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $say = 0;

                            while ($basvurucek = $basvurusor->fetch(PDO::FETCH_ASSOC)) {
                                $say++; ?>
                                <tr>
                                    <th scope="row"><?php echo $say ?></th>
                                    <td><?php echo $basvurucek['basvuru_ad']; ?></td>
                                    <td><?php echo $basvurucek['basvuru_soyad']; ?></td>
                                    <td><?php echo $basvurucek['basvuru_mail']; ?></td>
                                    <td><?php echo $basvurucek['basvuru_tc']; ?></td>
                                    <td><?php echo $basvurucek['basvuru_il']; ?></td>
                                    <td><?php

                                        if ($basvurucek['basvuru_durum'] == 1) { ?>

                                            <a href="../netting/islem.php?basvuru_id=<?php echo $basvurucek['basvuru_id']; ?>&basvuruonecikar=evet"><button class="btn btn-outline-success btn-sm">Aktif</button>

                                            <?php } else { ?>

                                                <a href="../netting/islem.php?basvuru_id=<?php echo $basvurucek['basvuru_id']; ?>&basvuruonecikar=hayir"><button class="btn btn-outline-danger btn-sm">Pasif</button>

                                                <?php } ?>
                                    </td>
                                    <td><a href="../netting/islem.php?basvuru_id=<?php echo $basvurucek['basvuru_id']; ?>&basvurusil=ok"><button class="btn btn-outline-danger btn-sm">Sil</button></td>
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