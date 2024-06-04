<?php 
require('valida.php');

$usuario=$_SESSION['usuario'];
header('Content-Type: text/html; charset=UTF-8');
$mysql = new mysqli("localhost", "root", "", "agenda");

if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}
$Query = "SELECT * FROM datos WHERE usuario ='".$usuario."';";
$Result = $mysql->query($Query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bienvenido a VITATEC</title>
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/inicio.css">
</head>

<body>
 <header>
            <ul>
                <li><a href="Inicio.php"> Inicio</a></li>



<?php
if ($Result->num_rows > 0) {
    $row = $Result->fetch_assoc();
    echo '<li><a href="ActualizarD.php" id="cambiante">Actualiza tus datos</a></li><li><a href="mostrarDatos.php">Mostrar datos</a></li><li><a href="menuC.php">Hacer curriculum</a></li>';
    }
    else{
        echo '<li><a href="formulario2.php" id="cambiante">Registra tus datos</a></li>';}

$mysql->close();
?>

                
                
                <li><a href="cerrar.php">Cerrar sesion</a></li>
              </ul>

        </header>

        <section>

        <div align="center">
        <H1>Bienvenido a VITAETEC</H1>
        <p>Esta pagina esta desarrollada para ayudarte con la necesidad de crear un CV
        Te recomendamos registrar tus datos que te ayudara pues es lo que necesitas para tener acceso a todos los beneficios de esta pagina</p></div>

        </section>
</body>
</html>