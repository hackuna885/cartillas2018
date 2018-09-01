<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');
session_start();

include("fechaLetra.php");

echo '

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte Resumen</title>
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
			text-align: center;
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
					<label><h3>Resumen</h3></label>
					<br>
				</div>

		</div>
		<div class="table-responsive col-md-6 centrarCuadro">
		<table class="table table-striped table-hover">
		<thead class="cabeAzul">
	 		<tr>
	 			<th>CLASE</th>
	 			<th>AÑO</th>
	 			<th>SUBTOTAL</th>
	 		</tr>
	 	</thead>
';
		$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
		$tableResumen = $con -> query("SELECT claseCart, COUNT(claseCart) AS cuantos FROM datosCartillas GROUP BY claseCart ORDER BY claseCart");
			
			while ($resultado = $tableResumen -> fetchArray()) {
					$anoClase = $resultado['claseCart'];
					$cuantos = $resultado['cuantos'];
	

					echo '
						<tr>
				 			<td>CLASE</td>
				 			<td>'.$anoClase.'</td>
				 			<td>'.$cuantos.'</td>
				 		</tr>
					';
				}



		$tableResumenTotal = $con -> query("SELECT COUNT(claseCart) AS total FROM datosCartillas");
			while ($resultado = $tableResumenTotal -> fetchArray()) {
				$claseT = $resultado['total'];
			}
			$con -> close();

echo '
			<tr>
	 			<th>Total</th>
	 			<th></th>
	 			<th>'.$claseT.'</th>
	 		</tr>
 	</table>

			</div>
					<br>
					<div class="ocultar">
					<div class="form-group col-md-6 centrarCuadro">
					<a href="reportes.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
					<a href="impreRepoResumen.php"><button type="button" class="btn btn-success animated pulse delay-1s infinite"/><i class="fas fa-print"></i> Imprimir</button></a>
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


 ?>