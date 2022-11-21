<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
session_start();
include("conexion.php");
if (!($_POST["CSRFToken"] == $_SESSION["token"])){echo ('<script type="text/javascript">alert("Estaba en una pagina maliciosa.");window.location.href = "../paginas/index.php"</script>');exit();}

$dni=$_SESSION["dni"];
$id=$_POST["id"];
$valoracion=$_POST["valoracion"];
$comentario=$_POST["comentario"];

$sql_query= "INSERT INTO comentarios (dniUsuario,idCoche,comentario,valoracion) VALUES ('$dni','$id','$comentario','$valoracion')";

if(!mysqli_query($conn,$sql_query)){
  echo "Error:" . $sql . "" . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: ../paginas/comentarios.php?id=$id");
?>
