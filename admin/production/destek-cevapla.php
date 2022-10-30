<?php include 'header.php';

$desteksor = $db-> prepare("SELECT * FROM destek where destek_id=:id");
$desteksor->execute(array(

  'id'=> $_GET['destek_id']

));
$destekcek = $desteksor->fetch(PDO::FETCH_ASSOC);

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">

            <div class="row">

                <div class="col-2"></div>
                <div class="col-8">
                    <div class="bg-secondary rounded h-100 p-4">
                        <form action="../netting/islem.php" method="POST">
                            <div class="row">

                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Ad</label>
                                        <input type="text" disabled class="form-control" name="destek_ad"
                                            value="<?php echo $destekcek['destek_ad']; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Soyad</label>
                                        <input type="text" disabled class="form-control" name="destek_soyad"
                                            value="<?php echo $destekcek['destek_soyad']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Mail</label>
                                        <input type="text" disabled class="form-control" name="destek_mail"
                                            value="<?php echo $destekcek['destek_mail']; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Telefon Numarası</label>
                                        <input type="text" disabled class="form-control" name="destek_gsm"
                                            value="<?php echo $destekcek['destek_gsm']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mesaj</label>
                                <input type="text" disabled class="form-control" name="destek_mesaj"
                                    value="<?php echo $destekcek['destek_mesaj']; ?>"></input>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Yanıt Mesajı</label>
                                <input type="text" required class="form-control" name="destek_yanit"></input>
                            </div>


                            <input type="hidden" name="destek_id" value="<?php echo $_GET['destek_id']; ?>">

                            <button type="submit" name="destekyanitla" class="btn btn-primary">Yanıtla</button>
                        </form>

                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<?php include 'footer.php'; ?>