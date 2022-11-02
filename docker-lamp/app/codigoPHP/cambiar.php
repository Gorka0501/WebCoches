<?php
session_start();
include("conexion.php");

$dni=$_POST["dniC"];
$nombre=$_POST["nombreC"];
$tlf=$_POST["tlfC"];
$email=$_POST["emailC"];
$apellidos=$_POST["apellidosC"];
$fNaci=$_POST["fNaciC"];
$contrasena=$_POST["contrasena1C"];
$dniU=$_SESSION["dni"];
$error=false;
if(!empty($dni)){
    $sql_query = "SELECT * FROM usuario WHERE dni = '$dni'";
    $resultado = mysqli_query($conn,$sql_query);
    if(!empty($resultado && mysqli_num_rows($resultado) < 1)){
        $sql_query = "UPDATE usuario SET dni='$dni' WHERE dni = '$dniU'";
        $resultado = mysqli_query($conn,$sql_query);
        $_SESSION['dni']=$dni;
        $dniU=$dni;
    }
    else{
    	$error=true;
    	echo('<script type="text/javascript">alert("Ya hay un usuario con eses DNI.");window.location.href = "../paginas/datos.php"</script>');
            
    }
        
}
if(!empty($nombre) && !$error){
    $sql_query = "UPDATE usuario SET nombre='$nombre' WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
if(!empty($apellidos) && !$error){
    $sql_query = "UPDATE usuario SET apellidos='$apellidos' WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
if(!empty($tlf && !$error)){
    $sql_query = "UPDATE usuario SET tlf='$tlf' WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
if(!empty($email && !$error)){
    $sql_query = "UPDATE usuario SET email='$email' WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
if(!empty($fNaci && !$error)){
    $sql_query = "UPDATE usuario SET fNaci='$fNaci' WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
if(!empty($contrasena && !$error)){
    $sql_query = "UPDATE usuario SET contrasena='$contrasena' WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
echo('<script type="text/javascript">window.location.href = "../paginas/datos.php"</script>');



mysqli_close($conn);
?>
