<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
session_start();
if (!($_POST["CSRFToken"] == $_SESSION["token"])){echo ('<script type="text/javascript">alert("Estaba en una pagina maliciosa.");window.location.href = "../paginas/index.php"</script>');exit();}
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
