<?php
include("../codigoPHP/sesion.php");
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header_remove("X-Powered-By");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Alquiler sobre ruedas</title>
        <link rel="stylesheet" href="../estilo/styleDatos.css">
        <link rel="stylesheet" href="../estilo/styleBarraLateral.css">
        <script type="text/javascript" src="../js/prog.js"></script>

    </head>
    <body onload="setFechaMaxD('cambio','fNaciC');inactividad()">
        <!--Barra lateral-->
        <div class="nav-links">
            <!--Logo-->
            <img src="../images/logoB.png" class="logoB">
            <!--Botones-->
            <ul>
                <li><a href="../paginas/anuncios.php">Tus Anuncios</a></li>
                <li><a href="../paginas/reservas.php">Tus Reservas</a></li>
                <li><a href="../paginas/catalogo.php">Catálogo</a></li>
                <li><a href="">Datos Personales</a></li>
                <li><a href="../codigoPHP/cerrarSesion.php"> Cerrar Sesión</a></li>
            </ul>
        </div>
        <div class="main">
            <!--Header-->
            <section class="header">
                <h1 class="titulo"> Datos personales</h1>
            </section>
            <?php
            $dni=$_SESSION['dni'];
            include("../codigoPHP/conexion.php");
            $sql_query = "SELECT dni,nombre,apellidos,tlf,email,aes_decrypt(nBancario,'cifrado') FROM usuario WHERE dni = '$dni'";
            $resultado = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($resultado);
            ?>
            <form class="informacion" id="cambio" onsubmit="return compCambio()" action="../codigoPHP/cambiar.php" method="post">
            	<label for="dniC"><b>DNI:</b></label>
                <input type="text" name="dniC" placeholder=<?php echo $row[0];?>><br>
            	<label for="nombreC"><b>NOMBRE:</b></label>
                <input type="text" name="nombreC" placeholder=<?php echo $row[1];?>><br>
            	<label for="apellidosC"><b>Apellidos:</b></label>
                <input type="text" name="apellidosC" placeholder=<?php echo $row[2];?>><br>
                <label for="tlfC"><b>Teléfono:</b></label>
                <input type="text" name="tlfC" placeholder=<?php echo $row[3];?>><br>
                <label for="fNaciC"><b>Fecha de Nacimiento:</b></label>
                <input type="date" name="fNaciC"><br>
            	<label for="emailC"><b>Email:</b></label>
                <input type="text" name="emailC" placeholder=<?php echo $row[4];?>><br>
                <label for="nBacnarioC"><b>Numero Bancario:</b></label>
                <input type="text" name="nBancarioC" placeholder=<?php echo $row[5];?>><br>
                <label for="contrasena1C"><b>Contraseña:</b></label>
                <input type="password" name="contrasena1C" placeholder="1234"><br>
                <label for="contrasena2C"><b>Confirmar contraseña:</b></label>
                <input type="password" name="contrasena2C" placeholder="1234"><br>

                <input type="hidden" name="CSRFToken" value="<?PHP echo $_SESSION["token"];?>">

                <input type="submit" value="Modificar datos">
            </form>
            </section>
        
         </body>
</html>
