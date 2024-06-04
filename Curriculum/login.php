<!-- login.php -->

<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión
    exit;
}

// Resto del código aquí
echo "Bienvenido, " . $_SESSION['username'];

?>
       <br> <a href="../AgendaPHP_MV/index.php">Ir al menu</a> 

