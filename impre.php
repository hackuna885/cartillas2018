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
		$txtFechaNa = $resul['fechaNaCart'];
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
		$txtFecha = $resul['fechaCapCart'];
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
		.btnGrey{
			background-color: silver;
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
<body onload="window.print();">
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
	</div>
	<br>
	<div class="impre">
		<a href="impre.php"><div class="btnX1 btnGrey ocultar"><i class="fas fa-print"></i> Re-imprimir</div></a>
		<a href="matricula.php"><div class="btnX1 btnGreen ocultar"><i class="fas fa-check"></i> Terminar</div></a>
		
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