<?php
session_start();
include("conexion.php");

$dni=$_SESSION["dni"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$kmtraje=$_POST["kmtraje"];
$nasientos=$_POST["nasientos"];

$sql_query= "INSERT INTO coche (dni,marca,modelo,kmTraje,nAsientos) VALUES ('$dni','$marca','$modelo','$kmtraje','$nasientos')";

if(!mysqli_query($conn,$sql_query)){
  echo "Error:" . $sql . "" . mysqli_error($conn);
}
mysqli_close($conn);
header('Location: ../paginas/anuncios.php');
?>
