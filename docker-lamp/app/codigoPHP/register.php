<?php
include("conexion.php");
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
session_start();
if (!($_POST["CSRFToken"] == $_SESSION["token"])){echo ('<script type="text/javascript">alert("Estaba en una pagina maliciosa.");window.location.href = "../paginas/index.php"</script>');exit();}


$dni=$_POST["dniR"];
$nombre=$_POST["nombreR"];
$tlf=$_POST["tlfR"];
$email=$_POST["emailR"];
$apellidos=$_POST["apellidosR"];
$fNaci=$_POST["fNaciR"];
$contrasena=$_POST["contrasena1R"];
$nBancario=$_POST["nBancarioR"];



$sql_query = "SELECT * FROM usuario WHERE dni = '$dni'";
$resultado = mysqli_query($conn,$sql_query);
if(!empty($resultado) && mysqli_num_rows($resultado) < 1){
  $hash = password_hash($contrasena,PASSWORD_DEFAULT);
  $sql_query= "INSERT INTO usuario (dni,nombre,apellidos,tlf,email,fNaci,contrasena,nBancario) VALUES ('$dni','$nombre','$apellidos','$tlf','$email','$fNaci','$hash',aes_encrypt('$nBancario','cifrado'))";
  mysqli_query($conn,$sql_query);
  echo('<script type="text/javascript">alert("Registrado correctamente.");window.location.href = "../paginas/index.php"</script>');
}else {
  echo('<script type="text/javascript">alert("Ya existe un usuario con ese dni.");window.location.href = "../paginas/index.php"</script>');
}

mysqli_close($conn);

?>

