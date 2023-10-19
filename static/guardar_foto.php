<?php
require("config.php");
date_default_timezone_set("America/Bogota");
$dateFile   = date('d-m-Y H:i:s A', time()); 
if(!isset($_SESSION)){
    session_start();
  }


$imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
//La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));

//Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
//todo el contenido lo guardamos en un archivo
$imagenDecodificada = base64_decode($imagenCodificadaLimpia);

//Calcular un nombre único
$name = $_SESSION['cpf'];
$nombreFoto = $_SESSION['cpf']. ".png";
$nombreImagenGuardada = "C:/Users/Administrador/OneDrive/fotos/" .$nombreFoto;


//Escribir el archivo
//file_put_contents($nombreImagenGuardada, $imagenDecodificada);
if(file_put_contents($nombreImagenGuardada, $imagenDecodificada) ==TRUE){
    $queryInsert  = ("INSERT INTO archivos(nameFile, dateFile) VALUES ('$name','$dateFile')");
    $resultInsert = mysqli_query($con, $queryInsert);
}

//Terminar y regresar el nombre de la foto
exit($nombreFoto);
?>