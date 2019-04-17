<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

try {
	$pdo = new PDO("mysql:dbname=classificado;hostname=localhost", 'root', '');
} catch(PDOExepection $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
?>