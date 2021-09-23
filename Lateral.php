<?php
session_start();
$Correo=$_SESSION['correo'];
?>
<div class="sidebar" style="background: #2E2E2E">
    <div class="logo-details">
        <div class="logo_name">Menu</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

        <li>
            <a href="Principal.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Inicio</span>
            </a>
            <span class="tooltip">Inicio</span>
        </li>
        <li>
            <a href="Prescripcionm.php">
                <i class='bx bx-folder' ></i>
                <span class="links_name">Prescripción Medica</span>
            </a>
            <span class="tooltip">Prescripción Medica</span>
        </li>
        <li>
            <a href="CitasM.php">
                <i class='bx bx-user' ></i>
                <span class="links_name">Citas Medica</span>
            </a>
            <span class="tooltip">Citas Medica</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Ajustes</span>
            </a>
            <span class="tooltip">Ajustes</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="Imagenes/doctor.png" alt="profileImg">
                <div class="name_job">
                    <div class="name"><?php  ?></div>
                    <div class="job"><?php echo $Correo; ?></div>
                </div>
            </div>
            <a href="index.php"><i class='bx bx-log-out' id="log_out"></i></a>
        </li>
    </ul>
</div>