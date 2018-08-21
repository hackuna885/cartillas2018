<?php 


error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type: text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');

if (isset($_POST['txtClase']) && !empty($_POST['txtClase']) &&
	isset($_POST['txtNombre']) && !empty($_POST['txtNombre']) &&
	isset($_POST['txtDiaUno']) && !empty($_POST['txtDiaUno']) &&
	isset($_POST['txtMesUno']) && !empty($_POST['txtMesUno']) &&
	isset($_POST['txtAnoUno']) && !empty($_POST['txtAnoUno']) &&
	isset($_POST['txtCurp']) && !empty($_POST['txtCurp']) &&
	isset($_POST['txtDiaDos']) && !empty($_POST['txtDiaDos']) &&
	isset($_POST['txtMesDos']) && !empty($_POST['txtMesDos']) &&
	isset($_POST['txtAnoDos']) && !empty($_POST['txtAnoDos'])) {

	$txtFolio = $_SESSION['folio'];
	$nomPresi = strtoupper("LIC. ANGELINA CARREÑO MIJARES");
	$domCartillas = strtoupper("CD. NICOLÁS ROMERO MEX.");

	$txtClase = strtoupper($_POST['txtClase']);
	$txtNombre = strtoupper($_POST['txtNombre']);
	$txtDiaUno = $_POST['txtDiaUno'];
	$txtMesUno = strtoupper($_POST['txtMesUno']);
	$txtAnoUno = $_POST['txtAnoUno'];
	$txtNacio = strtoupper($_POST['txtNacio']);
	$txtHijoUno = strtoupper($_POST['txtHijoUno']);
	$txtHijoDos = strtoupper($_POST['txtHijoDos']);
	$txtEstadoCv = strtoupper($_POST['txtEstadoCv']);
	$txtOcupa = strtoupper($_POST['txtOcupa']);
	$txtLeer = strtoupper($_POST['txtLeer']);
	$txtCurp = strtoupper($_POST['txtCurp']);
	$txtGrado = strtoupper($_POST['txtGrado']);
	$txtGMaxEst = strtoupper($_POST['txtGMaxEst']);
	$txtDomi = strtoupper($_POST['txtDomi']);
	$txtDiaDos = $_POST['txtDiaDos'];
	$txtMesDos = strtoupper($_POST['txtMesDos']);
	$txtAnoDos = $_POST['txtAnoDos'];

	$fechaRealCap = date('d-m-Y H:i:s');

	
	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$insert = $con -> query("UPDATE datosCartillas SET claseCart='$txtClase',nombreCart = '$txtNombre',diaUnoNaCart = '$txtDiaUno',mesUnoNaCart = '$txtMesUno',anoUnoNaCart = '$txtAnoUno',nacioCart = '$txtNacio',hijoUnoCart = '$txtHijoUno',hijoDosCart = '$txtHijoDos',estCvCart = '$txtEstadoCv',ocupaCart = '$txtOcupa',leerCart = '$txtLeer',curpCart = '$txtCurp',gradoEstCart = '$txtGrado',gMaxEstCart = '$txtGMaxEst',domUsrCart = '$txtDomi',diaDosCapCart = '$txtDiaDos',mesDosCapCart = '$txtMesDos',anoDosCapCart = '$txtAnoDos' WHERE folioCart = '$txtFolio'");
	
	$con -> close();

	echo "<script>window.location='vistaPre.php';</script>";

}else{
	
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo "<script>window.location='matricula.php';</script>";
}

 ?>
