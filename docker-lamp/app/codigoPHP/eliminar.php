<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
session_start();
include("conexion.php");
if (!($_POST["CSRFToken"] == $_SESSION["token"])){echo ('<script type="text/javascript">alert("Estaba en una pagina maliciosa.");window.location.href = "../paginas/index.php"</script>');exit();}

$id=$_POST["id"];

$sql_query= "DELETE FROM coche WHERE id=$id";

if(!mysqli_query($conn,$sql_query)){
  echo "Error:" . $sql . "" . mysqli_error($conn);
}
mysqli_close($conn);
header('Location: ../paginas/anuncios.php');
?>
