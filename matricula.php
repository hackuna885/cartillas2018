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
	<title>Matricula</title>
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
		
	</style>
</head>
<body class="animated fadeIn">
	<div class="container">
		<div class="cuadroR">
		<div class="starter-template">
			<h1>Sistema de Cartillas</h1>
			<p class="lead centrado">Captura de Datos</p>
		</div>
			<form action="captura.php" method="post" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<label><h3>Matrícula</h3></label>
						<div class="input-group input-group-lg animated pulse">
						<div class="input-group-text"><b>D-</b></div>
						<input type="text" class="form-control" name="txtFolio" placeholder="XXXXXXX" maxlength="7" pattern="[0-9]{7}" autocomplete="off" required autofocus onkeypress="return valida(event)"/>
						</div>
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