<?php include 'header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bağış Yap / Bağış Türü /</span> Bayram Kurbanı</h4>

    <?php 

    if(!empty($_SESSION['durum']=="no")) { ?>

    <div class="p-1 mb-2 bg-danger text-white alert" align="center" role="alert">İşlem
        Başarısız!
    </div>

    <?php  unset($_SESSION['durum']);

    }?>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Formu Doldurunuz</h5>
                </div>
                <div class="card-body">
                    <form action="../../admin/netting/islem.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Ad</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" required=""
                                            id="basic-icon-default-fullname"
                                            value="<?php echo $bagiscicek['bagisci_ad']; ?>" name="sepet_ad" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Soyad</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" required="" name="sepet_soyad"
                                            id="basic-icon-default-fullname"
                                            value="<?php echo $bagiscicek['bagisci_soyad']; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">TELEFON NUMARASI</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">TR (+90)</span>
                                <input type="text" required="" id="phoneNumber" name="sepet_gsm"
                                    value="<?php echo $bagiscicek['bagisci_gsm']; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Mail</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input class="form-control" required="" type="email" id="email" name="sepet_mail"
                                    value="<?php echo $bagiscicek['bagisci_mail']; ?>" required="" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Bağış yapmak istediğiniz
                                sehir</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class='bx bxs-city'></i></span>
                                <select class="form-select" required="" name="sepet_sehir"
                                    id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option value="Adana">Adana</option>
                                    <option value="Adıyaman">Adıyaman</option>
                                    <option value="Afyonkarahisar">Afyonkarahisar</option>
                                    <option value="Ağrı">Ağrı</option>
                                    <option value="Amasya">Amasya</option>
                                    <option value="Ankara">Ankara</option>
                                    <option value="Antalya">Antalya</option>
                                    <option value="Artvin">Artvin</option>
                                    <option value="Aydın">Aydın</option>
                                    <option value="Balıkesir">Balıkesir</option>
                                    <option value="Bilecik">Bilecik</option>
                                    <option value="Bingöl">Bingöl</option>
                                    <option value="Bitlis">Bitlis</option>
                                    <option value="Bolu">Bolu</option>
                                    <option value="Burdur">Burdur</option>
                                    <option value="Bursa">Bursa</option>
                                    <option value="Çanakkale">Çanakkale</option>
                                    <option value="Çankırı">Çankırı</option>
                                    <option value="Çorum">Çorum</option>
                                    <option value="Denizli">Denizli</option>
                                    <option value="Diyarbakır">Diyarbakır</option>
                                    <option value="Edirne">Edirne</option>
                                    <option value="Elazığ">Elazığ</option>
                                    <option value="Erzincan">Erzincan</option>
                                    <option value="Erzurum">Erzurum</option>
                                    <option value="Eskişehir">Eskişehir</option>
                                    <option value="Gaziantep">Gaziantep</option>
                                    <option value="Giresun">Giresun</option>
                                    <option value="Gümüşhane">Gümüşhane</option>
                                    <option value="Hakkari">Hakkâri</option>
                                    <option value="Hatay">Hatay</option>
                                    <option value="Isparta">Isparta</option>
                                    <option value="Mersin">Mersin</option>
                                    <option value="İstanbul">İstanbul</option>
                                    <option value="İzmir">İzmir</option>
                                    <option value="Kars">Kars</option>
                                    <option value="Kastamonu">Kastamonu</option>
                                    <option value="Kayseri">Kayseri</option>
                                    <option value="Kırklareli">Kırklareli</option>
                                    <option value="Kırşehir">Kırşehir</option>
                                    <option value="Kocaeli">Kocaeli</option>
                                    <option value="Konya">Konya</option>
                                    <option value="Kütahya">Kütahya</option>
                                    <option value="Malatya">Malatya</option>
                                    <option value="Manisa">Manisa</option>
                                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                                    <option value="Mardin">Mardin</option>
                                    <option value="Muğla">Muğla</option>
                                    <option value="Muş">Muş</option>
                                    <option value="Nevşehir">Nevşehir</option>
                                    <option value="Niğde">Niğde</option>
                                    <option value="Ordu">Ordu</option>
                                    <option value="Rize">Rize</option>
                                    <option value="Sakarya">Sakarya</option>
                                    <option value="Samsun">Samsun</option>
                                    <option value="Siirt">Siirt</option>
                                    <option value="Sinop">Sinop</option>
                                    <option value="Sivas">Sivas</option>
                                    <option value="Tekirdağ">Tekirdağ</option>
                                    <option value="Tokat">Tokat</option>
                                    <option value="Trabzon">Trabzon</option>
                                    <option value="Tunceli">Tunceli</option>
                                    <option value="Şanlıurfa">Şanlıurfa</option>
                                    <option value="Uşak">Uşak</option>
                                    <option value="Van">Van</option>
                                    <option value="Yozgar">Yozgat</option>
                                    <option value="Zonguldak">Zonguldak</option>
                                    <option value="Aksaray">Aksaray</option>
                                    <option value="Bayburt">Bayburt</option>
                                    <option value="Karaman">Karaman</option>
                                    <option value="Kırıkkale">Kırıkkale</option>
                                    <option value="Batman">Batman</option>
                                    <option value="Şırnak">Şırnak</option>
                                    <option value="Bartın">Bartın</option>
                                    <option value="Ardahan">Ardahan</option>
                                    <option value="Iğdır">Iğdır</option>
                                    <option value="Yalova">Yalova</option>
                                    <option value="Karabük">Karabük</option>
                                    <option value="Kilis">Kilis</option>
                                    <option value="Osmaniye">Osmaniye</option>
                                    <option value="Düzce">Düzce</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="form-label" for="basic-icon-default-company">Kurban Adedi</label>
                            <div class="col-md">
                                <input class="form-control" name="sepet_adet" type="number" required="" value="1"
                                    id="html5-number-input" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="form-label" for="basic-icon-default-company">Birim Adet</label>
                            <div class="col-md">
                                <input class="form-control" disabled type="text" value="5.000 ₺" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Bağış Oranı</label>
                            <select class="form-select" required name="sepet_oran">
                                <option value="1">1/3</option>
                                <option value="2">2/3</option>
                                <option value="3">Tamamı</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="badge bg-label-primary">Kurbanımı kesmesi ve ihtiyaç sahiplerine dağıtması
                                için vekaletimi veriyorum.</label>
                        </div>

                        <input type="hidden" name="bagisci_id" value="<?php echo $bagiscicek['bagisci_id']; ?>">

                        <button type="submit" name="sepeteklebayram" class="btn btn-primary">Sepete Ekle</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl">

        </div>
    </div>
</div>
<!-- / Content -->
<?php include 'footer.php'; ?>