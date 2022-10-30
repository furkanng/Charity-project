<?php 

session_start();

unset($_SESSION['kullanici_mail']);

$_SESSION['cikis']="basarili";
header("Location:login");


?>