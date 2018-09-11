<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');
session_start();

include("fechaLetra.php");

if (isset($_SESSION['anoRepoL']) && !empty($_SESSION['anoRepoL'])) {

	$anoRepoL = $_SESSION['anoRepoL'];
	$claseAnoRepoL = $_SESSION['claseAnoRepoL'];
	
	

echo '<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte</title>
	<link rel="stylesheet" href="css/print.css" media="print">
	<link rel="stylesheet" href="css/firmaPresi.css" media="screen">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/animate.css">

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<style>
		h1{
			text-align: center;
		}
		.centrado{
			text-align: center;
		}
		.XD{
			font-size: 2em;
		}
		.cuadroR{
			margin: 40px auto;
			max-width: 600px;
			text-align: center;
		}
		input { 
		    text-transform: uppercase;
		}
		::-webkit-input-placeholder { /* WebKit browsers */
		    text-transform: none;
		}
		:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
		    text-transform: none;
		}
		::-moz-placeholder { /* Mozilla Firefox 19+ */
		    text-transform: none;
		}
		:-ms-input-placeholder { /* Internet Explorer 10+ */
		    text-transform: none;
		}
		::placeholder { /* Recent browsers */
		    text-transform: none;
		}
		.cabeAzul{
			background-color: #06B5B7;
			color: #FFF;
		}
		.centrarCuadro{
			margin: auto;
		}
		table{
			font-size: .8em;
		}
	</style>
</head>
<body class="animated fadeIn" onload="window.print();">
	<div class="container">
		<div class="cuadroR">
				<div class="starter-template">
					<h1>Sistema de Cartillas</h1>
					<p class="lead centrado">Reporte</p>
				</div>

				<div class="form-group col-md-12">
					<label><h3>Listado Anual: '.$anoRepoL.'</h3></label>
					<br>
				</div>

		</div>

		<div class="firmaPresi">
		<p class="text-center"><b>
		LISTADO INICIAL DEL SORTEO
		<br>
		JUNTA MUNICIPAL DE RECLUTAMIENTO DE CD. NICOLÁS ROMERO, MÉXICO
		<br>
		LISTA QUE SE ELABORA COMO RESULTADO DEL REGISTRO DEL PERSONAL 5.M.N. CLASE “'.$claseAnoRepoL.'”, ANTICIPADOS Y REMISOS
		<br>
		QUE PARTICIPAN EN EL SORTEO DEL PRESENTE AÑO
		<br>
		</b></p>
		</div>
		<br>

	<div class="table-responsive">
		<table class="table table-striped table-sm table-hover">
		<thead class="cabeAzul">
		<tr>
			<th>NO.</th>
			<th>MATRICULA</th>
			<th>NOMBRE(S)</th>
			<th>CLASE</th>
			<th>GRADO MAXIMO DE ESTUDIOS</th>
			<th>DOMICILIO</th>	
		</tr>
		</thead>';


$id = 1;

$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$listaAnu = $con -> query("SELECT folioCart, nombreCart, claseCart, gradoEstCart||' ' ||gMaxEstCart AS gradoMaximoEstudio, domUsrCart FROM datosCartillas WHERE anoDosCapCart = '$anoRepoL' ORDER BY folioCart");

while ($resultado2 = $listaAnu -> fetchArray()) {
	$matriculaR = $resultado2['folioCart'];
	$nombreR = $resultado2['nombreCart'];
	$claseR = $resultado2['claseCart'];
	$gradoMaximoR = $resultado2['gradoMaximoEstudio'];
	$domicilioR = $resultado2['domUsrCart'];

	echo'
			<tr>
			<td>'.$id++.'</td>
			<td>D-'.$matriculaR.'</td>
			<td>'.$nombreR.'</td>
			<td>'.$claseR.'</td>
			<td>'.$gradoMaximoR.'</td>
			<td>'.$domicilioR.'</td>
			</tr>		
	';
}
$con -> close();

		echo'
</table>

			</div>
					<br>
					<div class="ocultar">
					<div class="form-group col-md-12">
					<a href="imprimeListadoAnual.php"><button type="button" class="btn btn-success"/><i class="fas fa-print"></i> Re-imprimir</button></a>
					<a href="listado.php"><button type="button"class="btn btn-outline-info animated pulse delay-1s infinite"/>Terminar</button></a>
					</div>
					</div>							
</div>
<br>
<br>
	<div class="firmaPresi">
	<p class="text-center"><b>CD. NICOLÁS ROMERO, MÉXICO A '.$dia.' DE '.$mesTexto.' DE '.$ano.'
	<br>
	LA PRESIDENTA MUNICIPAL Y LA JUNTA DE RECLUTAMIENTO</b></p>
	<br>
	<br>
	<p class="text-center"><b>_______________________________________
	<br>
	LIC. ANGELINA CARREÑO MIJARES</b>
	</p>
	</div>
 </body>
</html>


';
}else{
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo "<script>window.location='listado.php';</script>";
}

 ?>