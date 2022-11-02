<?php
session_start();
include("conexion.php");

$id=$_POST["id"];

$sql_query= "DELETE FROM coche WHERE id=$id";

if(!mysqli_query($conn,$sql_query)){
  echo "Error:" . $sql . "" . mysqli_error($conn);
}
mysqli_close($conn);
header('Location: ../paginas/anuncios.php');
?>
