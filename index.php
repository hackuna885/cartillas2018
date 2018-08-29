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
	<title>Cartillas 2018</title>
	<link rel="stylesheet" href="css/botones.css">
	<link rel="stylesheet" href="css/animate.css">
</head>
<body class="animated fadeIn">
	<section class="titulo">
		<h1>Menú de Cartillas</h1>
	</section>
	<nav class="navega">
		<ul class="menu">
			<li class="first-item">
				<a href="buscar.php">
					<img class="imagen" src="img/buscar.svg" alt="">
					<span class="text-item">Busqueda</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="matricula.php">
					<img class="imagen" src="img/registro.svg" alt="">
					<span class="text-item">Registro</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="mes.php">
					<img class="imagen" src="img/reportes.svg" alt="">
					<span class="text-item">Reportes</span>
					<span class="down-item"></span>
				</a>
			</li>
		</ul>
	</nav>
</body>
</html>