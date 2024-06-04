<?php
session_start();
$username=$_SESSION['correo'];
$pasword=$_SESSION['pasword'];//$_SESSION['password'];
$usuario=$_SESSION['usuario'];
header('Content-Type: text/html; charset=UTF-8');
echo '<script type="text/javascript">

          d=confirm("Seguro que quieres cerrar la sesion?");
          if(d){location.replace("index.php");}else{location.replace("Inicio.php");}
      </script>';
session_destroy();
// Destruir todas las variables de sesión

?>
    