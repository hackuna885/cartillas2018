<?php  

date_default_timezone_set('America/Mexico_City');
session_start();

$fecha = date('Y-m-d');

if (isset($_POST['txtFolio']) && !empty($_POST['txtFolio'])) {

	$folioX = $_POST['txtFolio'];
	$_SESSION['folio'] = $folioX;

	echo '

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Captura</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<style>
		h1,h3{
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
		.centrado{
			text-align: center;
		}
		.txtRojo{
			color: #C40202;
		}

		
	</style>
</head>
<body>
	<div class="container">
		<div class="starter-template">
			<h1>Sistema de Cartillas</h1>
			<p class="lead centrado">Captura de Datos</p>
			<h3><label class="txtRojo">D-</label>'.$folioX.'</h3>
		</div>
			<form action="insertar.php" method="post">
				<div class="form-row">
					<div class="form-group col-md-2">
					<label>Clase:</label>
				<input type="text" class="form-control" name="txtClase" placeholder="Año de nacimiento" maxlength="4" pattern="[0-9]{4}" required autofocus/>
					</div>
				<div class="form-group col-md-6">
				<label>Nombre:</label>
				<input type="text" class="form-control" name="txtNombre" placeholder="Nombre(s) A Paterno A Materno" required/>
				</div>
				
				<div class="form-group col-md-2">
				<label>Fecha de Na:</label>
				<input type="date" class="form-control" name="txtFechaNa" placeholder="Fecha de nacimiento" required/>
				</div>
				
				<div class="form-group col-md-2">
				<label>Nación en:</label>
				<input type="text" class="form-control" name="txtNacio" placeholder="Lugar de nacimiento"/>
				</div>
				
				<div class="form-group col-md-6">
				<label>Hijo de:</label>
				<input type="text" class="form-control" name="txtHijoUno" placeholder="Padre"/>
				</div>
				
				<div class="form-group col-md-6">
				<label>Y de:</label>
				<input type="text" class="form-control" name="txtHijoDos" placeholder="Madre"/>
				</div>
				<div class="form-group col-md-4">
				<legend class="col-form-label col-sm-6 pt-0">Esto Civil:</legend>
				<div class="col-sm-6">
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtEstadoCv" value="SOLTERO" checked />
				<label class="form-check-label" for="gridRadios1">Soltero</label>
				</div>
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtEstadoCv" value="CASADO" />
				<label class="form-check-label" for="gridRadios1">Casado</label>
				</div>
				</div>
				</div>
				<div class="form-group col-md-4">
				<label>Ocupación:</label>
				<input type="text" class="form-control" name="txtOcupa" placeholder="Ocupación"/>
				</div>
				<div class="form-group col-md-4">
				<legend class="col-form-label col-sm-6 pt-0">¿Sabe Leer?</legend>
				<div class="col-sm-6">
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtLeer" value="SI" checked />
				<label class="form-check-label" for="gridRadios1">Sí</label>
				</div>
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtLeer" value="NO" />
				<label class="form-check-label" for="gridRadios1">No</label>
				</div>
				</div>
				</div>
				<div class="form-group col-md-2">
				<label>CURP:</label>
				<input type="text" class="form-control" name="txtCurp" placeholder="CURP 18 dígitos" maxlength="18" pattern="[A-Za-z0-9]{18}" title="Son 18 dígitos" required/>
				</div>
				<div class="form-group col-md-2">
				<label>Grado max:</label>
				<input type="text" class="form-control" name="txtGrado" placeholder="Grado:"/>
				</div>
				<div class="form-group col-md-2">
				<label>&nbsp</label>
				<select class="form-control" name="txtGMaxEst" required>
					<option value="">----</option>
					<option value="NADA">NADA</option>
					<option value="PRIMARIA">PRIMARIA</option>
					<option value="SECUNDARIA">SECUNDARIA</option>
					<option value="PREPARATORIA">PREPARATORIA</option>
					<option value="LICENCIATURA">LICENCIATURA</option>
				</select>
				</div>
				<div class="form-group col-md-4">
				<label>Domicilio:</label>
				<input type="text" class="form-control" name="txtDomi" placeholder="Domicilio"/>
				</div>
				<div class="form-group col-md-2">
				<label>Fecha de Imp:</label>
				<input type="date" class="form-control" name="txtFecha" placeholder="Fecha" value="'.$fecha.'" required/>
				</div>
				<br>
				<div class="form-group col-md-6">
				<input type="submit" class="btn btn-success" value="Continuar"/>
				<input type="reset" class="btn btn-outline-info" value="Lipiar"/>
				</div>
			</div>
			</form>
	</div>
</body>
</html>



	';
}else{
	echo "<script>alert('Llena todos los Campos!');</script>";
	echo "<script>window.location='matricula.php';</script>";
}


?>

