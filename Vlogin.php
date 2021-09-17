<?php

require './config/conexion.php';
$correo=$_POST['correo'];
$clave=$_POST['clave'];
if (!empty($correo) && !empty($clave)) {
$consulta="SELECT usuariod, correod, claved FROM doctores WHERE correod='$correo' AND claved='$clave'";
$resultado= mysqli_query($conexion, $consulta);
$filas= mysqli_num_rows($resultado);
session_start();
$_SESSION['correo'];
if($filas){
    header("location:Principal.php");
    
}else{
    ?>
        <script >
            alert('Datos Incorrectos');
        </script>
        <?php
            include './Principal.html';
           
}
}else{
    ?>
        <script >
            alert('Campos de Texto Vacios');
        </script>
        <?php
    include './index.php';
}
?>