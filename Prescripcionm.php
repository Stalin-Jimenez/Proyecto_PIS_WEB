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
        ?>
        <section class="home-section" style="padding: 2%">
            <form action="Principal.php" method="post">
                <div>
                    <h1>Prescripción Medica</h1>
                    <input style="text-align: start; width: 20%" type="text" class="fadeIn second" name="cedula" placeholder="Cedula del Paciente">
                    <input type="submit" class="fadeIn fourth" value="Buscar">
                </div>
            </form>

            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed">
                
            </div>
            
            <div class="fadeIn fourth" style="width: 100%; height: 50% ; padding: 1%; border-style: solid; border-color: #56baed; margin-top: 50px">
               
            </div>
        </section>
        <script src="css/script.js"></script>

    </body>
</html>
