<?php 


error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

header('Content-Type: text/html; Charset=UTF-8');

date_default_timezone_set('America/Mexico_City');

if (isset($_POST['txtClase']) && !empty($_POST['txtClase']) &&
	isset($_POST['txtNombre']) && !empty($_POST['txtNombre']) &&
	isset($_POST['txtFechaNa']) && !empty($_POST['txtFechaNa']) &&
	isset($_POST['txtCurp']) && !empty($_POST['txtCurp']) &&
	isset($_POST['txtFecha']) && !empty($_POST['txtFecha'])) {

	$txtFolio = $_SESSION['folio'];
	$nomPresi = strtoupper("LIC. ANGELINA CARREÑO MIJARES");
	$domCartillas = strtoupper("CD. NICOLÁS ROMERO MEX.");

	$txtClase = strtoupper($_POST['txtClase']);
	$txtNombre = strtoupper($_POST['txtNombre']);
	$txtFechaNa = strtoupper($_POST['txtFechaNa']);
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
	$txtFecha = strtoupper($_POST['txtFecha']);

	$fechaRealCap = date('d-m-Y H:i:s');

	
	$con = new SQlite3("datos.db") or die("Problemas para contectar DB!");
	$insert = $con -> query("INSERT INTO datosCartillas ('folioCart','claseCart','nombreCart','fechaNaCart','nacioCart','hijoUnoCart','hijoDosCart','estCvCart','ocupaCart','leerCart','curpCart','gradoEstCart','gMaxEstCart','domUsrCart','nomPresiCart','domCart','fechaCapCart','fechaRCap') VALUES ('$txtFolio','$txtClase','$txtNombre','$txtFechaNa','$txtNacio','$txtHijoUno','$txtHijoDos','$txtEstadoCv','$txtOcupa','$txtLeer','$txtCurp','$txtGrado','$txtGMaxEst','$txtDomi','$nomPresi','$domCartillas','$txtFecha','$fechaRealCap')");
	
	$con -> close();

	echo "<script>window.location='vistaPre.php';</script>";

}else{
	echo "<script>alert('No puedes ver esta Pagina!');</script>";
	echo "<script>window.location='matricula.php';</script>";
}


 ?>