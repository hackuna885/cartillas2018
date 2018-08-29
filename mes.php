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
	<title>Matricula</title>
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
		
	</style>
</head>
<body class="animated fadeIn">
	<div class="container">
		<div class="cuadroR">
		<div class="starter-template">
			<h1>Sistema de Cartillas</h1>
			<p class="lead centrado">Reportes</p>
		</div>

			<form action="reporteMes.php" method="post" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<label><h3>Reporte Mensual</h3></label>
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-4">
						<label>Selecciona el Mes:</label>
						<select name="txtMesRepo" class="form-control" required autofocus>
							<option value="">----</option>
							<option value="ENERO">ENERO</option>
							<option value="FEBRERO">FEBRERO</option>
							<option value="MARZO">MARZO</option>
							<option value="ABRIL">ABRIL</option>
							<option value="MAYO">MAYO</option>
							<option value="JUNIO">JUNIO</option>
							<option value="JULIO">JULIO</option>
							<option value="AGOSTO">AGOSTO</option>
							<option value="SEPTIEMBRE">SEPTIEMBRE</option>
							<option value="OCTUBRE">OCTUBRE</option>
							<option value="NOVIEMBRE">NOVIEMBRE</option>
							<option value="DICIEMBRE">DICIEMBRE</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>y el Año:</label>
						<input type="text" class="form-control" name="txtAnoRepo" placeholder="Año" value="<?php echo $ano; ?>" maxlength="4" pattern="[0-9]{4}" required/>
					</div>
					<div class="form-group col-md-2">
					</div>
					<br>
					<br>
					<div class="form-group col-md-12">
						<a href="index.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
						<input type="submit" class="btn btn-success animated pulse delay-1s infinite" value="Continuar"/>
					</div>
				</div>
			</form>
			</div>
	</div>
</body>
</html>