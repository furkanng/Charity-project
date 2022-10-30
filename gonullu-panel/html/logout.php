<?php 

session_start();

unset($_SESSION['useryoksul_mail']);

$_SESSION['cikis']="basarili";
header("Location:../../bagisal");


?>