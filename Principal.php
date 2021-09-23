<!DOCTYPE html>
<!-- Pagina Principal-->
<html lang="en" dir="ltr">
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/DescargaCss.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/style.css">
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        require './Lateral.php';
        ?>
        <section class="home-section" style="padding: 2%">
            <form action="Principal.php" method="post">
                <div>
                    <h1>Buscar Usuario</h1>
                    <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="cedula" placeholder="Cedula del Paciente">
                    <input type="submit" class="fadeIn fourth" value="Buscar">
                </div>
            </form>
            <h3>Datos del Usuario:</h3>
            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">          
                <?php
                if (!empty($_POST['cedula'])) {
                    require './config/conexion.php';
                    $cedula = $_POST['cedula'];
                    $consulta = "SELECT * FROM usuarios WHERE ncedula='$cedula';";
                    $resultado = mysqli_query($conexion, $consulta);
                    $filas = mysqli_num_rows($resultado);
                    if ($filas) {
                        while ($datos = mysqli_fetch_array($resultado)) {
                            ?>
                            <table class="container">
                                <tr>
                                    <td><h4>Nombres: <?php echo$datos['nombres'] ?></h4></td>
                                    <td><h4>Apellidos: <?php echo$datos['apellidos'] ?></h4></td>
                                    <td><h4>Usuario: <?php echo$datos['usuario'] ?></h4></td>
                                    <td><h4>Edad: <?php echo$datos['edad'] ?></h4></td>    
                                </tr>
                                <tr>
                                    <td><h4>Altura: <?php echo$datos['altura'] ?> M</h4></td>
                                    <td><h4>Peso: <?php echo$datos['peso'] ?> Libras</h4></td>
                                    <td><h4>Cedula: <?php echo$datos['ncedula'] ?></h4></td>
                                    <td><h4>Correo: <?php echo$datos['correo'] ?></h4></td>
                                </tr>
                            </table>
                            <?php
                            $idusuarios = $datos['idusuarios'];
                        }
                    } else {
                        ?>
                        <h4>Usuario no Registrado en el Sistema</h4>
                        <?php
                    }
                } else {
                    ?>
                    <h4>Consulte al Usuario</h4>
                    <?php
                }
                ?>
            </div>
            <h3 style="margin-top: 50px">Historial de Prescripciones Medicas:</h3>
            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                <?php
                if (!empty($idusuarios)) {
                    $consultam = "SELECT * FROM recetasm INNER JOIN medicamentos ON recetasm.idrecetasm = medicamentos.idmedicamentos INNER JOIN usuarios ON recetasm.idrecetasm = usuarios.idusuarios INNER JOIN doctores ON recetasm.idrecetasm = doctores.iddoctores WHERE usuarios_idusuarios='$idusuarios'";
                    $resultadom = mysqli_query($conexion, $consultam);
                    $filasm = mysqli_num_rows($resultadom);
                    if ($filasm) {
                        while ($datosm = mysqli_fetch_array($resultadom)) {
                            ?>
                            <table class="container">
                                <tr>
                                    <td><h4>Fecha: <?php echo$datosm['fecha'] ?></h4></td>
                                    <td><h4>Institución: <?php echo$datosm['institucion'] ?></h4></td>
                                    <td><h4>Dirección: <?php echo$datosm['direccion'] ?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Doctor: <?php echo$datosm['usuariod'] ?></h4></td>
                                    <td><h4>Correo: <?php echo$datosm['correod'] ?></h4></td>
                                </tr>
                            </table>
                        </div>
                        <h3 style="margin-top: 50px">Medicación:</h3>
                        <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                            <table class="container">
                                <tr>
                                    <td><h4>Medicamentos: <?php echo$datosm['nmedicamento'] ?></h4></td>
                                    <td><h4>Dosis: <?php echo$datosm['dosis'] ?></h4></td>
                                    <td><h4>Intervalo de Horas: <?php echo$datosm['intervalohoras'] ?></h4></td>
                                </tr>
                            </table>

                        </div>
                        <h3 style="margin-top: 50px">Diagnostico:</h3>
                        <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                            <table>
                                <tr>
                                   <td><h4>Diagnostico: <?php echo$datosm['diagnostico'] ?></h4></td> 
                                </tr>
                            </table>
                            <?php
                        }
                    } else {
                        ?>
                        <h4>Usuario no Registrado en el Sistema</h4>
                        <?php
                    }
                } else {
                    ?>
                    <h4>Consulte al Usuario</h4>
                    <?php
                }
                ?>  
            </div>
        </section>
        <script src="css/script.js"></script>

    </body>
</html>
