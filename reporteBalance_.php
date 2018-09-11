<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: text/html; Charset=UTF-8');
session_start();

include("fechaLetra.php");
$id = 1;

if (isset($_POST['txtAnoRepoB']) && !empty($_POST['txtAnoRepoB'])) {

	$anoRepoB = $_POST['txtAnoRepoB'];

	$_SESSION['anoRepoB'] = $anoRepoB;
	$calseRepoB = $anoRepoB-18;


	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$totMatriculas = $con -> query("SELECT SUM(diferencia)+2 AS totalCartillas FROM (SELECT (matFinalMat-matIniMat) AS diferencia FROM matriculas WHERE anoMat = '2018');");
					while ($resultado = $totMatriculas -> fetchArray()) {
						$totalCartillas = $resultado['totalCartillas'];
					}

	$tablaBalanceTotal = $con -> query("SELECT COUNT(folioCart) cuantasCartillas,MIN(folioCart) AS INICIA,MAX(folioCart) AS TERMINA FROM  datosCartillas WHERE anoDosCapCart = '$anoRepoB'");
			while ($resultado = $tablaBalanceTotal -> fetchArray()) {
				$cuantasCartillas = $resultado['cuantasCartillas'];
				$inicia = $resultado['INICIA'];
				$termina = $resultado['TERMINA'];
			}
		$termina2 = $termina+1;

	$tablaClases = $con -> query("SELECT * FROM (SELECT COUNT(claseCart) AS ANTICIPADOS FROM datosCartillas WHERE claseCart > '$calseRepoB'),(SELECT COUNT(claseCart) AS CLASE FROM datosCartillas WHERE claseCart = '$calseRepoB'),(SELECT COUNT(claseCart) AS REMISOS FROM datosCartillas WHERE claseCart < '$calseRepoB')");
			while ($resultado = $tablaClases -> fetchArray()) {
				$totAnti = $resultado['ANTICIPADOS'];
				$totClase = $resultado['CLASE'];
				$totRemi = $resultado['REMISOS'];
			}


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
			max-width: 800px;
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
		.textCentrado{
			text-align: center;
		}
		
	</style>
</head>
<body class="animated fadeIn">
	<div class="container">
		<div class="cuadroR ocultar">
				<div class="starter-template">
					<h1>Sistema de Cartillas</h1>
					<p class="lead centrado">Reporte</p>
				</div>

				<div class="form-group col-md-12">
					<label><h3>Balance General: Clase '.$calseRepoB.'</h3></label>
					<br>
				</div>

		</div>

		<div class="firmaPresi">
		<p class="text-center"><b>
		BALANCE GENERAL DE CARTILLAS EXPEDIDAS EN LA J.M.R.
		<br>
		<br>
		JUNTA MUNICIPAL DE RECLUTAMIENTO DE CD. NICOLÁS ROMERO. MEX.
		<br>
		<br>
		BALANCE GENERAL DE CARTILLAS DE IDENTIDAD DEL SERVICIO MILITAR NACIONAL QUE FUERON MINISTRADAS A 
		<br>
		ESTE MUNICIPIO POR LA OFICINA DE RECLUTAMIENTO DE LA 22/a. ZONA MILITAR PARA SE EXPEDIDAS AL 
		<br>
		PERSONAL DE SOLDADOS DEL SERVICIO MILITAR NACIONAL, CLASE '.$calseRepoB.', ANTICIPADOS Y REMISOS.
		</b></p>
		</div>
		<br>


		<div class="table-responsive col-md-12">
		<table class="table table-striped table-hover">
		<thead class="cabeAzul">
	 		<tr>
	 			<th>No.</th>
	 			<th>MATRICULA</th>
	 			<th>NOMBRE(S)</th>
	 			<th>CLASE</th>
	 		</tr>
	 		
	 	</thead>';
		

		
		$matriculasX = $con -> query("SELECT serieMat,matIniMat,matFinalMat FROM matriculas WHERE anoMat = '2018' ORDER BY serieMat,matIniMat,anoMat");
					while ($resultado = $matriculasX -> fetchArray()) {
						$serieMat = $resultado['serieMat'];
						$matIniMat = $resultado['matIniMat'];
						$matFinalMat = $resultado['matFinalMat'];

						echo '
					 	<thead class="textCentrado">
					 		<tr>
					 			<th colspan="4">'.$serieMat.'a. SERIE DE LA MATRICULA D-'.$matIniMat.' A LA D-'.$matFinalMat.'</th>
					 		</tr>
					 	</thead>
						';
						$tablaBalance = $con -> query("SELECT folioCart,nombreCart,claseCart FROM datosCartillas WHERE anoDosCapCart = '$anoRepoB' AND folioCart BETWEEN '$matIniMat' AND '$matFinalMat' ORDER BY folioCart");
			
							while ($resultado = $tablaBalance -> fetchArray()) {
									$folioCart = $resultado['folioCart'];
									$nombreCart = $resultado['nombreCart'];
									$claseCart = $resultado['claseCart'];

									if ($claseCart == $calseRepoB) {
										$tCaso = "CLASE";
									}elseif ($claseCart < $calseRepoB) {
										$tCaso = "REMISO";
									}elseif ($claseCart > $calseRepoB) {
										$tCaso = "ANTICIPADO";
									}

									echo '
										<tr>
											<td>'.$id++.'</td>
								 			<td>D-'.$folioCart.'</td>
								 			<td>'.$nombreCart.'</td>
								 			<td>'.$tCaso.'</td>
								 		</tr>
									';
								}


					}
		
		

echo '

	</table>
	<br>
	<div class="firmaPresi">
		<p class="text-center"><b>CARTILLAS MINISTRADAS POR LA 22/a. ZONA MILITAR
		<br>
		MINISTRADAS POR LA 22/a. ZONA MILITAR
		</b></p>

		<div class="form-group col-md-8 centrarCuadro">
		<table class="table table-sm">

		';

		$matriculasX2 = $con -> query("SELECT serieMat,matIniMat,matFinalMat FROM matriculas WHERE anoMat = '2018' ORDER BY serieMat,matIniMat,anoMat");
					while ($resultado = $matriculasX2 -> fetchArray()) {
						$serieMat2 = $resultado['serieMat'];
						$matIniMat2 = $resultado['matIniMat'];
						$matFinalMat2 = $resultado['matFinalMat'];
						
						$matTotMat2 = ($matFinalMat2-$matIniMat2)+1;

						echo'
							<tr>
								<td>SERIE '.$serieMat2.':</td>
								<td><b>D-'.$matIniMat2.' A LA D-'.$matFinalMat2.'</b></td>
								<td></td>
							</tr>
							<tr>
								<td>Total:</td>
								<td><b>'.$matTotMat2.'</b></td>
								<td></td>
							</tr>
						';
					}

					$matSobrantes = $matFinalMat2-$termina;


		
		echo'
							<tr>
								<td>TOTAL MINISTRADAS:</td>
								<td></td>
								<td><b>'.$totalCartillas.'</b></td>
							</tr>
			
		</table>
		<br>

		<table class="table table-sm">
			<tr>
				<td colspan="2">EXPEDIDOS AL PERSONAL DE LA CLASE, ANTICIPADOS Y REMISOS:</td>
				<td><b>'.$cuantasCartillas.'</b></td>
			</tr>
			<tr>
				<td>INUTILIZADAS:</td>
				<td></td>
				<td>0</td>
			</tr>
			<tr>
				<td>EXTRAVIADAS:</td>
				<td></td>
				<td>0</td>
			</tr>
			<tr>
				<td>SOBRANTES:</td>
				<td>D-'.$termina2.' A LA D-'.$matFinalMat.'</td>
				<td>'.$matSobrantes.'</td>
			</tr>
			<tr>
				<td>ANTICIPADOS:</td>
				<td></td>
				<td>'.$totAnti.'</td>
			</tr>
			<tr>
				<td>CLASE:</td>
				<td></td>
				<td>'.$totClase.'</td>
			</tr>
			<tr>
				<td>REMISOS:</td>
				<td></td>
				<td>'.$totRemi.'</td>
			</tr>
			<tr>
				<td>TOTAL:</td>
				<td></td>
				<td>'.$totalCartillas.'</td>
			</tr>
		</table>

		</div>

	</div>

			</div>
					<br>
					<div class="ocultar">
					<div class="form-group col-md-12 centrarCuadro">
					<a href="reportes.php"><button type="button"class="btn btn-outline-info"/>Regresar</button></a>
					<a href="impreRepoBalance.php"><button type="button" class="btn btn-success animated pulse delay-1s infinite"/><i class="fas fa-print"></i> Imprimir</button></a>
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

}else{
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo "<script>window.location='balance.php';</script>";
}

 ?>