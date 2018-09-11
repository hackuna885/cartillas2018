<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type: text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');

if (isset($_POST['txtSerieMat']) && !empty($_POST['txtSerieMat']) &&
	isset($_POST['txtMatUnoMat']) && !empty($_POST['txtMatUnoMat']) && 
	isset($_POST['txtMatDosMat']) && !empty($_POST['txtMatDosMat']) &&
	isset($_POST['txtAnoMat']) && !empty($_POST['txtAnoMat'])){

	$matSer = $_POST['txtSerieMat'];
	$matUno = $_POST['txtMatUnoMat'];
	$matDos = $_POST['txtMatDosMat'];
	$matAno = $_POST['txtAnoMat'];

	if ($matUno < $matDos) {

	$matriculas = $matDos-$matUno;

	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$insertMat = $con -> query("INSERT INTO matriculas('serieMat','matIniMat','matFinalMat','anoMat') VALUES('$matSer','$matUno','$matDos','$matAno')");
	
	$con -> close();

	echo "<script>alert('Se agregaron ".$matriculas." Matriculas de la Serie:".$matSer." D-".$matUno." - D-".$matDos." del ".$matAno."!');</script>";
	echo "<script>window.location='serie.php';</script>";

	}else{
		echo "<script>alert('La Matricula: D-".$matUno." no puede ser mayor que: D-".$matDos."!');</script>";
		echo "<script>window.location='serie.php';</script>";
	}

	


}else{
	
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo "<script>window.location='serie.php';</script>";
}




 ?>