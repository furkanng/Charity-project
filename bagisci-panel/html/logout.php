<?php 

session_start();

unset($_SESSION['userbagisci_mail']);

$_SESSION['cikis']="basarili";
header("Location:../../bagisyap");


?>