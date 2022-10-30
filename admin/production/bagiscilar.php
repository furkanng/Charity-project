<?php include 'header.php';

$bagiscisor = $db->prepare("SELECT * FROM bagisci order by bagisci_id ASC");
$bagiscisor->execute();

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">


                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="mb-4">Bağışcı Verileri</h6>
                    </div>
                    <div class="col-sm-4">

                        <?php

                        if (!empty($_SESSION['bagiscidurum'] == "ok")) { ?>

                            <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!
                            </div>

                        <?php

                            unset($_SESSION['bagiscidurum']);
                        } elseif (!empty($_SESSION['bagiscidurum'] == "no")) { ?>

                            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!
                            </div>

                        <?php unset($_SESSION['bagiscidurum']);
                        };


                        ?>
                    </div>
                    <div class="col-sm-4" align="right">
                        <a href="bagisci-ekle"><button type="submit" class="btn btn-info btn-sm">Ekle</button></a>
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

                            while ($bagiscicek = $bagiscisor->fetch(PDO::FETCH_ASSOC)) {
                                $say++; ?>
                                <tr>
                                    <th scope="row"><?php echo $say ?></th>
                                    <td><?php echo $bagiscicek['bagisci_ad']; ?></td>
                                    <td><?php echo $bagiscicek['bagisci_soyad']; ?></td>
                                    <td><?php echo $bagiscicek['bagisci_mail']; ?></td>
                                    <td align="right"><?php

                                            if ($bagiscicek['bagisci_durum'] == 1) { ?>

                                            <a href="../netting/islem.php?bagisci_id=<?php echo $bagiscicek['bagisci_id']; ?>&bagiscionecikar=evet"><button class="btn btn-outline-success btn-sm">Aktif</button>

                                            <?php } else { ?>

                                                <a href="../netting/islem.php?bagisci_id=<?php echo $bagiscicek['bagisci_id']; ?>&bagiscionecikar=hayir"><button class="btn btn-outline-danger btn-sm">Pasif</button>

                                                <?php } ?>
                                    </td>
                                    <td align="right"><a href="bagisci-detay?bagisci_id=<?php echo $bagiscicek['bagisci_id']; ?>"><button class="btn btn-outline-info btn-sm">Detay</button></td>
                                    <td align="right"><a href="../netting/islem.php?bagisci_id=<?php echo $bagiscicek['bagisci_id']; ?>&bagiscisil=ok"><button class="btn btn-outline-danger btn-sm">Sil</button></td>
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