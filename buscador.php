<?php 


echo'
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Buscador</title>
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
		.rojo{
			color: red;
			font-size: 2em;
			cursor: pointer;
		}
		.azul{
			color: #06B5B7;
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
			<p class="lead centrado">Buscador</p>
		</div>
			<form action="buscador.php" method="post" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<label><h3>Buscar Registros</h3></label>
						<div class="input-group input-group-lg animated pulse">
						<input type="text" class="form-control" name="txtDatosBuscar" placeholder="Datos..." maxlength="49" pattern="{49}" autocomplete="off" required autofocus/>
						</div>
					</div>
					<br>
					<br>
					<div class="form-group col-md-12">
						<a href="buscar.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
						<input type="submit" class="btn btn-success animated pulse delay-1s infinite" value="Continuar"/>
					</div>
				</div>
			</form>
			<br>
			<br>

 <table class="table table-hover">

 	<thead class="cabeAzul">
 	<tr>
 		<th>Matricula:</th>
 		<th>Nombre:</th>
 		<th>&nbsp</th>
 		<th>&nbsp</th>
 	</tr>
 	</thead>
';
$txtBuscador = strtoupper($_POST['txtDatosBuscar']);
$folioCart = "";
$nombreCart = "";

	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$buscarDatos = $con -> query("SELECT folioCart,nombreCart,folioCart||' '||nombreCart AS datoBusqueda FROM datosCartillas WHERE datoBusqueda LIKE '%$txtBuscador%' LIMIT 10");

	while ($resultado = $buscarDatos -> fetchArray()) {
		$folioCart = $resultado['folioCart'];
		$nombreCart = $resultado['nombreCart'];


		echo '

			<tr>
			 		<td>'.$folioCart.'</td>
			 		<td>'.$nombreCart.'</td>
			 		<td><a href="eliminar.php?matriculaEli='.$folioCart.'"><i class="fas fa-times-circle rojo"></i></a></td>
			 		<td><a href="actualizarDos.php?matriculaMod='.$folioCart.'"><i class="fas fa-edit azul"></i></a></td>
			 	</tr>

		';
	}
	$con -> close();

echo '
</div>
</div>
 </table>

 </body>
</html>
';


 ?>

