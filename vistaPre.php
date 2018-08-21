<?php 


error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type: text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');


if (isset($_SESSION['folio']) && !empty($_SESSION['folio'])) {

	$txtFolio = $_SESSION['folio'];

	$nomPresi = strtoupper("LIC. ANGELINA CARREÑO MIJARES");
	$domCartillas = strtoupper("CD. NICOLÁS ROMERO MEX.");

	
	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$cs = $con -> query("SELECT * FROM datosCartillas WHERE folioCart = '$txtFolio'");

	while ( $resul = $cs -> fetchArray() ) {
		$txtClase = $resul['claseCart'];
		$txtNombre = $resul['nombreCart'];
		$txtdiaUnoNa = $resul['diaUnoNaCart'];
		$txtmesUnoNa = $resul['mesUnoNaCart'];
		$txtanoUnoNa = $resul['anoUnoNaCart'];
		$txtNacio = $resul['nacioCart'];
		$txtHijoUno = $resul['hijoUnoCart'];
		$txtHijoDos = $resul['hijoDosCart'];
		$txtEstadoCv = $resul['estCvCart'];
		$txtOcupa = $resul['ocupaCart'];
		$txtLeer = $resul['leerCart'];
		$txtCurp = $resul['curpCart'];
		$txtGrado = $resul['gradoEstCart'];
		$txtGMaxEst = $resul['gMaxEstCart'];
		$txtDomi = $resul['domUsrCart'];
		$nomPresi = $resul['nomPresiCart'];
		$domCartillas = $resul['domCart'];
		$txtdiaDos = $resul['diaDosCapCart'];
		$txtmesDos = $resul['mesDosCapCart'];
		$txtanoDos = $resul['anoDosCapCart'];
	}
	
	$con -> close();

	echo '

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Cartillas Impresión</title>
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/animate.css">
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
		.btnBack{
			background-color: #00A298;
			color: #fff;
		}
	</style>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/print.css" media="print">
</head>
<body class="animated fadeIn">
<div class="container">
	<div class="cuadro">
	</div>
	<div class="todosTxt">
		<div class="posTxt textoClase">'.$txtClase.'</div>
		<div class="posTxt textoNombre">'.$txtNombre.'</div>
		<div class="posTxt textoFechaDeNA">'.$txtdiaUnoNa.' DE '.$txtmesUnoNa.' DE '.$txtanoUnoNa.'</div>
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
		<div class="posTxt textoFecha">'.$txtdiaDos.' DE '.$txtmesDos.' DE '.$txtanoDos.'</div>
		<div class="posTxt textoMatricula ocultar">'.$txtFolio.'</div>
	</div>
	
	<br>
	<div class="impre">
		<a href="actualizar.php"><div class="btnX1 btnBack ocultar"><i class="fas fa-undo-alt"></i> Regresar</div></a>
		<a href="impre.php"><div class="btnX1 btnGreen ocultar animated pulse delay-1s infinite"><i class="fas fa-print"></i> Imprimir</div></a>
		<br>
		<a href="cancelar.php"><div class="btnX1 btnRed ocultar"><i class="fas fa-times"></i> Cancelar</div></a>
	</div>
</div>
</body>
</html>




	';

}else{
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo "<script>window.location='matricula.php';</script>";
}


 ?>