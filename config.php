<?php 
require "environment.php";

$config = array();
// RewriteRule ^(.*)$ https://tjveiculos.000webhostapp.com/index.php?url=$1 [QSA,L]
if (ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/APIS/projeto-bvs-mvc/");
	$config['dbname'] = 'mapa1';
	$config['host'] = 'localhost';
	$config['dbusser'] = 'root';
	$config['dbpass'] = '';
}else{
	define("BASE_URL", "https://www.conhecabreves.com.br/");
	$config['dbname'] = 'conhe168_mapa1';
	$config['host'] = 'localhost';
	$config['dbusser'] = 'conhe168_bvs';
	$config['dbpass'] = 'silva123';
}
global $pdo;
try {
	$pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbusser'], 
		$config['dbpass']);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
	echo "ERROR:".$e->getMessage();
	exit;
}

 ?>