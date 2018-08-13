<?php 


error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type: text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');

if (isset($_POST['txtClase']) && !empty($_POST['txtClase']) &&
	isset($_POST['txtNombre']) && !empty($_POST['txtNombre']) &&
	isset($_POST['txtFechaNa']) && !empty($_POST['txtFechaNa']) &&
	isset($_POST['txtCurp']) && !empty($_POST['txtCurp']) &&
	isset($_POST['txtFecha']) && !empty($_POST['txtFecha'])) {

	$txtFolio = $_SESSION['folio'];
	$nomPresi = strtoupper("LIC. ANGELINA CARREÑO MIJARES");
	$domCartillas = strtoupper("CD. NICOLÁS ROMERO MEX.");

	$txtClase = strtoupper($_POST['txtClase']);
	$txtNombre = strtoupper($_POST['txtNombre']);
	$txtFechaNa = strtoupper($_POST['txtFechaNa']);
	$txtNacio = strtoupper($_POST['txtNacio']);
	$txtHijoUno = strtoupper($_POST['txtHijoUno']);
	$txtHijoDos = strtoupper($_POST['txtHijoDos']);
	$txtEstadoCv = strtoupper($_POST['txtEstadoCv']);
	$txtOcupa = strtoupper($_POST['txtOcupa']);
	$txtLeer = strtoupper($_POST['txtLeer']);
	$txtCurp = strtoupper($_POST['txtCurp']);
	$txtGrado = strtoupper($_POST['txtGrado']);
	$txtGMaxEst = strtoupper($_POST['txtGMaxEst']);
	$txtDomi = strtoupper($_POST['txtDomi']);
	$txtFecha = strtoupper($_POST['txtFecha']);

	$fechaRealCap = date('d-m-Y H:i:s');

	
	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$insert = $con -> query("INSERT INTO datosCartillas ('folioCart','claseCart','nombreCart','fechaNaCart','nacioCart','hijoUnoCart','hijoDosCart','estCvCart','ocupaCart','leerCart','curpCart','gradoEstCart','gMaxEstCart','domUsrCart','nomPresiCart','domCart','fechaCapCart') VALUES ('$txtFolio','$txtClase','$txtNombre','$txtFechaNa','$txtNacio','$txtHijoUno','$txtHijoDos','$txtEstadoCv','$txtOcupa','$txtLeer','$txtCurp','$txtGrado','$txtGMaxEst','$txtDomi','$nomPresi','$domCartillas','$fechaRealCap')");
	
	$con -> close();

	echo '

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Cartillas Impresión</title>
	<link rel="stylesheet" href="css/all.css">
	<style>
			*{
			margin: 0px;
			padding: 0px;
		}
		.cuadro{
			margin-left: 167.87px;
			margin-top: -37.30px;
			width: 410.34px;
			height: 559.55px;
			background-image: url("img/CARTILLA.png");
			background-repeat: no-repeat;
    		background-size: cover;
		}
		.todosTxt{
			top: 0px;
			left: 167.87px;
			position: absolute;
			width: 410.34px;
			height: 559.55px;
		}
		.posTxt{
			position: absolute;
		}
		.btnX1{
			cursor: pointer;
			margin: 10px;
			padding: 15px;
			border-radius: 5px;
			border: none;
			width: 150px;
			display: inline-block;
			font-family: Arial, Helvetica, sans-serif;
		}
		.btnRed{
			background-color: #DC3545;
			color: #fff;
		}
		.btnGreen{
			background-color: #28A745;
			color: #fff;
		}
	</style>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/print.css" media="print">
</head>
<body>
<div class="container">
	<div class="cuadro">
	</div>
	<div class="todosTxt">
		<div class="posTxt textoClase">'.$txtClase.'</div>
		<div class="posTxt textoNombre">'.$txtNombre.'</div>
		<div class="posTxt textoFechaNa">'.$txtFechaNa.'</div>
		<div class="posTxt textoNacio">'.$txtNacio.'</div>
		<div class="posTxt textoHijoDe">'.$txtHijoUno.'</div>
		<div class="posTxt textoYDe">'.$txtHijoDos.'</div>
		<div class="posTxt textoEstadoCl">'.$txtEstadoCv.'</div>
		<div class="posTxt textoGrado">'.$txtOcupa.'</div>
		<div class="posTxt textoLeerEscri">'.$txtLeer.'</div>
		<div class="posTxt textoCURP">'.$txtCurp.'</div>
		<div class="posTxt textoEstudios">'.$txtGrado.' '.$txtGMaxEst.'</div>
		<div class="posTxt textoDom">'.$txtDomi.'</div>
		<div class="posTxt textoPresi">'.$nomPresi.'</div>
		<div class="posTxt DirPresi">'.$domCartillas.' </div>
		<div class="posTxt textoFecha">'.$txtFecha.'</div>
		<div class="posTxt textoMatricula ocultar">'.$txtFolio.'</div>
	</div>
	
	<br>
	<div class="impre">
		<div class="btnX1 btnRed ocultar"><i class="fas fa-times"></i> Cancelar</div>
		<div class="btnX1 btnGreen ocultar"><i class="fas fa-print"></i> Imprimir</div>
	</div>
</div>
</body>
</html>




	';

}else{
	echo "<script>alert('Llena todos los Campos!');</script>";
	echo "<script>window.location='captura.php';</script>";
}


 ?>