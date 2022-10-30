<?php include 'header.php'; ?>

<div class="container login-container">
<div class="d-flex justify-content-center">
        <h1 class="semi-bold-600 pb-2" style="border-bottom: 5px solid red;">Teknisyen Girişi</h1>
    </div>
    <div class="row">
        <div class="col-md-6 login-form-1">

            <?php 

           if(!empty($_SESSION['giris']=="basarisiz")) { ?>

            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">Giriş Başarısız!</div>

            <?php  unset($_SESSION['giris']);

           }?>
            <h3>Oturum Aç</h3>


            <form action="admin/netting/islem.php" method="POST">
                <div class="form-group">
                    <input type="email" name="teknisyen_mail" class="form-control" placeholder="E-Mail adresi" />
                </div>
                <div class="form-group">
                    <input type="password" name="teknisyen_password" class="form-control" placeholder="Şİfre" />
                </div>
                <div class="form-group">
                    <input type="submit" name="teknisyenGiris" class="btnSubmit" value="Giriş Yap" />
                </div>
                <div class="form-group">
                    <a href="#" class="btnForgetPwd">Şifremi Unuttum?</a>
                </div>
            </form>
        </div>
        <div class="col-md-6 login-form-2">
            <div class="login-logo">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            </div>


            <?php 

            if(!empty($_SESSION['kaydol']=="basarili")) { ?>

            <div class="p-1 mb-2 bg-success text-white alert" align="center" role="alert">İşlem Başarılı!</div>

            <?php  unset($_SESSION['kaydol']);

            }?>

            <?php 

            if(!empty($_SESSION['kaydol']=="basarisiz")) { ?>

            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem Başarısız!</div>

            <?php  unset($_SESSION['kaydol']);

           }?>


            <?php 

            if(!empty($_SESSION['kaydol']=="mukerrer")) { ?>

            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">Kullanıcı Daha Önceden Kayıt
                edilmiş
            </div>

            <?php  unset($_SESSION['kaydol']);

            }?>

            <?php 

            if(!empty($_SESSION['kaydol']=="eksiksifre")) { ?>

            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">Eksik Şifre Girdiniz!
                (Şifreniz 6 haneden büyük olmalı)
            </div>

            <?php  unset($_SESSION['kaydol']);

            }?>

            <?php 

            if(!empty($_SESSION['kaydol']=="farklisifre")) { ?>

            <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">Farklı Şifre Girdiniz!
            </div>

            <?php  unset($_SESSION['kaydol']);

            }?>

            <h3>Kayıt Ol</h3>

            <form action="admin/netting/islem.php" method="POST">

                <div class="form-group">
                    <input type="email" name="teknisyen_mail" class="form-control" placeholder="E-Mail adresi" />
                </div>

                <div class="row">
                    <div class="col form-group">
                        <input type="text" name="teknisyen_ad" class="form-control" placeholder="Ad" />
                    </div>
                    <div class="col form-group">
                        <input type="text" name="teknisyen_soyad" class="form-control" placeholder="Soyad" />
                    </div>

                </div>
                <div class="row">
                    <div class="col form-group">
                        <input type="password" name="teknisyen_passwordone" class="form-control" placeholder="Şİfre" />
                    </div>
                    <div class="col form-group">
                        <input type="password" name="teknisyen_passwordtwo" class="form-control"
                            placeholder="Şİfre tekrar" />
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="teknisyenKayit" class="btnSubmit" value="Kayıt Ol" />
                </div>

            </form>
        </div>
    </div>
</div>






<?php include 'footer.php'; ?>