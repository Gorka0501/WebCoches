<?php
include("conexion.php");

$dni=$_POST["dniR"];
$nombre=$_POST["nombreR"];
$tlf=$_POST["tlfR"];
$email=$_POST["emailR"];
$apellidos=$_POST["apellidosR"];
$fNaci=$_POST["fNaciR"];
$contrasena=$_POST["contrasena1R"];

$sql_query = "SELECT * FROM usuario WHERE dni = '$dni'";
$resultado = mysqli_query($conn,$sql_query);
if(!empty($resultado) && mysqli_num_rows($resultado) < 1){
  $sql_query= "INSERT INTO usuario (dni,nombre,apellidos,tlf,email,fNaci,contrasena) VALUES ('$dni','$nombre','$apellidos','$tlf','$email','$fNaci','$contrasena')";
  echo('<script type="text/javascript">alert("Registrado correctamente.");window.location.href = "../paginas/index.php"</script>');
}else {
  echo('<script type="text/javascript">alert("Ya existe un usuario con ese dni.");window.location.href = "../paginas/index.php"</script>');
}
if(!mysqli_query($conn,$sql_query)){
  echo "Error:" . $sql . "" . mysqli_error($conn);
}

mysqli_close($conn);

?>
