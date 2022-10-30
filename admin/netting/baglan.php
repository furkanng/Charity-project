<?php 

try {

	$db= new PDO("mysql:host=localhost;dbname=tez;charset=utf8",'root','12345678');

	//echo "veri tabanı bağlantısı başarılı";

	

}catch(PDOException $e){

	echo $e->getMessage();
}




?>