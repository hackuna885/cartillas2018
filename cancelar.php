<?php 


error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type: text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');


if (isset($_SESSION['folio']) && !empty($_SESSION['folio'])) {

	$txtFolio = $_SESSION['folio'];
	
	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$cs = $con -> query("DELETE FROM datosCartillas WHERE folioCart = '$txtFolio'");
	
	$con -> close();

echo "<script>alert('Matricula D-".$txtFolio." Cancelada');</script>";
	echo "<script>window.location='matricula.php';</script>";

}else{
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo "<script>window.location='matricula.php';</script>";
}


 ?>