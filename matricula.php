<?php  

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Matricula</title>
	<link rel="stylesheet" href="css/bootstrap.css">
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
		
	</style>
</head>
<body>
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
						<div class="input-group input-group-lg">
						<div class="input-group-text"><b>D-</b></div>
						<input type="text" class="form-control" name="txtFolio" placeholder="XXXXXXX" maxlength="7" pattern="[0-9]{7}" required autofocus/>
						</div>
					</div>
					<br>
					<br>
					<div class="form-group col-md-12">
						<input type="reset" class="btn btn-danger" value="Cancelar"/>
						<input type="submit" class="btn btn-success" value="Continuar"/>
					</div>
				</div>
			</form>
			</div>
	</div>
</body>
</html>