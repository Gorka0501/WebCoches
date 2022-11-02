<?php
session_start();
include("conexion.php");

$dni=$_POST["dniL"];
$contrasena=$_POST["contrasenaL"];

$sql_query = "SELECT nombre FROM usuario WHERE dni = '$dni' and contrasena = '$contrasena'";
$resultado = mysqli_query($conn,$sql_query);
$nombre = mysqli_fetch_array($resultado);

if(!empty($resultado) && mysqli_num_rows($resultado) == 1){
    echo('<script type="text/javascript">alert("Inicio de Sesión.");window.location.href = "../paginas/reservas.php"</script>');
    $_SESSION['dni'] = $dni;
    $_SESSION['loged'] = true;
    $_SESSION['name'] = $nombre[0];
}
else {
    echo('<script type="text/javascript"> alert("Nombre de Usuario o contraseña inconrrectas.");window.location.href = "../paginas/index.php";</script>');
}

mysqli_close($conn);
?>