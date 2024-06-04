<?php

echo '<script type="text/javascript">alert("Te has registrado correctamente, se refrescara la pagina para que inices sesion");</script>';
$mysql = new mysqli("localhost", "root", "", "agenda");

// Verificar la conexión
if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}

// Obtener datos del formulario de registro
$nombre = $_POST['Nombre'];
$apellidopat = $_POST['Apellidopat'];
$apellidomat = $_POST['Apellidomat'];
$email = $_POST['Email'];
$numcontrol = $_POST['NumControl'];
$password = $_POST['Password'];

$sql = "INSERT INTO usuarios (Nombre, Apellidopat, Apellidomat, Email, NumControl, Password) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysql->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssssis", $nombre, $apellidopat, $apellidomat, $email, $numcontrol, $password);

    if ($stmt->execute()) {
        echo '<script type="text/javascript">alert("Te has registrado correctamente, se refrescara la pagina para que inices sesion");
                // body...
        </script>';

        header("Location:index.php");
    } else {
        echo "Error al insertar usuario: " . $stmt->error;
    }
} else {
    echo "Error en la preparación de la consulta: " . $mysql->error;
}

$stmt->close();
$mysql->close();
?>
