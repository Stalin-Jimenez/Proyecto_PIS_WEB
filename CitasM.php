<!DOCTYPE html>
<!-- Tercera Paguina-->
<html lang="en" dir="ltr">
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/DescargaCss.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <meta charset="UTF-8">
        <title>Citas Medicas</title>
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
            <form action="CitasM.php" method="post">
                <div>
                    <h1>Agendar Citas Medicas</h1>
                    <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="cedula" placeholder="Cedula del Paciente">
                    <input type="submit" class="fadeIn fourth" value="Consultar">
                </div>
            </form>

            <h3 style="margin-top: 50px">Historial de Citas Medicas Asistidas:</h3>
            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                <?php
                if (!empty($_POST['cedula'])) {
                    require './config/conexion.php';
                    $cedula = $_POST['cedula'];
                    $consultaid = "SELECT * FROM usuarios WHERE ncedula='$cedula';";
                    $resultadoid = mysqli_query($conexion, $consultaid);
                    $datoid = mysqli_fetch_array($resultadoid);
                    if (!empty($datoid)) {
                        $idusuarios = $datoid['idusuarios'];
                        $consulta = "SELECT institucion, fecha, direccion, usuariod, correod, usuario, correo, iddoctores FROM citasm INNER JOIN doctores ON citasm.idcitasm = doctores.iddoctores INNER JOIN usuarios ON citasm.idcitasm = usuarios.idusuarios WHERE usuarios_idusuarios='$idusuarios'";
                        $resultado = mysqli_query($conexion, $consulta);
                        $filas = mysqli_num_rows($resultado);
                        if ($filas) {
                            while ($datos = mysqli_fetch_array($resultado)) {
                                ?>
                                <table class="container">
                                    <tr>
                                        <td><h4>Fecha: <?php echo$datos['fecha'] ?></h4></td>
                                        <td><h4>Institución: <?php echo$datos['institucion'] ?></h4></td>
                                        <td><h4>Dirección: <?php echo$datos['direccion'] ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4>Paciente: <?php echo$datos['usuario'] ?></h4></td>
                                        <td><h4>Doctor: <?php echo$datos['usuariod'] ?></h4></td>
                                        <td><h4>Correo: <?php echo$datos['correod'] ?></h4></td>                                
                                    </tr>
                                </table>
                                <?php
                                $direccionT = $datos['direccion'];
                                $institucionT = $datos['institucion'];
                                $_SESSION['iddoctores'] = $iddoctores = $datos['iddoctores'];
                                $_SESSION['idusuarios'] = $idusuarios;
                            }
                        } else {
                            ?>
                            <h4>Usuario no Registrado en el Sistema</h4>
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
            <h3 style="margin-top: 50px">Citas Pendientes:</h3>
            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                <?php
                if (!empty($idusuarios)) {
                    $consultam = "SELECT institucion,fecha,direccion, usuariod, correod, usuario, correo FROM citasmp INNER JOIN doctores ON citasmp.idcitasmp INNER JOIN usuarios ON citasmp.idcitasmp WHERE usuarios_idusuarios='$idusuarios';";
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
                                    <td><h4>Paciente: <?php echo$datosm['usuario'] ?></h4></td>
                                    <td><h4>Doctor: <?php echo$datosm['usuariod'] ?></h4></td>
                                    <td><h4>Correo: <?php echo$datosm['correod'] ?></h4></td>
                                    <h4>===========================================================================================================================</h4>
                                </tr>
                            </table>
                            <?php
                        }
                    } else {
                        ?>
                        <h4>El Usuario aun no tiene Citas Pendientes</h4>
                        <?php
                    }
                } else {
                    ?>
                    <h4>Consulte al Usuario</h4>
                    <?php
                }
                ?>  
            </div>
            <h3 style="margin-top: 50px">Agregar Cita:</h3>
            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                <form  method="post">
                    <div>
                        <table class="container">
                            <tr>
                            <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="institucion" placeholder="Institución" value="">
                            <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="direccion" placeholder="Dirección" value="">
                            <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="fecha" placeholder="Fecha" value="<?php echo $fechaT = date('Y-m-d H:i:s') ?>">
                            <input type="submit" class="fadeIn fourth" value="Agregar">
                            </tr>
                        </table>
                    </div>
                </form>
                <?php
                if (!empty($_POST['institucion']) && !empty($_POST['direccion']) && !empty($_POST['fecha'])) {
                    require './config/conexion.php';
                    $institucion = $_POST['institucion'];
                    $direccion = $_POST['direccion'];
                    $fecha = $_POST['fecha'];
                    $idd = $_SESSION['iddoctores'];
                    $idu = $_SESSION['idusuarios'];
                    $sql = "INSERT INTO citasmp (institucion, fecha, direccion, doctores_iddoctores, usuarios_idusuarios) VALUES ('$institucion','$fecha','$direccion','$idd','$idu')";
                    $resultadoinset = mysqli_query($conexion, $sql);
                    if ($resultadoinset) {
                        ?>
                        <h4>Cita Agendada con exito</h4>
                        <?php
                    } else {
                        ?>
                        <h4>Error al Agendar la Cita</h4>
                        <?php
                    }
                }
                ?>
            </div>
        </section>
        <script src="css/script.js"></script>

    </body>
</html>
