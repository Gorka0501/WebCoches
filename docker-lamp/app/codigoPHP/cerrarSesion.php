<?php
// Cierra la sesión 
include("conexion.php");
session_start();
$_SESSION['dni'] = null;
$_SESSION['loged'] = false;
$_SESSION['name'] = null;
mysqli_close($conn);
header('Location: ../paginas/index.php');
?>
