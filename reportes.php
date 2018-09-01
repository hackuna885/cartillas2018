<?php  

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');
session_start();
session_destroy();

$ano = date('Y');


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Menú Reportes</title>
	<link rel="stylesheet" href="css/bootstrap.css">
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
		.cuadroCentrado{
			margin: auto;
		}
		.lMayor{
			font-size: 3em;
		}
		.btChido{
			width: 90px;
			margin: 3px;
		}
		
	</style>
</head>
<body class="animated fadeIn">
	<div class="container">
		<div class="cuadroR">
		<div class="starter-template">
			<h1>Sistema de Cartillas</h1>
			<p class="lead centrado">Reportes</p>
		</div>

			<form action="" method="GET" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<label><h3>Menú Reportes</h3></label>
					</div>
					<div class="form-group col-md-12">
						<label>Selecciona Reporte:</label>
						<br>
						<a href="mes.php"><button type="button"class="btn btn-outline-primary btChido"/><span class="lMayor">M</span><br>Mensual</button></a>
						<a href="ano.php"><button type="button"class="btn btn-outline-primary btChido"/><span class="lMayor">A</span><br>Anual</button></a>
						<a href="reporteResumen.php"><button type="button"class="btn btn-outline-primary btChido"/><span class="lMayor">R</span><br>Resumen</button></a>
						<a href="balance.php"><button type="button"class="btn btn-outline-primary btChido"/><span class="lMayor">B</span><br>Balance</button></a>
						<a href="listado.php"><button type="button"class="btn btn-outline-primary btChido"/><span class="lMayor">L</span><br>Listado</button></a>
					</div>
					<br>
					<br>
					<div class="form-group col-md-12">
						<a href="index.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
					</div>
				</div>
			</form>
			</div>
	</div>
</body>
</html>