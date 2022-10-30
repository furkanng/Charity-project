<?php include 'header.php'; 

$yoksulsor = $db->prepare("SELECT * FROM yoksul order by yoksul_id ASC");
$yoksulsor->execute();

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">


                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-4">Gönüllü Verileri</h6>
                    </div>
                    <div class="col-sm-4">

                        <?php

                        if (!empty($_SESSION['yoksuldurum'] == "ok")) { ?>

                        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!
                        </div>

                        <?php

                            unset($_SESSION['yoksuldurum']);
                        } elseif (!empty($_SESSION['yoksuldurum'] == "no")) { ?>

                        <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!
                        </div>

                        <?php unset($_SESSION['yoksuldurum']);
                        };


                        ?>
                    </div>
                    <div class="col-sm-4" align="right">
                        <a href="yoksul-ekle"><button type="submit" class="btn btn-info btn-sm">Ekle</button></a>
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

                            while ($yoksulcek = $yoksulsor->fetch(PDO::FETCH_ASSOC)) {
                                $say++; ?>
                                <tr>
                                    <th scope="row"><?php echo $say ?></th>
                                    <td><?php echo $yoksulcek['yoksul_ad']; ?></td>
                                    <td><?php echo $yoksulcek['yoksul_soyad']; ?></td>
                                    <td><?php echo $yoksulcek['yoksul_mail']; ?></td>
                                    <td align="right"><?php

                                        if ($yoksulcek['yoksul_durum'] == 1) { ?>

                                            <a href="../netting/islem.php?yoksul_id=<?php echo $yoksulcek['yoksul_id']; ?>&yoksulonecikar=evet"><button class="btn btn-outline-success btn-sm">Aktif</button>

                                            <?php } else { ?>

                                                <a href="../netting/islem.php?yoksul_id=<?php echo $yoksulcek['yoksul_id']; ?>&yoksulonecikar=hayir"><button class="btn btn-outline-danger btn-sm">Pasif</button>

                                                <?php } ?>
                                    </td>
                                    <td align="right"><a href="gonullu-detay?yoksul_id=<?php echo $yoksulcek['yoksul_id']; ?>"><button class="btn btn-outline-info btn-sm">Detay</button></td>
                                    <td align="right"><a href="../netting/islem.php?yoksul_id=<?php echo $yoksulcek['yoksul_id']; ?>&yoksulsil=ok"><button class="btn btn-outline-danger btn-sm">Sil</button></td>
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