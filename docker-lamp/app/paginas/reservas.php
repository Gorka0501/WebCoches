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
        <link rel="stylesheet" href="../estilo/styleReservas.css">
        <link rel="stylesheet" href="../estilo/styleBarraLateral.css">
        <script type="text/javascript" src="../js/prog.js"></script>

    </head>
    <body onload="inactividad()">
        <!--Barra lateral-->
        <div class="nav-links">
            <!--Logo-->
            <img src="../images/logoB.png" class="logoB">
            <!--Botones-->
            <ul>
                <li><a href="../paginas/anuncios.php">Tus Anuncios</a></li>
                <li><a href="">Tus Reservas</a></li>
                <li><a href="../paginas/catalogo.php">Catálogo</a></li>
                <li><a href="../paginas/datos.php">Datos Personales</a></li>
                <li><a href="../codigoPHP/cerrarSesion.php"> Cerrar Sesión</a></li>
            </ul>
        </div>
        <div class="main">
            <!--Header-->
            <section class="header">
                <h1 class="titulo"> Reservas</h1>
                <h2 class="sub-titulo">Aqu&iacute puedes consultar todas tus reservas</h2>
            </section>
            <section>
                <table class="tabla" id="tabla">
                	<tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Asientos</th>
                        <th>Kilometraje</th>
                        <th>fInicio</th>
                        <th>fFinal</th>
                        <th>Comentarios</th>
               	    </tr>
               	    <?php
                    include("../codigoPHP/conexion.php");
                    $dni=$_SESSION['dni'];
                    $sql_query = "SELECT id,fInicio,fFin FROM alquiler WHERE dni='$dni' AND Date(fFin)>=Date(Now())";
                    $resultado = mysqli_query($conn,$sql_query);
                	while ($row = mysqli_fetch_array($resultado)):;?>
                	<tr>
                        <?php
                        $sql_query2 = "SELECT id,marca,modelo,nAsientos,kmTraje FROM coche WHERE id='$row[0]'";
                        $resultado2 = mysqli_query($conn,$sql_query2);
                        $row2 = mysqli_fetch_array($resultado2);
                        ?>
                        <td> <?php echo $row2[0];?></td>
                        <td> <?php echo $row2[1];?></td>
                        <td> <?php echo $row2[2];?></td>
                        <td> <?php echo $row2[3];?></td>
                        <td> <?php echo $row2[4];?></td>
                        <td> <?php echo $row[1];?></td>
                        <td> <?php echo $row[2];?></td>
                        <td><input type="button" value="Ver" onclick=<?php echo "<a href='comentarios.php?id=$row[0]&fFin=$row[1],fInicio=$row[1]'></a>"?>; ></td>
               	    </tr>
               	    </tr>
              	  <?php endwhile;?>   
            	</table>
            </section>
        <div>
	</body>
</html>
