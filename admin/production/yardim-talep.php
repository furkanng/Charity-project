<?php include 'header.php'; 

$yardimsor = $db->prepare("SELECT * FROM yardim order by yardim_id ASC");
$yardimsor->execute();

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">


                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-4">Yardım Talep Verileri</h6>
                    </div>
                    <div class="col-sm-4">

                        <?php

                        if (!empty($_SESSION['yardimdurum'] == "ok")) { ?>

                        <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!
                        </div>

                        <?php

                            unset($_SESSION['yardimdurum']);
                        } elseif (!empty($_SESSION['yardimdurum'] == "no")) { ?>

                        <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!
                        </div>

                        <?php unset($_SESSION['yardimdurum']);
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

                            while ($yardimcek = $yardimsor->fetch(PDO::FETCH_ASSOC)) {
                                $say++; ?>
                                <tr>
                                    <th scope="row"><?php echo $say ?></th>
                                    <td><?php echo $yardimcek['yardim_ad']; ?></td>
                                    <td><?php echo $yardimcek['yardim_soyad']; ?></td>
                                    <td><?php echo $yardimcek['yardim_mail']; ?></td>
                                    <td><?php echo $yardimcek['yardim_tc']; ?></td>
                                    <td><?php echo $yardimcek['yardim_il']; ?></td>
                                    <td><?php

                                        if ($yardimcek['yardim_durum'] == 1) { ?>

                                            <button class="btn btn-outline-success btn-sm">Teknisyen İd: <?php echo $yardimcek['teknisyen_id']; ?></button>

                                            <?php } else { ?>

                                               <button class="btn btn-outline-info btn-sm">Bekliyor</button>

                                                <?php } ?>
                                    </td>
                                    <td><a href="../netting/islem.php?yardim_id=<?php echo $yardimcek['yardim_id']; ?>&yardimsil=ok"><button class="btn btn-outline-danger btn-sm">Sil</button></td>
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