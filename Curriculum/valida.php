<?php

// Iniciar o reanudar la sesión (necesario para trabajar con sesiones)
session_start();


if (!isset($_SESSION['usuario'])) { 

    header("Location: index.php");
    exit();
}

