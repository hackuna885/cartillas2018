<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type: text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');

include("fechaLetra.php");

if (isset($_POST['txtMesRepo']) && !empty($_POST['txtMesRepo']) &&
	isset($_POST['txtAnoRepo']) && !empty($_POST['txtAnoRepo']) ) {
	
	$mesRepo = $_POST['txtMesRepo'];
	$anoRecap = $_POST['txtAnoRepo'];
	$anoRepo = $_POST['txtAnoRepo']-18;
	$_SESSION['mesRepo'] = $mesRepo;
	$_SESSION['anoRepo'] = $anoRepo;
	$_SESSION['anoRecap'] = $anoRecap;

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
<body class="animated fadeIn">
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
								<th>ANALFABETA</th>
								<th>PRIMARIA</th>
								<th>SECUNDARIA</th>
								<th>PREPARATORIA</th>
								<th>LICENCIATURA</th>
								<th>SUBTOTAL</th>
							</tr>
						</thead>
							<tr>
								<td>ANTICIPADOS</td>
								<td>'.$nadaAnti.'</td>
								<td>'.$primAnti.'</td>
								<td>'.$secuAnti.'</td>
								<td>'.$prepaAnti.'</td>
								<td>'.$licAnti.'</td>
								<td><b>'.$subTotalAnti.'</b></td>
							</tr>
							<tr>
								<td>CLASE '.$anoRepo.'</td>
								<td>'.$nadaClase.'</td>
								<td>'.$primClase.'</td>
								<td>'.$secuClase.'</td>
								<td>'.$prepaClase.'</td>
								<td>'.$licClase.'</td>
								<td><b>'.$subTotalClase.'</b></td>
							</tr>
							<tr>
								<td>REMISOS</td>
								<td>'.$nadaRemi.'</td>
								<td>'.$primRemi.'</td>
								<td>'.$secuRemi.'</td>
								<td>'.$prepaRemi.'</td>
								<td>'.$licRemi.'</td>
								<td><b>'.$subTotalRemi.'</b></td>
							</tr>
							<tr>
								<td><b>TOTAL</b></td>
								<td><b>'.$t1.'</b></td>
								<td><b>'.$t2.'</b></td>
								<td><b>'.$t3.'</b></td>
								<td><b>'.$t4.'</b></td>
								<td><b>'.$t5.'</b></td>
								<td><b>'.$t6.'</b></td>
							</tr>
					</table>
					
					
</div>
					<br>
					<div class="ocultar">
					<div class="form-group col-md-12">
					<a href="mes.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
					<a href="impreRepoMes.php"><button type="button" class="btn btn-success animated pulse delay-1s infinite"/><i class="fas fa-print"></i> Imprimir</button></a>
					</div>
					</div>							
</div>
<br>
<br>
	<div class="firmaPresi">
	<p class="text-center"><b>CD. NICOLÁS ROMERO, MÉXICO A '.$dia.' DE '.$mesTexto.' DE '.$ano.'</b></p>
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
	<p class="text-center"><b>
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
