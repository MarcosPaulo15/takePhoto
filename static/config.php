<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "foto_video";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
$db = mysqli_select_db($con, $basededatos) or die("Opps, falha ao conectar ao banco de dados!");
?>

