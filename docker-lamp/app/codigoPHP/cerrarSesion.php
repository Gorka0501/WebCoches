<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
// Cierra la sesión 
include("conexion.php");
session_start();
$_SESSION['dni'] = null;
$_SESSION['loged'] = false;
$_SESSION['name'] = null;
mysqli_close($conn);
header('Location: ../paginas/index.php');
?>
