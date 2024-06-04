<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');


$mysql = new mysqli("localhost", "root", "", "agenda");

// Verificar la conexión
if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}

// Obtener datos del formulario
$username = $_POST['NumControl']; 
$password = $_POST['Password'];


// Buscar el usuario en la base de datos
$Query = "SELECT * FROM usuarios WHERE NumControl ='".$username."'";
$Result = $mysql->query($Query);

if ($Result === false) {
    die("Error al ejecutar la consulta: " . $mysql->error);
}

// Verificar si se encontró el usuario
if ($Result->num_rows > 0) {
    $row = $Result->fetch_assoc(); // Obtener la fila de resultados
    
    // Verificar la contraseña
    if ($password==$row["Password"]) {
         $_SESSION['correo']=$row["Email"];
        $_SESSION['pasword']=$row["Password"];//$_SESSION['password'];
        $_SESSION['usuario']=$username;
        $_SESSION['NumControl'] = $username;
        // Contraseña correcta: Iniciar sesión y establecer variables de sesión
        if($password=="administrador" && $username==21011010){
            header("Location: ../Administrador/InicioA.php") ;
        }else{
       
        header("Location: Inicio.php") ;}
    
        ;// Redirigir a la página principal después de iniciar sesión
        exit; // Finalizar el script después de redirigir
    } else {
        // Contraseña incorrecta

        echo '<script> alert("Contraseña incorrecta");location.replace("index.php"); </script>';
        
?>
       
<?php
    }
} else {
    // Usuario no encontrado
    echo '<script> alert("Usuario no encontrado, verifique su usuario");
    location.replace("index.php");</script>';
?>
<?php
    
    exit; // Finalizar el script después de redirigir
}

// Cerrar la conexión
$mysql->close();
?>
