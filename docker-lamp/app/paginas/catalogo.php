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
        <link rel="stylesheet" href="../estilo/styleCatalogo.css">
        <link rel="stylesheet" href="../estilo/styleBarraLateral.css">
        <link rel="stylesheet" href="../estilo/styleTablas.css">
        <script type="text/javascript" src="../js/prog.js"></script>

    </head>
    <body onload="setFechasAlquiler();inactividad();">
        <!--Barra lateral-->
        <div class="nav-links">
            <!--Logo-->
            <img src="../images/logoB.png" class="logoB">
            <!--Botones-->
            <ul>
                <li><a href="../paginas/anuncios.php">Tus Anuncios</a></li>
                <li><a href="../paginas/reservas.php">Tus Reservas</a></li>
                <li><a href="">Cat&aacutelogo</a></li>
                <li><a href="../paginas/datos.php">Datos Personales</a></li>
                <li><a href="../codigoPHP/cerrarSesion.php"> Cerrar Sesi&oacuten</a></li>
            </ul>
        </div>
        <div class="main">
        	<section class="header">
        		<h1 class="titulo"> Cat&aacutelogo</h1>
               	<h2 class="sub-titulo">Contamos con una gran variedad de veh&iacuteculos</h2>
            </section>
            <section class="body"> 
            <table class="tabla">
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Asientos</th>
                    <th>Kilometraje</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Alquilar</th>
                    <th>Comentarios</th>
                </tr>
                <?php
                $dni=$_SESSION['dni'];
                include("../codigoPHP/conexion.php");
                $sql_query = "SELECT id,marca,modelo,nAsientos,kmTraje FROM coche WHERE dni != '$dni' AND id NOT IN (SELECT id FROM alquiler WHERE Date(fFin)>=Date(Now()))";
                $resultado = mysqli_query($conn,$sql_query);
                while ($row = mysqli_fetch_array($resultado)):;?>
                <tr>    
                    <form class="alquilar" id="alquilar" onsubmit="return compAlquilar()" action="../codigoPHP/alquilar.php" method="post">
                        <td> <?php echo $row[0];?><input type="hidden" name="id" value=<?php echo $row[0];?>></td>
                        <td> <?php echo $row[1];?></td>
                        <td> <?php echo $row[2];?></td>
                        <td> <?php echo $row[3];?></td>
                        <td> <?php echo $row[4];?></td>
                        <td><input type="date" name="fInicio" onclick="setFechasAlquilerFin()" require></td>
                        <td><input type="date" name="fFinal" onclick="setFechasAlquilerFin()" require></td>

                        <input type="hidden" name="CSRFToken" value="<?PHP echo $_SESSION["token"];?>">
                        
                        <td><input type="submit" value="Alquilar" ></td>

                        <td><?php echo "<a href='comentarios.php?id=$row[0]' class='button'>Ver</a>"?></td>
                    </form>
                </tr>
                <?php endwhile;?>
               
            </table>
            </section>
        </body>
</html>
