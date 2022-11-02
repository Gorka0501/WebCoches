<?php
session_start();
if($_SESSION['loged']==false){header('Location: ../paginas/index.php');}
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
    <body onload="setFechaMaxD('cambio','fNaciC')">
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
            <form class="informacion" id="cambio" onsubmit="return compCambio()" action="../codigoPHP/cambiar.php" method="post">
            	<label for="dniC"><b>DNI:</b></label>
                <input type="text" name="dniC" placeholder="12345678X"><br>
            	<label for="nombreC"><b>NOMBRE:</b></label>
                <input type="text" name="nombreC" placeholder="Nombre"><br>
            	<label for="apellidosC"><b>Apellidos:</b></label>
                <input type="text" name="apellidosC" placeholder="Apellidos"><br>
                <label for="tlfC"><b>Teléfono:</b></label>
                <input type="text" name="tlfC" placeholder="123456789"><br>
                <label for="fNaciC"><b>Fecha de Nacimiento:</b></label>
                <input type="date" name="fNaciC"><br>
            	<label for="emailC"><b>Email:</b></label>
                <input type="text" name="emailC" placeholder="example@example.ex"><br>
                <label for="contrasena1C"><b>Contraseña:</b></label>
                <input type="password" name="contrasena1C" placeholder="1234"><br>
                <label for="contrasena2C"><b>Confirmar contraseña:</b></label>
                <input type="password" name="contrasena2C" placeholder="1234"><br>

                <input type="submit" value="Modificar datos">
            </form>
            </section>
        
         </body>
</html>
