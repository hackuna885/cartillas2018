<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type class="centrado": text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');
include("fechaLetra.php");

if (isset($_SESSION['mesRepo']) && !empty($_SESSION['mesRepo']) &&
	isset($_SESSION['anoRepo']) && !empty($_SESSION['anoRepo'])) {
	
	$mesRepo = $_SESSION['mesRepo'];
	$anoRecap = $_SESSION['anoRecap'];
	$anoRepo = $_SESSION['anoRepo'];

	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$tablaCartillasMes = $con -> query("SELECT * FROM (SELECT COUNT(gMaxEstCart) AS NADA FROM datosCartillas WHERE gMaxEstCart  = 'NADA' AND claseCart > '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS PRIMARIA FROM datosCartillas WHERE gMaxEstCart  = 'PRIMARIA' AND claseCart > '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS SECUNDARIA FROM datosCartillas WHERE gMaxEstCart  = 'SECUNDARIA' AND claseCart > '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS PREPARATORIA FROM datosCartillas WHERE gMaxEstCart  = 'PREPARATORIA' AND claseCart > '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS LICENCIATURA FROM datosCartillas WHERE gMaxEstCart  = 'LICENCIATURA' AND claseCart > '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap')
");

	while ($resultado = $tablaCartillasMes -> fetchArray()) {
		$nadaAnti = $resultado['NADA'];
		$primAnti = $resultado['PRIMARIA'];
		$secuAnti = $resultado['SECUNDARIA'];
		$prepaAnti = $resultado['PREPARATORIA'];
		$licAnti = $resultado['LICENCIATURA'];
	}

	$tablaCartillasMes = $con -> query("SELECT * FROM (SELECT COUNT(gMaxEstCart) AS NADA FROM datosCartillas WHERE gMaxEstCart  = 'NADA' AND claseCart = '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS PRIMARIA FROM datosCartillas WHERE gMaxEstCart  = 'PRIMARIA' AND claseCart = '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS SECUNDARIA FROM datosCartillas WHERE gMaxEstCart  = 'SECUNDARIA' AND claseCart = '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS PREPARATORIA FROM datosCartillas WHERE gMaxEstCart  = 'PREPARATORIA' AND claseCart = '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS LICENCIATURA FROM datosCartillas WHERE gMaxEstCart  = 'LICENCIATURA' AND claseCart = '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap')
");

	while ($resultado = $tablaCartillasMes -> fetchArray()) {
		$nadaClase = $resultado['NADA'];
		$primClase = $resultado['PRIMARIA'];
		$secuClase = $resultado['SECUNDARIA'];
		$prepaClase = $resultado['PREPARATORIA'];
		$licClase = $resultado['LICENCIATURA'];
	}

	$tablaCartillasMes = $con -> query("SELECT * FROM (SELECT COUNT(gMaxEstCart) AS NADA FROM datosCartillas WHERE gMaxEstCart  = 'NADA' AND claseCart < '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS PRIMARIA FROM datosCartillas WHERE gMaxEstCart  = 'PRIMARIA' AND claseCart < '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS SECUNDARIA FROM datosCartillas WHERE gMaxEstCart  = 'SECUNDARIA' AND claseCart < '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS PREPARATORIA FROM datosCartillas WHERE gMaxEstCart  = 'PREPARATORIA' AND claseCart < '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap'),(SELECT COUNT(gMaxEstCart) AS LICENCIATURA FROM datosCartillas WHERE gMaxEstCart  = 'LICENCIATURA' AND claseCart < '$anoRepo' AND mesDosCapCart = '$mesRepo' AND anoDosCapCart = '$anoRecap')
");

	while ($resultado = $tablaCartillasMes -> fetchArray()) {
		$nadaRemi = $resultado['NADA'];
		$primRemi = $resultado['PRIMARIA'];
		$secuRemi = $resultado['SECUNDARIA'];
		$prepaRemi = $resultado['PREPARATORIA'];
		$licRemi = $resultado['LICENCIATURA'];
	}
$t1= $nadaAnti+$nadaClase+$nadaRemi;
$t2= $primAnti+$primClase+$primRemi;
$t3= $secuAnti+$secuClase+$secuRemi;
$t4= $prepaAnti+$prepaClase+$prepaRemi;
$t5= $licAnti+$licClase+$licRemi;


$subTotalAnti= $nadaAnti+$primAnti+$secuAnti+$prepaAnti+$licAnti;
$subTotalClase= $nadaClase+$primClase+$secuClase+$prepaClase+$licClase;	
$subTotalRemi= $nadaRemi+$primRemi+$secuRemi+$prepaRemi+$licRemi;
$t6= $subTotalAnti+$subTotalClase+$subTotalRemi;

	$con -> close();

echo '
<!DOCTYPE html>
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
	</style>
</head>
<body class="animated fadeIn" onload="window.print();">
	<div class="firmaPresi">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</div>
	<div class="container">
		<div class="cuadroR">
				<div class="starter-template">
					<h1>Sistema de Cartillas</h1>
					<p class="lead centrado">Reporte</p>
				</div>

				<div class="form-group col-md-12">
					<label><h3>CORTE DEL MES DE: '.$mesRepo.'</h3></label>
					<br>
				</div>

		</div>
		<div class="firmaPresi">
		<p class="text-center"><b>
		INFORME MENSUAL Y ANUAL DE ALISTADOS
		<br>
		JUNTA MUNICIPAL DE RECLUTAMIENTO EN NICOLÁS ROMERO
		</b></p>
		</div>
		<br>
		<div class="table-responsive">
				<table class="table table-striped table-hover">
						<thead class="cabeAzul">	
							<tr>
								<th>CLASE</th>
								<th class="centrado">ANALFABETA</th>
								<th class="centrado">PRIMARIA</th>
								<th class="centrado">SECUNDARIA</th>
								<th class="centrado">PREPARATORIA</th>
								<th class="centrado">LICENCIATURA</th>
								<th class="centrado">SUBTOTAL</th>
							</tr>
						</thead>
							<tr>
								<td>ANTICIPADOS</td>
								<td class="centrado">'.$nadaAnti.'</td>
								<td class="centrado">'.$primAnti.'</td>
								<td class="centrado">'.$secuAnti.'</td>
								<td class="centrado">'.$prepaAnti.'</td>
								<td class="centrado">'.$licAnti.'</td>
								<td class="centrado"><b>'.$subTotalAnti.'</b></td>
							</tr>
							<tr>
								<td>CLASE '.$anoRepo.'</td>
								<td class="centrado">'.$nadaClase.'</td>
								<td class="centrado">'.$primClase.'</td>
								<td class="centrado">'.$secuClase.'</td>
								<td class="centrado">'.$prepaClase.'</td>
								<td class="centrado">'.$licClase.'</td>
								<td class="centrado"><b>'.$subTotalClase.'</b></td>
							</tr>
							<tr>
								<td>REMISOS</td>
								<td class="centrado">'.$nadaRemi.'</td>
								<td class="centrado">'.$primRemi.'</td>
								<td class="centrado">'.$secuRemi.'</td>
								<td class="centrado">'.$prepaRemi.'</td>
								<td class="centrado">'.$licRemi.'</td>
								<td class="centrado"><b>'.$subTotalRemi.'</b></td>
							</tr>
							<tr>
								<td><b>TOTAL</b></td>
								<td class="centrado"><b>'.$t1.'</b></td>
								<td class="centrado"><b>'.$t2.'</b></td>
								<td class="centrado"><b>'.$t3.'</b></td>
								<td class="centrado"><b>'.$t4.'</b></td>
								<td class="centrado"><b>'.$t5.'</b></td>
								<td class="centrado"><b>'.$t6.'</b></td>
							</tr>
					</table>
					
					
</div>
					<br>
					<div class="ocultar">
					<div class="form-group col-md-12">
					
					<a href="impreRepoMes.php"><button type="button" class="btn btn-success"/><i class="fas fa-print"></i> Re-imprimir</button></a>
					<a href="mes.php"><button type="button"class="btn btn-outline-info animated pulse delay-1s infinite"/>Terminar</button></a>
					</div>
					</div>							
</div>
<br>
<br>
	<div class="firmaPresi">
	<table class="centrarCuadro">
		<tr>
			<td><b>INUTILIZADAS</b></td>
			<td>0</td>
		</tr>
		<tr>
			<td><b>EXTRAVIADAS</b></td>
			<td>0</td>
		</tr>
	</table>
	<br>
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
	echo "<script>window.location='mes.php';</script>";
}

 ?>
