<?php
ob_start();
session_start();

error_reporting(0);

include 'baglan.php';

if (isset($_POST['admingiris'])) {

	$kullanici_mail = $_POST['kullanici_mail'];
	$kullanici_password = ($_POST['kullanici_password']);

	$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
	));

	echo $say = $kullanicisor->rowCount();

	if ($say == 1) {

		$_SESSION['kullanici_mail'] = $kullanici_mail;
		$_SESSION['giris'] = "basarili";
		header("Location:../production/index");
		exit;
	} else {
		$_SESSION['giris'] = "basarisiz";
		header("Location:../production/login");
		exit;
	}
}

if (isset($_POST['bagisciKayit'])) {


	echo $bagisci_ad = htmlspecialchars($_POST['bagisci_ad']);
	echo "<br>";
	echo $bagisci_soyad = htmlspecialchars($_POST['bagisci_soyad']);
	echo "<br>";
	echo $bagisci_mail = htmlspecialchars($_POST['bagisci_mail']);
	echo "<br>";

	echo $bagisci_passwordone = $_POST['bagisci_passwordone'];
	echo "<br>";
	echo $bagisci_passwordtwo = $_POST['bagisci_passwordtwo'];
	echo "<br>";


	if ($bagisci_passwordone == $bagisci_passwordtwo) {


		if (strlen($bagisci_passwordone) >= 6) {


			$bagiscisor = $db->prepare("select * from bagisci where bagisci_mail=:mail");
			$bagiscisor->execute(array(
				'mail' => $bagisci_mail
			));

			//dönen satır sayısını belirtir
			$say = $bagiscisor->rowCount();



			if ($say == 0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password = md5($bagisci_passwordone);

				$bagisci_yetki = 1;

				//Kullanıcı kayıt işlemi yapılıyor...
				$bagiscikaydet = $db->prepare("INSERT INTO bagisci SET
					bagisci_ad=:bagisci_ad,
					bagisci_soyad=:bagisci_soyad,
					bagisci_mail=:bagisci_mail,
					bagisci_password=:bagisci_password,
					bagisci_yetki=:bagisci_yetki
					");
				$insert = $bagiscikaydet->execute(array(
					'bagisci_ad' => $bagisci_ad,
					'bagisci_soyad' => $bagisci_soyad,
					'bagisci_mail' => $bagisci_mail,
					'bagisci_password' => $password,
					'bagisci_yetki' => $bagisci_yetki
				));

				if ($insert) {

					$_SESSION['kaydol'] = "basarili";
					header("Location:../../bagisyap");
				} else {
					$_SESSION['kaydol'] = "basarisiz";
					header("Location:../../bagisyap");
				}
			} else {
				$_SESSION['kaydol'] = "mukerrer";
				header("Location:../../bagisyap");
			}
		} else {
			$_SESSION['kaydol'] = "eksiksifre";
			header("Location:../../bagisyap");
		}
	} else {

		$_SESSION['kaydol'] = "farklisifre";
		header("Location:../../bagisyap");
	}
}

if (isset($_POST['bagisciGiris'])) {

	echo $bagisci_mail = htmlspecialchars($_POST['bagisci_mail']);
	echo $bagisci_password = md5($_POST['bagisci_password']);

	$bagiscisor = $db->prepare("select * from bagisci where bagisci_mail=:mail and bagisci_yetki=:yetki and bagisci_password=:password");
	$bagiscisor->execute(array(
		'mail' => $bagisci_mail,
		'yetki' => 1,
		'password' => $bagisci_password
	));

	$say = $bagiscisor->rowCount();

	if ($say == 1) {

		echo $_SESSION['userbagisci_mail'] = $bagisci_mail;
		$_SESSION['giris'] = "basarili";
		header("Location:../../bagisci-panel/html/index");
		exit;
	} else {

		$_SESSION['giris'] = "basarisiz";
		header("Location:../../bagisyap");
	}
}

if (isset($_POST['yoksulKayit'])) {


	echo $yoksul_ad = htmlspecialchars($_POST['yoksul_ad']);
	echo "<br>";
	echo $yoksul_soyad = htmlspecialchars($_POST['yoksul_soyad']);
	echo "<br>";
	echo $yoksul_mail = htmlspecialchars($_POST['yoksul_mail']);
	echo "<br>";

	echo $yoksul_passwordone = $_POST['yoksul_passwordone'];
	echo "<br>";
	echo $yoksul_passwordtwo = $_POST['yoksul_passwordtwo'];
	echo "<br>";


	if ($yoksul_passwordone == $yoksul_passwordtwo) {


		if (strlen($yoksul_passwordone) >= 6) {


			$yoksulsor = $db->prepare("select * from yoksul where yoksul_mail=:mail");
			$yoksulsor->execute(array(
				'mail' => $yoksul_mail
			));

			//dönen satır sayısını belirtir
			$say = $yoksulsor->rowCount();



			if ($say == 0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password = md5($yoksul_passwordone);

				$yoksul_yetki = 1;

				//Kullanıcı kayıt işlemi yapılıyor...
				$yoksulkaydet = $db->prepare("INSERT INTO yoksul SET
					yoksul_ad=:yoksul_ad,
					yoksul_soyad=:yoksul_soyad,
					yoksul_mail=:yoksul_mail,
					yoksul_password=:yoksul_password,
					yoksul_yetki=:yoksul_yetki
					");
				$insert = $yoksulkaydet->execute(array(
					'yoksul_ad' => $yoksul_ad,
					'yoksul_soyad' => $yoksul_soyad,
					'yoksul_mail' => $yoksul_mail,
					'yoksul_password' => $password,
					'yoksul_yetki' => $yoksul_yetki
				));

				if ($insert) {

					$_SESSION['kaydol'] = "basarili";
					header("Location:../../bagisal");
				} else {
					$_SESSION['kaydol'] = "basarisiz";
					header("Location:../../bagisal");
				}
			} else {
				$_SESSION['kaydol'] = "mukerrer";
				header("Location:../../bagisal");
			}
		} else {
			$_SESSION['kaydol'] = "eksiksifre";
			header("Location:../../bagisal");
		}
	} else {

		$_SESSION['kaydol'] = "farklisifre";
		header("Location:../../bagisal");
	}
}

if (isset($_POST['yoksulGiris'])) {

	echo $yoksul_mail = htmlspecialchars($_POST['yoksul_mail']);
	echo $yoksul_password = md5($_POST['yoksul_password']);

	$yoksulsor = $db->prepare("select * from yoksul where yoksul_mail=:mail and yoksul_yetki=:yetki and yoksul_password=:password");
	$yoksulsor->execute(array(
		'mail' => $yoksul_mail,
		'yetki' => 1,
		'password' => $yoksul_password
	));

	$say = $yoksulsor->rowCount();

	if ($say == 1) {

		echo $_SESSION['useryoksul_mail'] = $yoksul_mail;
		$_SESSION['giris'] = "basarili";
		header("Location:../../gonullu-panel/html/index");
		exit;
	} else {

		$_SESSION['giris'] = "basarisiz";
		header("Location:../../bagisyap");
	}
}

if ($_GET['bagiscionecikar'] == "hayir") {

	$bagisci_id = $_GET['bagisci_id'];
	$bagisci_durum = 1;
	$bagisciduzenle = $db->prepare("UPDATE bagisci SET 
		bagisci_durum=:bagisci_durum
		where bagisci_id ={$_GET['bagisci_id']}
		");

	$update = $bagisciduzenle->execute(array(

		'bagisci_durum' => $bagisci_durum
	));

	if ($update) {
		$_SESSION['bagiscidurum'] = "ok";
		header('Location:../production/bagiscilar?bagisci_id=$bagisci_id');
	} else {
		$_SESSION['bagiscidurum'] = "no";
		header('Location:../production/bagiscilar?bagisci_id=$bagisci_id');
	}
}

if ($_GET['bagiscionecikar'] == "evet") {

	$bagisci_id = $_GET['bagisci_id'];
	$bagisci_durum = 0;
	$bagisciduzenle = $db->prepare("UPDATE bagisci SET 
		bagisci_durum=:bagisci_durum
		where bagisci_id ={$_GET['bagisci_id']}
		");

	$update = $bagisciduzenle->execute(array(

		'bagisci_durum' => $bagisci_durum
	));

	if ($update) {
		$_SESSION['bagiscidurum'] = "ok";
		header('Location:../production/bagiscilar?bagisci_id=$bagisci_id');
	} else {
		$_SESSION['bagiscidurum'] = "no";
		header('Location:../production/bagiscilar?bagisci_id=$bagisci_id');
	}
}

if ($_GET['yoksulonecikar'] == "hayir") {

	$yoksul_id = $_GET['yoksul_id'];
	$yoksul_durum = 1;
	$yoksulduzenle = $db->prepare("UPDATE yoksul SET 
		yoksul_durum=:yoksul_durum
		where yoksul_id ={$_GET['yoksul_id']}
		");

	$update = $yoksulduzenle->execute(array(

		'yoksul_durum' => $yoksul_durum
	));

	if ($update) {
		$_SESSION['yoksuldurum'] = "ok";
		header('Location:../production/gonulluler?yoksul_id=$yoksul_id');
	} else {
		$_SESSION['yoksuldurum'] = "no";
		header('Location:../production/gonulluler?yoksul_id=$yoksul_id');
	}
}

if ($_GET['yoksulonecikar'] == "evet") {

	$yoksul_id = $_GET['yoksul_id'];
	$yoksul_durum = 0;
	$yoksulduzenle = $db->prepare("UPDATE yoksul SET 
		yoksul_durum=:yoksul_durum
		where yoksul_id ={$_GET['yoksul_id']}
		");

	$update = $yoksulduzenle->execute(array(

		'yoksul_durum' => $yoksul_durum
	));

	if ($update) {
		$_SESSION['yoksuldurum'] = "ok";
		header('Location:../production/gonulluler?yoksul_id=$yoksul_id');
	} else {
		$_SESSION['yoksuldurum'] = "no";
		header('Location:../production/gonulluler?yoksul_id=$yoksul_id');
	}
}

if ($_GET['bagiscisil'] == "ok") {

	$sil = $db->prepare("DELETE from bagisci where bagisci_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['bagisci_id']

	));



	if ($kontrol) {
		$_SESSION['bagiscidurum'] = "ok";
		header('Location:../production/bagiscilar');
	} else {
		$_SESSION['bagiscidurum'] = "no";
		header('Location:../production/bagiscilar');
	}
}


if ($_GET['yoksulsil'] == "ok") {

	$sil = $db->prepare("DELETE from yoksul where yoksul_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['yoksul_id']

	));



	if ($kontrol) {
		$_SESSION['yoksuldurum'] = "ok";
		header('Location:../production/gonulluler');
	} else {
		$_SESSION['yoksuldurum'] = "no";
		header('Location:../production/gonulluler');
	}
}

if (isset($_POST['teknisyenKayit'])) {


	echo $teknisyen_ad = htmlspecialchars($_POST['teknisyen_ad']);
	echo "<br>";
	echo $teknisyen_soyad = htmlspecialchars($_POST['teknisyen_soyad']);
	echo "<br>";
	echo $teknisyen_mail = htmlspecialchars($_POST['teknisyen_mail']);
	echo "<br>";

	echo $teknisyen_passwordone = $_POST['teknisyen_passwordone'];
	echo "<br>";
	echo $teknisyen_passwordtwo = $_POST['teknisyen_passwordtwo'];
	echo "<br>";


	if ($teknisyen_passwordone == $teknisyen_passwordtwo) {


		if (strlen($teknisyen_passwordone) >= 6) {


			$teknisyensor = $db->prepare("select * from teknisyen where teknisyen_mail=:mail");
			$teknisyensor->execute(array(
				'mail' => $teknisyen_mail
			));

			//dönen satır sayısını belirtir
			$say = $teknisyensor->rowCount();



			if ($say == 0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password = md5($teknisyen_passwordone);

				$teknisyen_yetki = 1;

				//Kullanıcı kayıt işlemi yapılıyor...
				$teknisyenkaydet = $db->prepare("INSERT INTO teknisyen SET
					teknisyen_ad=:teknisyen_ad,
					teknisyen_soyad=:teknisyen_soyad,
					teknisyen_mail=:teknisyen_mail,
					teknisyen_password=:teknisyen_password,
					teknisyen_yetki=:teknisyen_yetki
					");
				$insert = $teknisyenkaydet->execute(array(
					'teknisyen_ad' => $teknisyen_ad,
					'teknisyen_soyad' => $teknisyen_soyad,
					'teknisyen_mail' => $teknisyen_mail,
					'teknisyen_password' => $password,
					'teknisyen_yetki' => $teknisyen_yetki
				));

				if ($insert) {

					$_SESSION['kaydol'] = "basarili";
					header("Location:../../teknisyen");
				} else {
					$_SESSION['kaydol'] = "basarisiz";
					header("Location:../../teknisyen");
				}
			} else {
				$_SESSION['kaydol'] = "mukerrer";
				header("Location:../../teknisyen");
			}
		} else {
			$_SESSION['kaydol'] = "eksiksifre";
			header("Location:../../teknisyen");
		}
	} else {

		$_SESSION['kaydol'] = "farklisifre";
		header("Location:../../teknisyen");
	}
}

if (isset($_POST['teknisyenGiris'])) {

	echo $teknisyen_mail = htmlspecialchars($_POST['teknisyen_mail']);
	echo $teknisyen_password = md5($_POST['teknisyen_password']);

	$teknisyensor = $db->prepare("select * from teknisyen where teknisyen_mail=:mail and teknisyen_yetki=:yetki and teknisyen_password=:password");
	$teknisyensor->execute(array(
		'mail' => $teknisyen_mail,
		'yetki' => 1,
		'password' => $teknisyen_password
	));

	$say = $teknisyensor->rowCount();

	if ($say == 1) {

		echo $_SESSION['userteknisyen_mail'] = $teknisyen_mail;
		$_SESSION['giris'] = "basarili";
		header("Location:../../teknisyen-panel/html/index");
		exit;
	} else {

		$_SESSION['giris'] = "basarisiz";
		header("Location:../../teknisyen");
	}
}


if ($_GET['teknisyensil'] == "ok") {

	$sil = $db->prepare("DELETE from teknisyen where teknisyen_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['teknisyen_id']

	));



	if ($kontrol) {
		$_SESSION['teknisyendurum'] = "ok";
		header('Location:../production/teknisyenler');
	} else {
		$_SESSION['teknisyendurum'] = "no";
		header('Location:../production/teknisyenler');
	}
}

if ($_GET['teknisyenonecikar'] == "evet") {

	$teknisyen_id = $_GET['teknisyen_id'];
	$teknisyen_durum = 0;
	$teknisyenduzenle = $db->prepare("UPDATE teknisyen SET 
		teknisyen_durum=:teknisyen_durum
		where teknisyen_id ={$_GET['teknisyen_id']}
		");

	$update = $teknisyenduzenle->execute(array(

		'teknisyen_durum' => $teknisyen_durum
	));

	if ($update) {
		$_SESSION['teknisyendurum'] = "ok";
		header('Location:../production/teknisyenler?teknisyen_id=$teknisyen_id');
	} else {
		$_SESSION['teknisyendurum'] = "no";
		header('Location:../production/teknisyenler?teknisyen_id=$teknisyen_id');
	}
}


if ($_GET['teknisyenonecikar'] == "hayir") {

	$teknisyen_id = $_GET['teknisyen_id'];
	$teknisyen_durum = 1;
	$teknisyenduzenle = $db->prepare("UPDATE teknisyen SET 
		teknisyen_durum=:teknisyen_durum
		where teknisyen_id ={$_GET['teknisyen_id']}
		");

	$update = $teknisyenduzenle->execute(array(

		'teknisyen_durum' => $teknisyen_durum
	));

	if ($update) {
		$_SESSION['teknisyendurum'] = "ok";
		header('Location:../production/teknisyenler?teknisyen_id=$teknisyen_id');
	} else {
		$_SESSION['teknisyendurum'] = "no";
		header('Location:../production/teknisyenler?teknisyen_id=$teknisyen_id');
	}
}

if (isset($_POST['bagiscihesapkaydet'])) {

	$bagisci_id = $_POST['bagisci_id'];

	$ayarkaydet = $db->prepare("UPDATE bagisci SET

		bagisci_ad =:bagisci_ad,
		bagisci_soyad =:bagisci_soyad,
		bagisci_mail=:bagisci_mail,
		bagisci_tc=:bagisci_tc,
		bagisci_gsm=:bagisci_gsm,
		bagisci_il=:bagisci_il,
		bagisci_ilce=:bagisci_ilce,
		bagisci_adres=:bagisci_adres
		WHERE bagisci_id={$_POST['bagisci_id']}");

	$update = $ayarkaydet->execute(array(

		'bagisci_ad' => $_POST['bagisci_ad'],
		'bagisci_soyad' => $_POST['bagisci_soyad'],
		'bagisci_mail' => $_POST['bagisci_mail'],
		'bagisci_tc' => $_POST['bagisci_tc'],
		'bagisci_gsm' => $_POST['bagisci_gsm'],
		'bagisci_il' => $_POST['bagisci_il'],
		'bagisci_ilce' => $_POST['bagisci_ilce'],
		'bagisci_adres' => $_POST['bagisci_adres']
	));

	if ($update) {

		$_SESSION['durum'] = "ok";
		header("Location:../../bagisci-panel/html/hesap-bilgilerim?bagisci_id=$bagisci_id");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../bagisci-panel/html/hesap-bilgilerim?bagisci_id=$bagisci_id");
	}
}

if (isset($_POST['hesapkaldir'])) {

	$bagisci_id = $_POST['bagisci_id'];

	if ($_POST['hesabimsil'] == "on") {

		$sil = $db->prepare("DELETE from bagisci where bagisci_id=:id");
		$kontrol = $sil->execute(array(

			'id' => $_POST['bagisci_id']

		));

		if ($kontrol) {
			header('Location:../../index');
		}
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../bagisci-panel/html/hesap-bilgilerim');
	}
}


if (isset($_POST['sepetekleadak'])) {
	$kg = 60;
	$sepet_adet = $_POST['sepet_adet'];

	$sepet_kategori = "Adak Kurbanı";
	$sepet_kg = $kg * $sepet_adet;
	$sepet_oran = 'Tamamı';

	$ayarkaydet = $db->prepare("INSERT INTO sepet SET

		sepet_ad =:sepet_ad,
		sepet_soyad =:sepet_soyad,
		sepet_gsm=:sepet_gsm,
		sepet_mail=:sepet_mail,
		sepet_sehir=:sepet_sehir,
		sepet_adet=:sepet_adet,
		sepet_kategori=:sepet_kategori,
		bagisci_id=:bagisci_id,
		sepet_kg=:sepet_kg,
		sepet_oran=:sepet_oran
		");

	$insert = $ayarkaydet->execute(array(

		'sepet_ad' => $_POST['sepet_ad'],
		'sepet_soyad' => $_POST['sepet_soyad'],
		'sepet_gsm' => $_POST['sepet_gsm'],
		'sepet_mail' => $_POST['sepet_mail'],
		'sepet_sehir' => $_POST['sepet_sehir'],
		'sepet_adet' => $_POST['sepet_adet'],
		'sepet_kategori' => $sepet_kategori,
		'bagisci_id' => $_POST['bagisci_id'],
		'sepet_kg' => $sepet_kg,
		'sepet_oran' => $sepet_oran
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../bagisci-panel/html/sepet");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../bagisci-panel/html/adak-kurbani");
	}
}

if (isset($_POST['sepeteklesukur'])) {
	$kg = 60;
	$sepet_adet = $_POST['sepet_adet'];

	$sepet_kategori = "Şükür Kurbanı";
	$sepet_kg = $kg * $sepet_adet;
	$sepet_oran = 'Tamamı';

	$ayarkaydet = $db->prepare("INSERT INTO sepet SET

		sepet_ad =:sepet_ad,
		sepet_soyad =:sepet_soyad,
		sepet_gsm=:sepet_gsm,
		sepet_mail=:sepet_mail,
		sepet_sehir=:sepet_sehir,
		sepet_adet=:sepet_adet,
		sepet_kategori=:sepet_kategori,
		bagisci_id=:bagisci_id,
		sepet_kg=:sepet_kg,
		sepet_oran=:sepet_oran
		");

	$insert = $ayarkaydet->execute(array(

		'sepet_ad' => $_POST['sepet_ad'],
		'sepet_soyad' => $_POST['sepet_soyad'],
		'sepet_gsm' => $_POST['sepet_gsm'],
		'sepet_mail' => $_POST['sepet_mail'],
		'sepet_sehir' => $_POST['sepet_sehir'],
		'sepet_adet' => $_POST['sepet_adet'],
		'sepet_kategori' => $sepet_kategori,
		'bagisci_id' => $_POST['bagisci_id'],
		'sepet_kg' => $sepet_kg,
		'sepet_oran' => $sepet_oran
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../bagisci-panel/html/sepet");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../bagisci-panel/html/sukur-kurbani");
	}
}

if (isset($_POST['sepeteklebayram'])) {
	$kg = 60;
	$sepet_adet = $_POST['sepet_adet'];

	$sepet_kategori = "Bayram Kurbanı";
	$sepet_kg = $kg * $sepet_adet;

	$ayarkaydet = $db->prepare("INSERT INTO sepet SET

		sepet_ad =:sepet_ad,
		sepet_soyad =:sepet_soyad,
		sepet_gsm=:sepet_gsm,
		sepet_mail=:sepet_mail,
		sepet_sehir=:sepet_sehir,
		sepet_adet=:sepet_adet,
		sepet_kategori=:sepet_kategori,
		bagisci_id=:bagisci_id,
		sepet_kg=:sepet_kg,
		sepet_oran=:sepet_oran
		");

	$insert = $ayarkaydet->execute(array(

		'sepet_ad' => $_POST['sepet_ad'],
		'sepet_soyad' => $_POST['sepet_soyad'],
		'sepet_gsm' => $_POST['sepet_gsm'],
		'sepet_mail' => $_POST['sepet_mail'],
		'sepet_sehir' => $_POST['sepet_sehir'],
		'sepet_adet' => $_POST['sepet_adet'],
		'sepet_kategori' => $sepet_kategori,
		'bagisci_id' => $_POST['bagisci_id'],
		'sepet_kg' => $sepet_kg,
		'sepet_oran' => $_POST['sepet_oran']
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../bagisci-panel/html/sepet");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../bagisci-panel/html/bayram-kurbani");
	}
}


if (isset($_POST['destek'])) {
	$destek_durum = 0;

	$ayarkaydet = $db->prepare("INSERT INTO destek SET

		destek_ad =:destek_ad,
		destek_soyad =:destek_soyad,
		destek_gsm=:destek_gsm,
		destek_mail=:destek_mail,
		destek_mesaj=:destek_mesaj,
		bagisci_id=:bagisci_id,
		destek_durum=:destek_durum
		");

	$insert = $ayarkaydet->execute(array(

		'destek_ad' => $_POST['destek_ad'],
		'destek_soyad' => $_POST['destek_soyad'],
		'destek_gsm' => $_POST['destek_gsm'],
		'destek_mail' => $_POST['destek_mail'],
		'destek_mesaj' => $_POST['destek_mesaj'],
		'bagisci_id' => $_POST['bagisci_id'],
		'destek_durum' => $destek_durum
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../bagisci-panel/html/destek");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../bagisci-panel/html/destek");
	}
}


if (isset($_POST['destekyanitla'])) {

	$destek_durum = 1;
	$destek_id = $_POST['destek_id'];

	$kaydet = $db->prepare("UPDATE destek SET


		destek_yanit=:destek_yanit,
		destek_durum=:destek_durum
		WHERE destek_id={$_POST['destek_id']}");


	$update = $kaydet->execute(array(

		'destek_yanit' => $_POST['destek_yanit'],
		'destek_durum' => $destek_durum
	));


	if ($update) {

		$_SESSION['durum'] = "ok";
		header("Location:../production/iletisim?destek_id=$destek_id");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../production/iletisim?destek_id=$destek_id");
	}
}


if ($_GET['desteksililetisim'] == "ok") {

	$sil = $db->prepare("DELETE from destek where destek_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['destek_id']

	));



	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../production/iletisim');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../production/iletisim');
	}
}

if ($_GET['desteksiltalep'] == "ok") {

	$sil = $db->prepare("DELETE from destek where destek_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['destek_id']

	));



	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../../bagisci-panel/html/destek-talepleri');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../bagisci-panel/html/destek-talepleri');
	}
}

if ($_GET['desteksiltalepGonullu'] == "ok") {

	$sil = $db->prepare("DELETE from destek where destek_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['destek_id']

	));



	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../../gonullu-panel/html/destek-talepleri');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../gonullu-panel/html/destek-talepleri');
	}
}

if ($_GET['desteksildetay'] == "ok") {

	$sil = $db->prepare("DELETE from destek where destek_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['destek_id']

	));



	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../../bagisci-panel/html/destek-talepleri');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../bagisci-panel/html/destek-talepleri');
	}
}

if ($_GET['desteksildetayGonullu'] == "ok") {

	$sil = $db->prepare("DELETE from destek where destek_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['destek_id']

	));



	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../../gonullu-panel/html/destek-talepleri');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../gonullu-panel/html/destek-talepleri');
	}
}

//sipariş işlemleri

if (isset($_POST['siparisTamamla'])) {


	$kaydet = $db->prepare("INSERT INTO siparis SET
	
		bagisci_id=:bagisci_id,
		odenecek_tutar =:odenecek_tutar
	
	
	");

	$insert = $kaydet->execute(array(

		'bagisci_id' => $_POST['bagisci_id'],
		'odenecek_tutar' => $_POST['odenecek_tutar']

	));


	if ($insert) {

		//sipariş başarılı kaydedilirse

		echo $siparis_id = $db->lastInsertId();
		echo "<hr>";
		echo $_POST['bagisci_id'];

		$urunler = $_POST['sepet_kategori'];
		$adetler = $_POST['sepet_adet'];
		$adlar = $_POST['sepet_ad'];
		$soyadlar = $_POST['sepet_soyad'];
		$gsmler = $_POST['sepet_gsm'];
		$sehirler = $_POST['sepet_sehir'];
		$mailler = $_POST['sepet_mail'];
		$kgler = $_POST['sepet_kg'];
		$oranlar = $_POST['sepet_oran'];

		foreach ($urunler as $key => $urun) {


			$sepetsor = $db->prepare("SELECT * FROM sepet where bagisci_id=:id");
			$sepetsor->execute(array(

				'id' => $urun,

			));


			$kaydet = $db->prepare("INSERT INTO siparis_detay SET
			
				siparis_id=:siparis_id,
				sepet_adet=:sepet_adet,
				sepet_ad=:sepet_ad,
				sepet_soyad=:sepet_soyad,
				sepet_gsm=:sepet_gsm,
				sepet_sehir=:sepet_sehir,
				sepet_mail=:sepet_mail,
				sepet_kg=:sepet_kg,
				sepet_oran=:sepet_oran,
				sepet_kategori=:sepet_kategori

		        ");



			$insert = $kaydet->execute(array(

				'siparis_id' => $siparis_id,
				'sepet_adet' => $adetler[$key],
				'sepet_ad' => $adlar[$key],
				'sepet_soyad' => $soyadlar[$key],
				'sepet_gsm' => $gsmler[$key],
				'sepet_sehir' => $sehirler[$key],
				'sepet_mail' => $mailler[$key],
				'sepet_kg' => $kgler[$key],
				'sepet_oran' => $oranlar[$key],
				'sepet_kategori' => $urun

			));
		}

		if ($insert) {
			# sipariş kayıt başarılı ise sepeti boşaltma

			$sil = $db->prepare("DELETE from sepet where bagisci_id=:bagisci_id");
			$kontrol = $sil->execute(array(

				'bagisci_id' => $_POST['bagisci_id']

			));
			$_SESSION['siparisdurum'] = "ok";
			header('Location:../../bagisci-panel/html/siparislerim');
		}
	} else {

		echo "başarısız";

		header('Location:../../bagisci-panel/html/odeme');
	}
}


if (isset($_POST['BagisciResimGuncelle'])) {

	$uploads_dir = '../../bagisci-panel/assets/img/avatars';

	@$tmp_name = $_FILES['bagisci_resim']["tmp_name"];
	@$name = $_FILES['bagisci_resim']["name"];

	$benzersizsayi = rand(20000, 32000);
	$resimyol = substr($uploads_dir, 6) . "/" . $benzersizsayi . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name");

	$duzenle = $db->prepare("UPDATE bagisci SET
		bagisci_resim=:resim
		where  bagisci_id ={$_POST['bagisci_id']}");
	$update = $duzenle->execute(array(
		'resim' => $resimyol
	));



	if ($update) {

		$resimsilunlink = $_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		$_SESSION['logodurum'] = "ok";
		header("Location:../../bagisci-panel/html/hesap-bilgilerim");
	} else {
		$_SESSION['logodurum'] = "no";
		header("Location:../../bagisci-panel/html/hesap-bilgilerim");
	}
}

/* Yoksul Paneli */

if (isset($_POST['yoksulhesapkaydet'])) {

	$yoksul_id = $_POST['yoksul_id'];

	$ayarkaydet = $db->prepare("UPDATE yoksul SET

		yoksul_ad =:yoksul_ad,
		yoksul_soyad =:yoksul_soyad,
		yoksul_mail=:yoksul_mail,
		yoksul_tc=:yoksul_tc,
		yoksul_gsm=:yoksul_gsm,
		yoksul_il=:yoksul_il,
		yoksul_ilce=:yoksul_ilce,
		yoksul_adres=:yoksul_adres
		WHERE yoksul_id={$_POST['yoksul_id']}");

	$update = $ayarkaydet->execute(array(

		'yoksul_ad' => $_POST['yoksul_ad'],
		'yoksul_soyad' => $_POST['yoksul_soyad'],
		'yoksul_mail' => $_POST['yoksul_mail'],
		'yoksul_tc' => $_POST['yoksul_tc'],
		'yoksul_gsm' => $_POST['yoksul_gsm'],
		'yoksul_il' => $_POST['yoksul_il'],
		'yoksul_ilce' => $_POST['yoksul_ilce'],
		'yoksul_adres' => $_POST['yoksul_adres']
	));

	if ($update) {

		$_SESSION['durum'] = "ok";
		header("Location:../../gonullu-panel/html/hesap-bilgilerim?yoksul_id=$yoksul_id");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../gonullu-panel/html/hesap-bilgilerim?yoksul_id=$yoksul_id");
	}
}


if (isset($_POST['yoksulResimGuncelle'])) {

	$uploads_dir = '../../gonullu-panel/assets/img/avatars';

	@$tmp_name = $_FILES['yoksul_resim']["tmp_name"];
	@$name = $_FILES['yoksul_resim']["name"];

	$benzersizsayi = rand(20000, 32000);
	$resimyol = substr($uploads_dir, 6) . "/" . $benzersizsayi . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name");

	$duzenle = $db->prepare("UPDATE yoksul SET
		yoksul_resim=:resim
		where  yoksul_id ={$_POST['yoksul_id']}");
	$update = $duzenle->execute(array(
		'resim' => $resimyol
	));


	if ($update) {

		$resimsilunlink = $_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		$_SESSION['logodurum'] = "ok";
		header("Location:../../gonullu-panel/html/hesap-bilgilerim");
	} else {
		$_SESSION['logodurum'] = "no";
		header("Location:../../gonullu-panel/html/hesap-bilgilerim");
	}
}

if (isset($_POST['destekGonullu'])) {

	$destek_durum = 0;

	$ayarkaydet = $db->prepare("INSERT INTO destek SET

		destek_ad =:destek_ad,
		destek_soyad =:destek_soyad,
		destek_gsm=:destek_gsm,
		destek_mail=:destek_mail,
		destek_mesaj=:destek_mesaj,
		yoksul_id=:yoksul_id,
		destek_durum=:destek_durum
		");

	$insert = $ayarkaydet->execute(array(

		'destek_ad' => $_POST['destek_ad'],
		'destek_soyad' => $_POST['destek_soyad'],
		'destek_gsm' => $_POST['destek_gsm'],
		'destek_mail' => $_POST['destek_mail'],
		'destek_mesaj' => $_POST['destek_mesaj'],
		'yoksul_id' => $_POST['yoksul_id'],
		'destek_durum' => $destek_durum
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../gonullu-panel/html/destek");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../gonullu-panel/html/destek");
	}
}


if (isset($_POST['hesapkaldirGonullu'])) {

	$yoksul_id = $_POST['yoksul_id'];

	if ($_POST['hesabimsilGonullu'] == "on") {

		$sil = $db->prepare("DELETE from yoksul where yoksul_id=:id");
		$kontrol = $sil->execute(array(

			'id' => $_POST['yoksul_id']

		));

		if ($kontrol) {
			header('Location:../../index');
		}
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../gonullu-panel/html/hesap-bilgilerim');
	}
}


if (isset($_POST['yoksulResimKimlik'])) {

	$uploads_dir = '../../gonullu-panel/assets/img/avatars';

	@$tmp_name = $_FILES['yoksul_kimlikKart']["tmp_name"];
	@$name = $_FILES['yoksul_kimlikKart']["name"];

	$benzersizsayi1 = rand(20000, 32000);
	$resimyol1 = substr($uploads_dir, 6) . "/" . $benzersizsayi1 . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi1$name");

	$duzenle = $db->prepare("UPDATE yoksul SET
		yoksul_kimlikKart=:resim1
		where  yoksul_id ={$_POST['yoksul_id']}");
	$update = $duzenle->execute(array(
		'resim1' => $resimyol1
	));


	if ($update) {

		$resimsilunlink = $_POST['eski_yolKimlik'];
		unlink("../../$resimsilunlink");
		header("Location:../../gonullu-panel/html/hesap-bilgilerim");
	} else {
		header("Location:../../gonullu-panel/html/hesap-bilgilerim");
	}
}

if (isset($_POST['yoksulResimGelir'])) {

	$uploads_dir = '../../gonullu-panel/assets/img/avatars';

	@$tmp_name = $_FILES['yoksul_gelirBelgesi']["tmp_name"];
	@$name = $_FILES['yoksul_gelirBelgesi']["name"];

	$benzersizsayi2 = rand(20000, 32000);
	$resimyol2 = substr($uploads_dir, 6) . "/" . $benzersizsayi2 . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi2$name");

	$duzenle = $db->prepare("UPDATE yoksul SET
		yoksul_gelirBelgesi=:resim2
		where  yoksul_id ={$_POST['yoksul_id']}");
	$update = $duzenle->execute(array(
		'resim2' => $resimyol2
	));


	if ($update) {

		$resimsilunlink = $_POST['eski_yolGelir'];
		unlink("../../$resimsilunlink");
		header("Location:../../gonullu-panel/html/hesap-bilgilerim");
	} else {
		header("Location:../../gonullu-panel/html/hesap-bilgilerim");
	}
}

if (isset($_POST['bagistalep'])) {

	$ayarkaydet = $db->prepare("INSERT INTO yardim SET

		yardim_ad =:yardim_ad,
		yardim_soyad =:yardim_soyad,
		yardim_gsm=:yardim_gsm,
		yardim_mail=:yardim_mail,
		yardim_il=:yardim_il,
		yardim_tc=:yardim_tc,
		yoksul_id=:yoksul_id
		");

	$insert = $ayarkaydet->execute(array(

		'yardim_ad' => $_POST['yardim_ad'],
		'yardim_soyad' => $_POST['yardim_soyad'],
		'yardim_gsm' => $_POST['yardim_gsm'],
		'yardim_mail' => $_POST['yardim_mail'],
		'yardim_il' => $_POST['yardim_il'],
		'yardim_tc' => $_POST['yardim_tc'],
		'yoksul_id' => $_POST['yoksul_id']
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../gonullu-panel/html/bagisal");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../gonullu-panel/html/bagisal");
	}
}

// Teknisyen paneli alanı

if (isset($_POST['teknisyenhesapkaydet'])) {

	$teknisyen_id = $_POST['teknisyen_id'];

	$ayarkaydet = $db->prepare("UPDATE teknisyen SET

		teknisyen_ad =:teknisyen_ad,
		teknisyen_soyad =:teknisyen_soyad,
		teknisyen_mail=:teknisyen_mail,
		teknisyen_tc=:teknisyen_tc,
		teknisyen_gsm=:teknisyen_gsm,
		teknisyen_il=:teknisyen_il,
		teknisyen_ilce=:teknisyen_ilce,
		teknisyen_isyeriadi=:teknisyen_isyeriadi,
		teknisyen_adres=:teknisyen_adres
		WHERE teknisyen_id={$_POST['teknisyen_id']}");

	$update = $ayarkaydet->execute(array(

		'teknisyen_ad' => $_POST['teknisyen_ad'],
		'teknisyen_soyad' => $_POST['teknisyen_soyad'],
		'teknisyen_mail' => $_POST['teknisyen_mail'],
		'teknisyen_tc' => $_POST['teknisyen_tc'],
		'teknisyen_gsm' => $_POST['teknisyen_gsm'],
		'teknisyen_il' => $_POST['teknisyen_il'],
		'teknisyen_ilce' => $_POST['teknisyen_ilce'],
		'teknisyen_isyeriadi' => $_POST['teknisyen_isyeriadi'],
		'teknisyen_adres' => $_POST['teknisyen_adres']
	));

	if ($update) {

		$_SESSION['durum'] = "ok";
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim?teknisyen_id=$teknisyen_id");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim?teknisyen_id=$teknisyen_id");
	}
}

if (isset($_POST['teknisyenResimGuncelle'])) {

	$uploads_dir = '../../teknisyen-panel/assets/img/avatars';

	@$tmp_name = $_FILES['teknisyen_resim']["tmp_name"];
	@$name = $_FILES['teknisyen_resim']["name"];

	$benzersizsayi = rand(20000, 32000);
	$resimyol = substr($uploads_dir, 6) . "/" . $benzersizsayi . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name");

	$duzenle = $db->prepare("UPDATE teknisyen SET
		teknisyen_resim=:resim
		where  teknisyen_id ={$_POST['teknisyen_id']}");
	$update = $duzenle->execute(array(
		'resim' => $resimyol
	));


	if ($update) {

		$resimsilunlink = $_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		$_SESSION['logodurum'] = "ok";
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	} else {
		$_SESSION['logodurum'] = "no";
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	}
}

if (isset($_POST['teknisyenResimKimlik'])) {

	$uploads_dir = '../../teknisyen-panel/assets/img/avatars';

	@$tmp_name = $_FILES['teknisyen_kimlikKart']["tmp_name"];
	@$name = $_FILES['teknisyen_kimlikKart']["name"];

	$benzersizsayi1 = rand(20000, 32000);
	$resimyol1 = substr($uploads_dir, 6) . "/" . $benzersizsayi1 . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi1$name");

	$duzenle = $db->prepare("UPDATE teknisyen SET
		teknisyen_kimlikKart=:resim1
		where  teknisyen_id ={$_POST['teknisyen_id']}");
	$update = $duzenle->execute(array(
		'resim1' => $resimyol1
	));


	if ($update) {

		$resimsilunlink = $_POST['eski_yolKimlik'];
		unlink("../../$resimsilunlink");
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	} else {
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	}
}

if (isset($_POST['teknisyenResimustalik'])) {

	$uploads_dir = '../../teknisyen-panel/assets/img/avatars';

	@$tmp_name = $_FILES['teknisyen_ustalikBelgesi']["tmp_name"];
	@$name = $_FILES['teknisyen_ustalikBelgesi']["name"];

	$benzersizsayi2 = rand(20000, 32000);
	$resimyol2 = substr($uploads_dir, 6) . "/" . $benzersizsayi2 . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi2$name");

	$duzenle = $db->prepare("UPDATE teknisyen SET
		teknisyen_ustalikBelgesi=:resim2
		where  teknisyen_id ={$_POST['teknisyen_id']}");
	$update = $duzenle->execute(array(
		'resim2' => $resimyol2
	));


	if ($update) {

		$resimsilunlink = $_POST['eski_yolustalik'];
		unlink("../../$resimsilunlink");
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	} else {
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	}
}

if (isset($_POST['teknisyenResimisyeri'])) {

	$uploads_dir = '../../teknisyen-panel/assets/img/avatars';

	@$tmp_name = $_FILES['teknisyen_isyeribelge']["tmp_name"];
	@$name = $_FILES['teknisyen_isyeribelge']["name"];

	$benzersizsayi2 = rand(20000, 32000);
	$resimyol3 = substr($uploads_dir, 6) . "/" . $benzersizsayi2 . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi2$name");

	$duzenle = $db->prepare("UPDATE teknisyen SET
		teknisyen_isyeribelge=:resim3
		where  teknisyen_id ={$_POST['teknisyen_id']}");
	$update = $duzenle->execute(array(
		'resim3' => $resimyol3
	));


	if ($update) {

		$resimsilunlink = $_POST['eski_yolisyeri'];
		unlink("../../$resimsilunlink");
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	} else {
		header("Location:../../teknisyen-panel/html/hesap-bilgilerim");
	}
}

if (isset($_POST['destekTeknisyen'])) {

	$destek_durum = 0;

	$ayarkaydet = $db->prepare("INSERT INTO destek SET

		destek_ad =:destek_ad,
		destek_soyad =:destek_soyad,
		destek_gsm=:destek_gsm,
		destek_mail=:destek_mail,
		destek_mesaj=:destek_mesaj,
		teknisyen_id=:teknisyen_id,
		destek_durum=:destek_durum
		");

	$insert = $ayarkaydet->execute(array(

		'destek_ad' => $_POST['destek_ad'],
		'destek_soyad' => $_POST['destek_soyad'],
		'destek_gsm' => $_POST['destek_gsm'],
		'destek_mail' => $_POST['destek_mail'],
		'destek_mesaj' => $_POST['destek_mesaj'],
		'teknisyen_id' => $_POST['teknisyen_id'],
		'destek_durum' => $destek_durum
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../teknisyen-panel/html/destek");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../teknisyen-panel/html/destek");
	}
}

if ($_GET['desteksiltalepTeknisyen'] == "ok") {

	$sil = $db->prepare("DELETE from destek where destek_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['destek_id']

	));



	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../../teknisyen-panel/html/destek-talepleri');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../teknisyen-panel/html/destek-talepleri');
	}
}

if ($_GET['desteksildetayTeknisyen'] == "ok") {

	$sil = $db->prepare("DELETE from destek where destek_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['destek_id']

	));



	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../../teknisyen-panel/html/destek-talepleri');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../teknisyen-panel/html/destek-talepleri');
	}
}

if (isset($_POST['hesapkaldirTeknisyen'])) {

	$teknisyen_id = $_POST['teknisyen_id'];

	if ($_POST['hesabimsilTeknisyen'] == "on") {

		$sil = $db->prepare("DELETE from teknisyen where teknisyen_id=:id");
		$kontrol = $sil->execute(array(

			'id' => $_POST['teknisyen_id']

		));

		if ($kontrol) {
			header('Location:../../index');
		}
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../teknisyen-panel/html/hesap-bilgilerim');
	}
}

if (isset($_POST['teknisyenBasvuru'])) {

	$ayarkaydet = $db->prepare("INSERT INTO basvuru SET

		basvuru_ad =:basvuru_ad,
		basvuru_soyad =:basvuru_soyad,
		basvuru_gsm=:basvuru_gsm,
		basvuru_mail=:basvuru_mail,
		basvuru_il=:basvuru_il,
		basvuru_tc=:basvuru_tc,
		teknisyen_id=:teknisyen_id
		");

	$insert = $ayarkaydet->execute(array(

		'basvuru_ad' => $_POST['basvuru_ad'],
		'basvuru_soyad' => $_POST['basvuru_soyad'],
		'basvuru_gsm' => $_POST['basvuru_gsm'],
		'basvuru_mail' => $_POST['basvuru_mail'],
		'basvuru_il' => $_POST['basvuru_il'],
		'basvuru_tc' => $_POST['basvuru_tc'],
		'teknisyen_id' => $_POST['teknisyen_id']
	));

	if ($insert) {

		$_SESSION['durum'] = "ok";
		header("Location:../../teknisyen-panel/html/basvuru");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../../teknisyen-panel/html/basvuru");
	}
}

if ($_GET['siparisdetaysil'] == "ok") {

	$sil = $db->prepare("DELETE from siparis_detay where siparisdetay_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['siparisdetay_id']

	));

	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../production/siparisler');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../production/siparisler');
	}
}

if ($_GET['yardimsil'] == "ok") {

	$sil = $db->prepare("DELETE from yardim where yardim_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['yardim_id']

	));

	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../production/yardim-talep');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../production/yardim-talep');
	}
}

if ($_GET['basvuruonecikar'] == "evet") {

	$basvuru_id = $_GET['basvuru_id'];
	$basvuru_durum = 0;
	$basvuruduzenle = $db->prepare("UPDATE basvuru SET 
		basvuru_durum=:basvuru_durum
		where basvuru_id ={$_GET['basvuru_id']}
		");

	$update = $basvuruduzenle->execute(array(

		'basvuru_durum' => $basvuru_durum
	));

	if ($update) {
		$_SESSION['basvurudurum'] = "ok";
		header('Location:../production/basvuru-talep?basvuru_id=$basvuru_id');
	} else {
		$_SESSION['basvurudurum'] = "no";
		header('Location:../production/basvuru-talep?basvuru_id=$basvuru_id');
	}
}


if ($_GET['basvuruonecikar'] == "hayir") {

	$basvuru_id = $_GET['basvuru_id'];
	$basvuru_durum = 1;
	$basvuruduzenle = $db->prepare("UPDATE basvuru SET 
		basvuru_durum=:basvuru_durum
		where basvuru_id ={$_GET['basvuru_id']}
		");

	$update = $basvuruduzenle->execute(array(

		'basvuru_durum' => $basvuru_durum
	));

	if ($update) {
		$_SESSION['basvurudurum'] = "ok";
		header('Location:../production/basvuru-talep?basvuru_id=$basvuru_id');
	} else {
		$_SESSION['basvurudurum'] = "no";
		header('Location:../production/basvuru-talep?basvuru_id=$basvuru_id');
	}
}

if (isset($_POST['BagisAtama'])) {

	$gonullu_id = $_POST['gonullu_id'];
	$siparisdetay_id = $_POST['siparisdetay_id'];
	echo $_POST['siparisdetay_id'];

	$ayarkaydet = $db->prepare("UPDATE siparis_detay SET

        gonullu_id=:gonullu_id

		WHERE siparisdetay_id={$_POST['siparisdetay_id']}");

	$update = $ayarkaydet->execute(array(

		'gonullu_id' => $_POST['gonullu_id']
	));

	if ($update) {

		$yoksul_id = $gonullu_id;
		$yardim_durum = 1;

		$ayarkaydet = $db->prepare("UPDATE yardim SET

        yardim_durum=:yardim_durum

		WHERE yoksul_id=$yoksul_id");

		$update = $ayarkaydet->execute(array(

			'yardim_durum' => $yardim_durum

		));




		$_SESSION['durum'] = "ok";
		header("Location:../production/siparisler?siparisdetay_id=$siparisdetay_id");
	} else {
		$_SESSION['durum'] = "no";
		header("Location:../production/siparisler?siparisdetay_id=$siparisdetay_id");
	}
}


if (isset($_POST['yardimAta'])) {

	echo $teknisyen_id = $_POST['teknisyen_id'];
	echo "<hr>";
	echo $yoksul_id = $_POST['yoksul_id'];

	$ayarkaydet = $db->prepare("UPDATE yardim SET

        teknisyen_id=:teknisyen_id

		WHERE yoksul_id={$_POST['yoksul_id']}");

	$update = $ayarkaydet->execute(array(

		'teknisyen_id' => $_POST['teknisyen_id']
	));

	if ($update) {
		$_SESSION['durum'] = "ok";
		header('Location:../../teknisyen-panel/html/siparislerim');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../../teknisyen-panel/html/siparislerim');
	}
}

if ($_GET['basvurusil'] == "ok") {

	$sil = $db->prepare("DELETE from basvuru where basvuru_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['basvuru_id']

	));

	if ($kontrol) {
		$_SESSION['durum'] = "ok";
		header('Location:../production/basvuru-talep');
	} else {
		$_SESSION['durum'] = "no";
		header('Location:../production/basvuru-talep');
	}
}


if (isset($_POST['yapilacakEkle'])) {


	$ayarkaydet = $db->prepare("INSERT INTO yapilacak SET

         yapilacak_is=:yapilacak_is

		");

	$insert = $ayarkaydet->execute(array(

		'yapilacak_is' => $_POST['yapilacak_is']
	));

	if ($insert) {
		header("Location:../production/index");
	} else {
		header("Location:../production/index");
	}
}

if ($_GET['yapilacaksil'] == "ok") {

	$sil = $db->prepare("DELETE from yapilacak where yapilacak_id=:id");
	$kontrol = $sil->execute(array(

		'id' => $_GET['yapilacak_id']

	));

	if ($kontrol) {
		header("Location:../production/index");
	} else {
		header("Location:../production/index");
	}
}