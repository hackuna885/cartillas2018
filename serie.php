<?php  

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');
session_start();
session_destroy();

include("fechaLetra.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Alta Series</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/all.css">
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
		.rojo{
			color: red;
			font-size: 2em;
			cursor: pointer;
		}
		.cabeAzul{
			background-color: #06B5B7;
			color: #FFF;
			font-size: 1.2em;
		}
		
	</style>
</head>
<body class="animated fadeIn">
	<div class="container">
		<div class="cuadroR">
		<div class="starter-template">
			<h1>Sistema de Cartillas</h1>
			<p class="lead centrado">Matriculas</p>
		</div>

			<form action="inSerMat.php" method="post" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<label><h3>Alta Serie Matriculas</h3></label>
					</div>
					<div class="form-group col-md-2">
						<label>Serie:</label>
						<select name="txtSerieMat" class="form-control" required onkeypress="return valida(event)" autofocus/>
							<option value="">----</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Inicio de Matricula:</label>
						<div class="input-group input-group">
						<div class="input-group-text"><b>D-</b></div>
						<input type="text" name="txtMatUnoMat" class="form-control" placeholder="XXXXXXX" maxlength="7" pattern="[0-9]{7}" autocomplete="off" required onkeypress="return valida(event)"/>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label>Final de Matricula:</label>
						<div class="input-group input-group">
						<div class="input-group-text"><b>D-</b></div>
						<input type="text" name="txtMatDosMat" placeholder="XXXXXXX" maxlength="7" pattern="[0-9]{7}" autocomplete="off" class="form-control" required onkeypress="return valida(event)"/>
						</div>
					</div>
					<div class="form-group col-md-2">
						<label>Año:</label>
						<input type="text" name="txtAnoMat" placeholder="Año" maxlength="4" pattern="[0-9]{4}" autocomplete="off" class="form-control" required onkeypress="return valida(event)" value="<?php echo $ano; ?>"/>
					</div>
					
					
					<br>
					<br>
					<div class="form-group col-md-12">
						<a href="reportes.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
						<input type="submit" class="btn btn-success animated pulse delay-1s infinite" value="Continuar"/>
					</div>
				</div>
			</form>
			<br>
			<br>

			<table class="table table-hover">
			 	<thead class="cabeAzul">
			 	<tr>
			 		<th>Serie:</th>
			 		<th>Mat Inicial:</th>
			 		<th>Mat Final</th>
			 		<th>Año</th>
			 		<th>&nbsp</th>
			 	</tr>
			 	</thead>

			<?php 

			$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
			$buscaMat = $con -> query("SELECT * FROM matriculas ORDER BY serieMat,matIniMat,anoMat LIMIT 20");

			while ($resultado = $buscaMat -> fetchArray()) {
				$idMat = $resultado['id'];
				$serieMat = $resultado['serieMat'];
				$matIniMat = $resultado['matIniMat'];
				$matFinalMat = $resultado['matFinalMat'];
				$anoMat = $resultado['anoMat'];
			

			echo '

				<tr>
				 		<td>'.$serieMat.'</td>
				 		<td>D-'.$matIniMat.'</td>
				 		<td>D-'.$matFinalMat.'</td>
				 		<td>'.$anoMat.'</td>
				 		<td><a href="eliminarSerie.php?matriculaEli='.$idMat.'"><i class="fas fa-times-circle rojo"></i></a></td>
				 	</tr>

			';
			}

			$con -> close();



			 ?>

			</table>


			</div>
	</div>
</body>
</html>