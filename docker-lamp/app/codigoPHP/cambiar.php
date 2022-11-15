<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
session_start();
if (!($_POST["CSRFToken"] == $_SESSION["token"])){echo ('<script type="text/javascript">alert("Estaba en una pagina maliciosa.");window.location.href = "../paginas/index.php"</script>');exit();}
include("conexion.php");

$dni=$_POST["dniC"];
$nombre=$_POST["nombreC"];
$tlf=$_POST["tlfC"];
$email=$_POST["emailC"];
$apellidos=$_POST["apellidosC"];
$fNaci=$_POST["fNaciC"];
$contrasena=$_POST["contrasena1C"];
$nBancario=$_POST["nBancarioC"];
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
    $hash = password_hash($contrasena,PASSWORD_DEFAULT);
    $sql_query = "UPDATE usuario SET contrasena='$hash' WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
if(!empty($nBancario && !$error)){
    $sql_query = "UPDATE usuario SET nBancario=aes_encrypt('$nBancario','cifrado') WHERE dni = '$dniU'";
    $resultado = mysqli_query($conn,$sql_query);
}
echo('<script type="text/javascript">window.location.href = "../paginas/datos.php"</script>');



mysqli_close($conn);
?>
