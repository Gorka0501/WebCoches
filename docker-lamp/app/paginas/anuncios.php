<?php
session_start();
if(!$_SESSION['loged']==true){header('Location: ../paginas/index.php');}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Alquiler sobre ruedas</title>
        <link rel="stylesheet" href="../estilo/styleAnuncios.css">
        <link rel="stylesheet" href="../estilo/styleBarraLateral.css">
        <link rel="stylesheet" href="../estilo/styleTablas.css">
        <script type="text/javascript" src="../js/prog.js"></script>

    </head>
    <body>
        <!--Barra lateral-->
        <div class="nav-links">
            <!--Logo-->
            <img src="../images/logoB.png" class="logoB">
            <!--Botones-->
            <ul>
                <li><a href="">Tus Anuncios</a></li>
                <li><a href="../paginas/reservas.php">Tus Reservas</a></li>
                <li><a href="../paginas/catalogo.php">Catálogo</a></li>
                <li><a href="../paginas/datos.php">Datos Personales</a></li>
                <li><a href="../codigoPHP/cerrarSesion.php"> Cerrar Sesión</a></li>
            </ul>
        </div>
        <div class="main">
            <!--Header-->
            <section class="header">
                <h1 class="titulo"> Tus coches</h1>
                <h2 class="sub-titulo">Estos son tus coches disponibles para el resto de usuarios<br/>Añade o elimina todos los que quieras</h2>
            </section>
            <section class="inicial">
                <section class="lista" id="lista"> 
                    <table class="tabla" id="tabla">
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Asientos</th>
                            <th>Kilometraje</th>
                            <th>Alquilado</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php
                        include("../codigoPHP/conexion.php");
                        $dni=$_SESSION['dni'];
                        $sql_query = "SELECT id,marca,modelo,nAsientos,kmTraje FROM coche WHERE dni='$dni'";
                        $resultado = mysqli_query($conn,$sql_query);
                        while ($row = mysqli_fetch_array($resultado)):;?>
                        <tr>
                            <form class="coche" id="coche" onsubmit="return compEliminar()" action="../codigoPHP/eliminar.php" method="post">
                                <td> <?php echo $row[0];?><input type="hidden" name="id" value=<?php echo $row[0];?>></td>
                                <td> <?php echo $row[1];?></td>
                                <td> <?php echo $row[2];?></td>
                                <td> <?php echo $row[3];?></td>
                                <td> <?php echo $row[4];?></td>
                                <td> <?php 
                                    $sql_query2 = "SELECT * FROM alquiler WHERE id='$row[0]' AND Date(fFin)>=Date(Now())";
                                    $resultado2 = mysqli_query($conn,$sql_query2);
                                    if(!empty($resultado2 && mysqli_num_rows($resultado2) > 0)){
                                        echo "Si";
                                    }else{echo "No";}
                                    ?> </td>
                                <td><input type="submit" value="Eliminar" ></td>
                            </form>
                        </tr>
                        <?php endwhile;?>   
                    </table>
            	    <input type="button" value="Añadir coche" onclick="bPasarAnadir()" >
                </section>
           	    <form class="anadirCoche" id="anadirCoche" style="display:none" action="../codigoPHP/anadir.php" method="post">
                    <h1>Añadir Coche</h1>
                    <label for="marca"><b>Marca:</b></label>
                    <input type="text" name="marca" placeholder="Marca" required><br>
                    <label for="modelo"><b>Modelo:</b></label>
                    <input type="text" name="modelo" placeholder="Modelo" required><br>
                    <label for="kmtraje"><b>Kilometraje:</b></label>
                    <input type="number" name="kmtraje" min=0 max=1000000 require><br>
                    <label for="nasientos"><b>N&uacutemero de asientos:</b></label>
                    <input type="number" name="nasientos" min=1  max=1000 required><br>
                    

                    <input type="submit" value="Añadir coche">
                    <input type="button" value="Ver Coches" onclick="bPasarVer()" >

                </form>
                
                
            </section>
        </body>
    </html>
