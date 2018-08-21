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
		}
		.todosTxt{
			top: -6px;
			left: -33.87px;
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
		.btnGrey{
			background-color: #5F0095;
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
		.btnRed{
			background-color: #DC3545;
			color: #fff;
		}
	</style>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/print.css" media="print">
</head>
<body onload="window.print();">
<div class="container">
	<div class="cuadro">
	</div>
	<div class="todosTxt">
		<div class="posTxt textoClase" contentEditable="true">'.$txtClase.'</div>
		<div class="posTxt textoNombre" contentEditable="true">'.$txtNombre.'</div>
		<div class="posTxt textoFechaDeNA" contentEditable="true">'.$txtdiaUnoNa.' DE '.$txtmesUnoNa.' DE '.$txtanoUnoNa.'</div>
		<div class="posTxt textoNacio" contentEditable="true">'.$txtNacio.'</div>
		<div class="posTxt textoHijoDe" contentEditable="true">'.$txtHijoUno.'</div>
		<div class="posTxt textoYDe" contentEditable="true">'.$txtHijoDos.'</div>
		<div class="posTxt textoEstadoCl" contentEditable="true">'.$txtEstadoCv.'</div>
		<div class="posTxt textoGrado" contentEditable="true">'.$txtOcupa.'</div>
		<div class="posTxt textoLeerEscri" contentEditable="true">'.$txtLeer.'</div>
		<div class="posTxt textoCURP" contentEditable="true">'.$txtCurp.'</div>
		<div class="posTxt textoEstudios" contentEditable="true">'.$txtGrado.' '.$txtGMaxEst.'</div>
		<div class="posTxt textoDom" contentEditable="true">'.$txtDomi.'</div>
		<div class="posTxt textoPresi" contentEditable="true">'.$nomPresi.'</div>
		<div class="posTxt DirPresi" contentEditable="true">'.$domCartillas.' </div>
		<div class="posTxt textoFecha" contentEditable="true">'.$txtdiaDos.' DE '.$txtmesDos.' DE '.$txtanoDos.'</div>
		<div class="posTxt textoMatricula ocultar">'.$txtFolio.'</div>
	</div>
	<br>
	<div class="impre">
		<a href="impre.php"><div class="btnX1 btnGrey ocultar"><i class="fas fa-print"></i> Re-imprimir</div></a>
		<a href="matricula.php"><div class="btnX1 btnGreen ocultar animated pulse delay-2s infinite"><i class="fas fa-check"></i> Terminar</div></a>
		<a href="actualizar.php"><div class="btnX1 btnBack ocultar"><i class="fas fa-undo-alt"></i> Regresar</div></a>
		<a href="cancelar.php"><div class="btnX1 btnRed ocultar"><i class="fas fa-times"></i> Cancelar</div></a>
		
	</div>
</div>
</body>
</html>




	';

}else{
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo '

<html>
	<head>
		<meta http-equiv="REFRESH" content="0; url=matricula.php">
	</head>
</html>

';
}


 ?>