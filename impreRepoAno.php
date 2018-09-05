<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');
session_start();

include("fechaLetra.php");

if (isset($_SESSION['anoRepo']) && !empty($_SESSION['anoRepo'])) {

	$anoRepo = $_SESSION['anoRepo'];
	$anoRepoClase = $_SESSION['anoRepoClase'];

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
	<div class="container">
		<div class="cuadroR">
				<div class="starter-template">
					<h1>Sistema de Cartillas</h1>
					<p class="lead centrado">Reporte</p>
				</div>

				<div class="form-group col-md-12">
					<label><h3>CORTE DEL AÑO: '.$anoRepo.'</h3></label>
					<br>
				</div>

		</div>

		<div class="firmaPresi">
		<p class="text-center"><b>
		INFORME DE EFECTIVOS TOTALES DE LA CLASE “'.$anoRepoClase.'” ANTICIPADOS Y REMISOS, DEL
		<br>
		PERSONAL DEL SERVICIO MILITAR NACIONAL ALISTADOS EN LA JUNTA MUNICIPAL DE
		<br>
		RECLUTAMIENTO DE NICOLÁS ROMERO, MÉXICO, DURANTE EL PERIODO DEL MES DE
		<br>
		ENERO, FEBRERO, MARZO, ABRIL, MAYO, JUNIO, JULIO, AGOSTO,
		<br>
		SEPTIEMBRE Y OCTUBRE, DEL AÑO '.$anoRepo.'
		</b></p>
		</div>
		<br>

		<div class="table-responsive">
		<table class="table table-striped table-hover">
		<thead class="cabeAzul">
	 		<tr>
	 			<th>JJ.MM.RR</th>
	 			<th>ALISTADOS</th>
	 			<th>DE LA CLASE</th>
	 			<th>ANTICIPADOS</th>
	 			<th>REMISOS</th>
	 			<th>INUTILIZADOS</th>
	 		</tr>
	 	</thead>
';

for ($i=1; $i <13 ; $i++) { 

switch ($i) {
    case "1":
        $varMes = "ENERO";
        break;
    case "2":
        $varMes = "FEBRERO";
        break;
    case "3":
        $varMes = "MARZO";
        break;
    case "4":
        $varMes = "ABRIL";
        break;
    case "5":
        $varMes = "MAYO";
        break;
    case "6":
        $varMes = "JUNIO";
        break;
    case "7":
        $varMes = "JULIO";
        break;
    case "8":
        $varMes = "AGOSTO";
        break;
    case "9":
        $varMes = "SEPTIEMBRE";
        break;
    case "10":
        $varMes = "OCTUBRE";
        break;
    case "11":
        $varMes = "NOVIEMBRE";
        break;
    case "12":
        $varMes = "DICIEMBRE";
        break;
}


$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$tablaCartillasAno = $con -> query("SELECT * FROM (SELECT COUNT(claseCart) AS CLASE FROM datosCartillas WHERE claseCart = '$anoRepoClase' AND mesDosCapCart = '$varMes' AND anoDosCapCart = '$anoRepo'),(SELECT COUNT(claseCart) AS ANTICIPADOS FROM datosCartillas WHERE claseCart > '$anoRepoClase' AND mesDosCapCart = '$varMes' AND anoDosCapCart = '$anoRepo'),(SELECT COUNT(claseCart) AS REMISOS FROM datosCartillas WHERE claseCart < '$anoRepoClase' AND mesDosCapCart = '$varMes' AND anoDosCapCart = '$anoRepo')");
	while ($resultado = $tablaCartillasAno -> fetchArray()) {
		$clase = $resultado['CLASE'];
		$anticipados = $resultado['ANTICIPADOS'];
		$remisos = $resultado['REMISOS'];
		$alistados = $clase+$anticipados+$remisos;


		echo '
			<tr>
	 			<td>'.$varMes.'</td>
	 			<td>'.$alistados.'</td>
	 			<td>'.$clase.'</td>
	 			<td>'.$anticipados.'</td>
	 			<td>'.$remisos.'</td>
	 			<td>0</td> 			
	 		</tr>


		';
	}

}


$tablaCartillasAno = $con -> query("SELECT * FROM (SELECT COUNT(claseCart) AS CLASETOTAL FROM datosCartillas WHERE claseCart = '$anoRepoClase' AND anoDosCapCart = '$anoRepo'),(SELECT COUNT(claseCart) AS ANTICIPADOSTOTAL FROM datosCartillas WHERE claseCart > '$anoRepoClase' AND anoDosCapCart = '$anoRepo'),(SELECT COUNT(claseCart) AS REMISOSTOTAL FROM datosCartillas WHERE claseCart < '$anoRepoClase' AND anoDosCapCart = '$anoRepo')");
	while ($resultado = $tablaCartillasAno -> fetchArray()) {
		$claseT = $resultado['CLASETOTAL'];
		$anticipadosT = $resultado['ANTICIPADOSTOTAL'];
		$remisosT = $resultado['REMISOSTOTAL'];
		$alistadosT = $claseT+$anticipadosT+$remisosT;
	}


echo '
			<tr>
	 			<th>TOTAL</th>
	 			<th>'.$alistadosT.'</th>
	 			<th>'.$claseT.'</th>
	 			<th>'.$anticipadosT.'</th>
	 			<th>'.$remisosT.'</th>
	 			<th>0</th>
	 		</tr>
 	</table>

			</div>
					<br>
					<div class="ocultar">
					<div class="form-group col-md-12">
					<a href="impreRepoAno.php"><button type="button" class="btn btn-success"/><i class="fas fa-print"></i> Re-imprimir</button></a>
					<a href="ano.php"><button type="button"class="btn btn-outline-info animated pulse delay-1s infinite"/>Terminar</button></a>
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
	echo "<script>window.location='ano.php';</script>";
}

 ?>