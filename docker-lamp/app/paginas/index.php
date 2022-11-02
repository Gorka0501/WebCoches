<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Alquiler sobre ruedas</title>
        <link rel="stylesheet" href="../estilo/styleIndex.css">
        <link rel="stylesheet" href="../estilo/styleBarraLateral.css">
        <script type="text/javascript" src="../js/prog.js"></script>

    </head>
    <body onload="setFechaMaxR()">
        <!--Barra lateral-->
        <div class="nav-links">
            <!--Logo-->
            <img src="../images/logoB.png" class="logoB">
            <!--Botones-->
            <ul>
                <li><a href="">Inicio</a></li>;
            </ul>
        </div>
        <!--Pagina principal-->
        <div class="main">
            <!--Header-->
            <section class="header">
                <h1 class="titulo"> Alquiler sobre ruedas</h1>
                <h2 class="sub-titulo">Alquileres rodados<br/>para todos</h2>
            </section>
            <section class="sesion">
                <!--login-->
                <form class="login" id="loginI" onsubmit="return compLogin()" action="../codigoPHP/login.php" method="post">
                    <h1>Inicio sesión</h1>
                    <input type="text" name=dniL placeholder="DNI" required="required"><br>
                    <input type="password" name=contrasenaL placeholder="Contraseña" required="required"><br>
                    <input type="submit" value="Entrar">

                    <input type="button" value="No tengo cuenta" onclick="bPasarRegister()">

                </form>
                <!--registro-->
                <form class="register" id="registerI" style="display:none" onsubmit="return compRegistrar()" action="../codigoPHP/register.php" method="post">
                    <h1>Registrarse</h1>
                    <label for="dniR"><b>DNI:</b></label>
                    <input type="text" name="dniR" placeholder="12345678X" required><br>
                    <label for="nombreR"><b>Nombre:</b></label>
                    <input type="text" name="nombreR" placeholder="Nombre" required><br>
                    <label for="apellidosR"><b>Apellidos:</b></label>
                    <input type="text" name="apellidosR" placeholder="Apellidos" required><br>
                    <label for="tlfR"><b>Teléfono:</b></label>
                    <input type="text" name="tlfR" placeholder="123456789" required><br>
                    <label for="fNaciR"><b>Fecha de Nacimiento:</b></label>
                    <input type="date" name="fNaciR" require><br>
                    <label for="emailR"><b>Email:</b></label>
                    <input type="text" name="emailR" placeholder="example@example.ex" required><br>
                    <label for="contrasena1R"><b>Contraseña:</b></label>
                    <input type="password" name="contrasena1R" placeholder="1234" required><br>
                    <label for="contrasena2R"><b>Confirmar Contraseña:</b></label>
                    <input type="password" name="contrasena2R" placeholder="1234" required><br>
                    

                    <input type="submit" value="Registrarse">
                    <input type="button" value="Ya tengo cuenta" onclick="bPasarLogin()">

                </form>
                
                
            </section>

        </div>





    </body>
</html>
