<?php  
error_reporting(E_ALL ^ E_DEPRECATED);
header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('America/Mexico_City');
session_start();


if (isset($_SESSION['folio']) && !empty($_SESSION['folio'])) {
	$folioX = $_SESSION['folio'];

	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$busqueda = $con -> query("SELECT folioCart,claseCart,nombreCart,diaUnoNaCart,mesUnoNaCart,anoUnoNaCart,nacioCart,hijoUnoCart,hijoDosCart,estCvCart,ocupaCart,leerCart,curpCart,gradoEstCart,gMaxEstCart,domUsrCart,nomPresiCart,domCart,diaDosCapCart,mesDosCapCart,anoDosCapCart FROM datosCartillas WHERE folioCart = '$folioX'");

	while ($resultado = $busqueda -> fetchArray()) {
	
		$txtfolioCart = $resultado['folioCart'];
		$txtclaseCart = $resultado['claseCart'];
		$txtnombreCart = $resultado['nombreCart'];
		$txtdiaUnoNaCart = $resultado['diaUnoNaCart'];
		$txtmesUnoNaCart = $resultado['mesUnoNaCart'];
		$txtanoUnoNaCart = $resultado['anoUnoNaCart'];
		$txtnacioCart = $resultado['nacioCart'];
		$txthijoUnoCart = $resultado['hijoUnoCart'];
		$txthijoDosCart = $resultado['hijoDosCart'];
		$txtestCvCart = $resultado['estCvCart'];
		$txtocupaCart = $resultado['ocupaCart'];
		$txtleerCart = $resultado['leerCart'];
		$txtcurpCart = $resultado['curpCart'];
		$txtgradoEstCart = $resultado['gradoEstCart'];
		$txtgMaxEstCart = $resultado['gMaxEstCart'];
		$txtdomUsrCart = $resultado['domUsrCart'];
		$txtnomPresiCart = $resultado['nomPresiCart'];
		$txtdomCart = $resultado['domCart'];
		$txtdiaDosCapCart = $resultado['diaDosCapCart'];
		$txtmesDosCapCart = $resultado['mesDosCapCart'];
		$txtanoDosCapCart = $resultado['anoDosCapCart'];
	}

	$con -> close();


	if ($txtestCvCart == "SOLTERO") {

		$estadoXCivil= '
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtEstadoCv" value="SOLTERO" checked />
				<label class="form-check-label" for="gridRadios1">Soltero</label>
				</div>
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtEstadoCv" value="CASADO" />
				<label class="form-check-label" for="gridRadios1">Casado</label>
				</div>
				</div>';
	}else{
		$estadoXCivil= '
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtEstadoCv" value="SOLTERO" />
				<label class="form-check-label" for="gridRadios1">Soltero</label>
				</div>
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtEstadoCv" value="CASADO" checked/>
				<label class="form-check-label" for="gridRadios1">Casado</label>
				</div>
				</div>';
	}


	if ($txtleerCart == "SI") {

		$leerCartX = '
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtLeer" value="SI" checked />
				<label class="form-check-label" for="gridRadios1">Sí</label>
				</div>
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtLeer" value="NO" />
				<label class="form-check-label" for="gridRadios1">No</label>
				</div>
				';
	}else{
		$leerCartX = '
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtLeer" value="SI"  />
				<label class="form-check-label" for="gridRadios1">Sí</label>
				</div>
				<div class="form-check">
				<input class="form-check-input" type="radio" name="txtLeer" value="NO" checked/>
				<label class="form-check-label" for="gridRadios1">No</label>
				</div>
		';
	}

	

echo'

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Captura</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/animate.css">
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
	<script type="text/javascript">
	function autoAno(str){
		var xmlhttp;
		if (str.length == 0) {
			document.getElementById("txtHint").innetHTML="";
		}
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "autoAno.php?txtQr="+str,true);
		xmlhttp.send();

	}
	</script>
</head>
<body class="animated fadeIn">
	<div class="container">
		<div class="starter-template">
			<h1>Sistema de Cartillas</h1>
			<p class="lead centrado">Captura de Datos</p>
			<h3><label class="txtRojo">D-</label>'.$txtfolioCart.'</h3>
		</div>
			<form action="actualizarBase.php" method="post">
				<div class="form-row">
					<div class="form-group col-md-1">
					<label>Clase:</label>
				<input type="text" class="form-control animated pulse" name="txtClase" placeholder="Año" maxlength="4" pattern="[0-9]{4}" onkeyup="autoAno(this.value)" required autocomplete="off" autofocus value="'.$txtclaseCart.'"/>
					</div>
				<div class="form-group col-md-3">
				<label>Nombre:</label>
				<input type="text" class="form-control" name="txtNombre" placeholder="Nombre(s) A Paterno A Materno" maxlength="42" pattern="{42}" autocomplete="off" value="'.$txtnombreCart.'" required/>
				</div>

				<div class="form-group col-md-1">
				<label>Fecha NA:</label>
				<input type="text" class="form-control" name="txtDiaUno" placeholder="Día" required maxlength="2" pattern="[0-9]{2}" autocomplete="off" value="'.$txtdiaUnoNaCart.'"/>
				</div>
				
				<div class="form-group col-md-2">
				<label>&nbsp</label>
				<select name="txtMesUno" class="form-control" required>
					<option value="'.$txtmesUnoNaCart.'">'.$txtmesUnoNaCart.'</option>
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

				<div class="form-group col-md-1" id="txtHint">
				<label>&nbsp</label>
				<input type="text" class="form-control" name="txtAnoUno" placeholder="Año" maxlength="4" pattern="[0-9]{4}" autocomplete="off" required value="'.$txtanoUnoNaCart.'"/>
				</div>
				
				<div class="form-group col-md-4">
				<label>Nación en:</label>
				<input type="text" class="form-control" name="txtNacio" placeholder="Lugar de nacimiento" maxlength="36" pattern="{36}" autocomplete="off" value="'.$txtnacioCart.'"/>
				</div>
				
				<div class="form-group col-md-6">
				<label>Hijo de:</label>
				<input type="text" class="form-control" name="txtHijoUno" placeholder="Padre" maxlength="42" pattern="{42}" autocomplete="off" value="'.$txthijoUnoCart.'"/>
				</div>
				
				<div class="form-group col-md-6">
				<label>Y de:</label>
				<input type="text" class="form-control" name="txtHijoDos" placeholder="Madre" maxlength="42" pattern="{42}" autocomplete="off" value="'.$txthijoDosCart.'"/>
				</div>
				<div class="form-group col-md-4">
				<legend class="col-form-label col-sm-6 pt-0">Esto Civil:</legend>
				<div class="col-sm-6">
				'.$estadoXCivil.'
				</div>
				<div class="form-group col-md-4">
				<label>Ocupación:</label>
				<select class="form-control" name="txtOcupa" required>
					<option value="'.$txtocupaCart.'">'.$txtocupaCart.'</option>
					<option value="">----</option>
					<option value="ESTUDIANTE">ESTUDIANTE</option>
					<option value="EMPLEADO">EMPLEADO</option>
				</select>
				</div>
				<div class="form-group col-md-4">
				<legend class="col-form-label col-sm-6 pt-0">¿Sabe Leer?</legend>
				<div class="col-sm-6">
					'.$leerCartX.'
				</div>
				</div>
				<div class="form-group col-md-2">
				<label>CURP:</label>
				<input type="text" class="form-control" name="txtCurp" placeholder="CURP 18 dígitos" maxlength="18" pattern="[A-Za-z0-9]{18}" title="Son 18 dígitos" autocomplete="off" value="'.$txtcurpCart.'" required/>
				</div>
				<div class="form-group col-md-1">
				<label>Grado max:</label>
				<input type="text" class="form-control" name="txtGrado" placeholder="Grado:"  maxlength="9" pattern="{9}" autocomplete="off" value="'.$txtgradoEstCart.'"/>
				</div>
				<div class="form-group col-md-2">
				<label>&nbsp</label>
				<select class="form-control" name="txtGMaxEst" required>
					<option value="'.$txtgMaxEstCart.'">'.$txtgMaxEstCart.'</option>
					<option value="">----</option>
					<option value="NADA">NADA</option>
					<option value="PRIMARIA">PRIMARIA</option>
					<option value="SECUNDARIA">SECUNDARIA</option>
					<option value="PREPARATORIA">PREPARATORIA</option>
					<option value="LICENCIATURA">LICENCIATURA</option>
				</select>
				</div>
				<div class="form-group col-md-3">
				<label>Domicilio:</label>
				<input type="text" class="form-control" name="txtDomi" placeholder="Domicilio" maxlength="57" pattern="{57}" autocomplete="off" value="'.$txtdomUsrCart.'"/>
				</div>
				<div class="form-group col-md-1">
				<label>Fecha:</label>
				<input type="text" class="form-control" name="txtDiaDos" placeholder="Día" required maxlength="2" pattern="[0-9]{2}" value="'.$txtdiaDosCapCart.'"/>
				</div>
				
				<div class="form-group col-md-2">
				<label>&nbsp</label>
				<select name="txtMesDos" class="form-control" required>
					<option value="'.$txtmesDosCapCart.'">'.$txtmesDosCapCart.'</option>
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

				<div class="form-group col-md-1">
				<label>&nbsp</label>
				<input type="text" class="form-control" name="txtAnoDos" placeholder="Año" maxlength="4" pattern="[0-9]{4}" value="'.$txtanoDosCapCart.'" required/>
				</div>
				<br>
				<div class="form-group col-md-6">
				<input type="submit" class="btn btn-success animated pulse delay-1s infinite" value="Continuar"/>
				<input type="reset" class="btn btn-outline-info" value="Lipiar"/>
				</div>
			</div>
			</form>
	</div>
</body>
</html>


';
}else{
	echo "<script>alert('No puedes ver esta pagina!');</script>";
	echo "<script>window.location='matricula.php';</script>";
}
	

?>

