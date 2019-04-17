<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 

	global $pdo;

try {
	$pdo = new PDO("mysql:dbname=classificado;hostname=localhost", 'root', '');
} catch(PDOExepection $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
?>