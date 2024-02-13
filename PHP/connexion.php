<?php 
$servername = "localhost";
$username = "root";
$password = "";

try{
	$dsn="mysql:host=$servername;dbname=";
	$bdd=new PDO( $dsn, $username, $password );
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
	echo "Error".$e->getMessage();
	exit();
}
?>