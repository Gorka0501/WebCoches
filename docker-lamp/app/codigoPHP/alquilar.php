<?php
session_start();
include("conexion.php");

$fInicio=$_POST["fInicio"];
$fFinal=$_POST["fFinal"];
$id=$_POST["id"];
$dni=$_SESSION["dni"];

$sql_query= "INSERT INTO alquiler (dni,id,fInicio,fFin) VALUES ('$dni','$id','$fInicio','$fFinal')";

if(!mysqli_query($conn,$sql_query)){
  echo "Error:" . $sql . "" . mysqli_error($conn);
}

mysqli_close($conn);
header('Location: ../paginas/reservas.php');
?>
