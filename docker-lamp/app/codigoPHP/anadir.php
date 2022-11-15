<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
session_start();
include("conexion.php");
if (!($_POST["CSRFToken"] == $_SESSION["token"])){echo ('<script type="text/javascript">alert("Estaba en una pagina maliciosa.");window.location.href = "../paginas/index.php"</script>');exit();}

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
