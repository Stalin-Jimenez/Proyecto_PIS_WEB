<!DOCTYPE html>
<!-- Paguina Secundaria-->
<html lang="en" dir="ltr">
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/DescargaCss.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <meta charset="UTF-8">
        <title>Prescripción</title>
        <link rel="stylesheet" href="css/style.css">
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        require './Lateral.php';
        $idusuarios = $_SESSION['idusuarios'];
        $iddoctores = $_SESSION['iddoctores'];
        ?>
        <section class="home-section" style="padding: 2%">
            <form action="Prescripcionm.php" method="post">
                <div>
                    <h1>Prescripción Medica</h1>               
                </div>
                <h3 style="margin-top: 50px">Encabezado:</h3>
                <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                    <div>
                        <table class="container">
                            <tr>
                            <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="institucion" placeholder="Institución" value="">
                            <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="direccion" placeholder="Dirección" value="">
                            <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="fecha" placeholder="Fecha" value="<?php echo $fechaT = date('Y-m-d H:i:s') ?>">
                            </tr>
                        </table>
                    </div>
                    <?php
                    ?>
                </div>
                <h3 style="margin-top: 50px">Prescripción Medica:</h3>
                <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                    <select class="form-control" name="idmedicamentos" style="width: 25%" aria-label="Default select example">
                        <?php
                        require './config/conexion.php';
                        $sql = "SELECT * FROM medicamentos ORDER BY nmedicamento";
                        $result = mysqli_query($conexion, $sql);
                        while ($datos = mysqli_fetch_array($result)) {
                            $idmedicamentos = $datos['idmedicamentos'];
                            $nmedicamento = $datos['nmedicamento'];
                            $dosis = $datos['dosis'];
                            $intervalohoras = $datos['intervalohoras'];
                            ?>
                            <option value="<?php echo $idmedicamentos; ?>"><?php echo $nmedicamento . ' Dosis: ' . $dosis . ' Cada: ' . $intervalohoras . ' Horas'; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <h3 style="margin-top: 50px">Diagnóstico:</h3>
                <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed; text-align: center">
                    <input style="text-align: start; width: 20%; width: 80%;" type="text" class="fadeIn second" name="diagnostico" placeholder="Diagnóstico" value="">
                </div>
                <div style="text-align: center; margin-top: 50px">
                    <input style="align-items: center" type="submit" class="fadeIn fourth" value="Agregar">
                </div>
            </form>
            <?php
            if (!empty($_POST['institucion']) && !empty($_POST['direccion']) && !empty($_POST['fecha'])) {
                $institucion = $_POST['institucion'];
                $direccion = $_POST['direccion'];
                $fecha = $_POST['fecha'];
                $diagnostico = $_POST['diagnostico'];
                $idmedicamentos = $_POST['idmedicamentos'];
                $insert = "INSERT INTO recetasm(institucion, fecha, direccion, diagnostico, doctores_iddoctores, usuarios_idusuarios, medicamentos_idmedicamentos) VALUES ('$institucion','$fecha','$direccion','$diagnostico','$iddoctores','$idusuarios','$idmedicamentos');";
                $resultadoinset = mysqli_query($conexion, $insert);
                if ($resultadoinset) {
                    ?>
                    <h4>Prescripción Guardada</h4>
                    <?php
                } else {
                    ?>
                    <h4>Error en la Conexion</h4>
                    <?php
                }
            }
            ?>
        </section>
        <script src="css/script.js"></script>

    </body>
</html>
