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
        <link rel="stylesheet" href="../estilo/styleComentarios.css">
        <link rel="stylesheet" href="../estilo/styleBarraLateral.css">
        <link rel="stylesheet" href="../estilo/styleTablas.css">
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
                <li><a href="../paginas/reservas.php">Tus Reservas</a></li>
                <li><a href="../paginas/catalogo.php">Catálogo</a></li>
                <li><a href="../paginas/datos.php">Datos Personales</a></li>
                <li><a href="../codigoPHP/cerrarSesion.php"> Cerrar Sesión</a></li>
            </ul>
        </div>
        <div class="main">
            <!--Header-->
            <section class="header">
                <h1 class="titulo"> Comentarios </h1>
                <h2 class="sub-titulo">Sección de Comentarios del Coche:<br/><br/>
                <section>
                    <table class="tabla" id="tabla">
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Asientos</th>
                            <th>Kilometraje</th>
                        </tr>
                        <?php
                        include("../codigoPHP/conexion.php");
                        $id=$_GET["id"];
                        $sql_query = "SELECT id,marca,modelo,nAsientos,kmTraje FROM coche WHERE id='$id'";
                        $resultado = mysqli_query($conn,$sql_query);
                        $row = mysqli_fetch_array($resultado);?>
                            <td> <?php echo $row[0];?></td>
                            <td> <?php echo $row[1];?></td>
                            <td> <?php echo $row[2];?></td>
                            <td> <?php echo $row[3];?></td>
                            <td> <?php echo $row[4];?></td>
                        </tr> 
                    </table>
                </section></h2>
            </section>
            


            <section class="inicial">
                
                <section class="lista" id="listaComentarios"> 
                    <input type="button" value="Añadir comentario" onclick="bPasarAnadirComentario()"></br> 
                    
                    <table class="tabla" id="tabla">
                        <tr>
                            <th>idCoche</th>
                            <th>Comentario</th>
                            <th>Valoracion</th>
                            <th>Nombre</th>
                        </tr>
                        <?php
                        include("../codigoPHP/conexion.php");
                        $sql_query = "SELECT dniUsuario,idCoche,comentario,valoracion FROM comentarios WHERE idCoche='$id'";
                        $resultado = mysqli_query($conn,$sql_query);
                        while ($row = mysqli_fetch_array($resultado)):;?>
                        <tr>
                                <td> <?php echo $row[1];?></td>
                                <td> <textarea class="leer" id="comentario" name="comentario" readonly="True"><?php echo $row[2];?></textarea><br></td>
                                <td> <?php echo $row[3];?></td>
                                <td> <?php 
                                    $sql_query2 = "SELECT nombre FROM usuario WHERE dni='$row[0]'";
                                    $resultado2 = mysqli_query($conn,$sql_query2);
                                    $row2 = mysqli_fetch_array($resultado2);
                                    echo $row2[0]; ?>
                                    
                        </tr>
                        <?php endwhile;?>   
                    </table>
                </section>
           	    <form class="anadirComentario" id="anadirComentario" style="display:none" action="../codigoPHP/anadirComentario.php" method="post">
                    <h1>Valoracion:</h1>
                    0 <input type="range" name="valoracion", min="0" max="5" step="1" required> 5
                    <br><br><br>
                    <h1>Comentario:</h1>
                    <textarea class = "escribir" id="comentario" name="comentario" cols=5 row="5" cols="80" placeholder="Escribe aqui tu comentario" maxlength=300 wrap="hard"></textarea><br>
                    
                    <input type="hidden" name="CSRFToken" value="<?PHP echo $_SESSION["token"];?>">
                    <input type="hidden" name="id" value="<?PHP echo $id;?>">           
                    <input type="submit" value="Añadir comentario">
                    <input type="button" value="Ver Comentarios" onclick="bPasarVerComentarios()" >

                </form>
                
                
            </section>
        </body>
    </html>
