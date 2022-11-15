<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
session_start();
include("conexion.php");
if (!($_POST["CSRFToken"] == $_SESSION["token"])){echo ('<script type="text/javascript">alert("Estaba en una pagina maliciosa.");window.location.href = "../paginas/index.php"</script>');exit();}

$valido=0;

$dni=$_POST["dniL"];
$contrasena=$_POST["contrasenaL"];

$sql_query = "SELECT contrasena FROM usuario WHERE dni = '$dni'";
$resultado = mysqli_query($conn,$sql_query);
$hash = mysqli_fetch_array($resultado);

if(!empty($resultado) && mysqli_num_rows($resultado) == 1){
    if(password_verify($contrasena,$hash[0])){
        $sql_query = "SELECT nombre FROM usuario WHERE dni = '$dni'";
        $resultado = mysqli_query($conn,$sql_query);
        $nombre = mysqli_fetch_array($resultado);
        $valido = 1;
        $_SESSION['dni'] = $dni;
        $_SESSION['loged'] = true;
        $_SESSION['name'] = $nombre[0];
        $_SESSION['timeout']=time(); 
    }
}


$sql_query = "INSERT INTO sesiones (dni,fecha,valido) VALUES ('$dni',now(),'$valido')";
if(!mysqli_query($conn,$sql_query)){
    echo "Error:" . $sql . "" . mysqli_error($conn);
}

if($valido==1){
    echo('<script type="text/javascript">alert("Inicio de Sesión.");window.location.href = "../paginas/reservas.php"</script>');
}else{
    
    echo('<script type="text/javascript"> alert("Nombre de Usuario o contraseña inconrrectas.");window.location.href = "../paginas/index.php";</script>');
}
mysqli_close($conn);

?>
