<?php  

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');
session_start();
session_destroy();


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte Balance</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/animate.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/soloNumeros.js"></script>
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

			<form action="reporteBalance.php" method="post" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<label><h3>Reporte Balance</h3></label>
					</div>
					<div class="form-group col-md-4">
						<label>Inicio de Matricula:</label>
						<div class="input-group input-group">
						<div class="input-group-text"><b>D-</b></div>
						<input type="text" name="txtMatUno" class="form-control" placeholder="XXXXXXX" maxlength="7" pattern="[0-9]{7}" autocomplete="off" required autofocus onkeypress="return valida(event)"/>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label>Final de Matricula:</label>
						<div class="input-group input-group">
						<div class="input-group-text"><b>D-</b></div>
						<input type="text" name="txtMatDos" placeholder="XXXXXXX" maxlength="7" pattern="[0-9]{7}" autocomplete="off" class="form-control" required onkeypress="return valida(event)"/>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label>Selecciona el Año:</label>
						<select name="txtAnoRepoB" class="form-control" required onkeypress="return valida(event)"/>
							<option value="">----</option>
							
							<?php 

							$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
							$optAno = $con -> query("SELECT anoDosCapCart FROM datosCartillas GROUP BY anoDosCapCart ORDER BY anoDosCapCart");

							while ($resultado = $optAno -> fetchArray()) {
								$anoOpt = $resultado['anoDosCapCart'];

								echo'<option value="'.$anoOpt.'">'.$anoOpt.'</option>';

							}


							 ?>
						</select>
					</div>
					
					
					<br>
					<br>
					<div class="form-group col-md-12">
						<a href="reportes.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
						<input type="submit" class="btn btn-success animated pulse delay-1s infinite" value="Continuar"/>
					</div>
				</div>
			</form>
			</div>
	</div>
</body>
</html>