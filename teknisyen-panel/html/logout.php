<?php 

session_start();

unset($_SESSION['userteknisyen_mail']);

$_SESSION['cikis']="basarili";
header("Location:../../teknisyen");


?>