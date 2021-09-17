<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/DescargaCss.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <meta charset="UTF-8">
        <title>Medic App</title>
        <link rel="stylesheet" href="style.css">
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        require './Lateral.php';
        ?>
        <section class="home-section" style="padding: 2%">
            <form action="·" method="post" style="">
                <div>
                    <h1>Buscar Usuario</h1>
                    <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="correo" placeholder="Cedula del Paciente">
                    <input type="button" class="fadeIn fourth" value="Buscar">
                </div>
            </form>
            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                <h4>Nombres:  </h4>
                <h4>Apellidos:  </h4>
            </div>
        </section>
        <script src="script.js"></script>

    </body>
</html>
