<?php
session_start();
ini_set("default_charset", "UTF-8");
mb_internal_encoding("UTF-8");
$username=$_SESSION['correo'];
$pasword=$_SESSION['pasword'];//$_SESSION['password'];
$usuario=$_SESSION['usuario'];
$mysql = new mysqli("localhost", "root", "", "agenda");
// Verificar la conexión
if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}

$nombre=utf8_decode($_POST['nombre']);
$apellidopat=utf8_decode($_POST['apellidopat']);
$apellidomat=utf8_decode($_POST['apellidomat']);
$user=$_SESSION['usuario'];//utf8_decode($_POST['usuario']);
$puesto=utf8_decode($_POST['puestoSoli']);;//utf8_decode($_POST['puesto']);
$correo=utf8_decode($_POST['correo']);
$notel=utf8_decode($_POST['notel']);
$notel2=utf8_decode($_POST['notel2']);
$instagram=utf8_decode($_POST['insta']);;//utf8_decode($_POST['instagram']);
$facebook=utf8_decode($_POST['face']);;//utf8_decode($_POST['facebook']);
$habilidades=utf8_decode($_POST['habilidades']);;//utf8_decode($_POST['habilidades']);
$alos=utf8_decode($_POST['alosE']);
$alosl=utf8_decode($_POST['alosl']."|".$_POST['alosl2']."|".$_POST['alosl3']."|".$_POST['alosl4']."|".$_POST['alosl5']."|");
$lugar=utf8_decode($_POST['lugar1']."|".$_POST['lugar2']."|".$_POST['lugar3']."|".$_POST['lugar4']."|".$_POST['lugar5']."|");
$cargo=utf8_decode($_POST['cargo1']."|".$_POST['cargo2']."|".$_POST['cargo3']."|".$_POST['cargo4']."|".$_POST['cargo5']."|");
$funcion=utf8_decode($_POST['funcion1']."|".$_POST['funcion2']."|".$_POST['funcion3']."|".$_POST['funcion4']."|".$_POST['funcion5']."|");
$tutulo1=utf8_decode($_POST['titulacion1']);
$NombreUni1=utf8_decode($_POST['nomUni1']);
$aniosUni1=utf8_decode($_POST['aniosTit1']);
$descripUni1=utf8_decode($_POST['descTit1']);

$tutulo2=utf8_decode($_POST['titulacion2']);
$NombreUni2=utf8_decode($_POST['nomUni2']);
$aniosUni2=utf8_decode($_POST['aniosTit2']);
$descripUni2=utf8_decode($_POST['descTit2']);
$sobremi=utf8_decode($_POST['sobreti']);

if(isset($_FILES['IMAGEN']['tmp_name'])){

    $foto=addslashes(file_get_contents($_FILES['IMAGEN']['tmp_name']));
    $sql ="UPDATE `datos` SET `foto`='$foto',`correo`='$correo',`NoTel`='$notel',`instagram`='$instagram',`facebook`='$facebook',`habilidades`='$habilidades',`noTel2`='$notel2',`alos`='$alos',`lugar`='$lugar',`cargo`='$cargo',`funcion`='$funcion',`Nombre`='$nombre',`Apellidomat`='$apellidomat',`Apellidopat`='$apellidopat',`alosl`='$alosl',`puesto`='$puesto',`tutulo1`='$tutulo1',`NombreUni1`='$NombreUni1',`aniosUni1`='$aniosUni1',`descrip1`='$descripUni1',`tutulo2`='$tutulo2',`NombreUni2`='$NombreUni2',`aniosUni2`='$aniosUni2',`descrip2`='$descripUni2',`sobremi`='$sobremi' WHERE usuario='$user';";
}else{
    $sql ="UPDATE `datos` SET `correo`='$correo',`NoTel`='$notel',`instagram`='$instagram',`facebook`='$facebook',`habilidades`='$habilidades',`noTel2`='$notel2',`alos`='$alos',`lugar`='$lugar',`cargo`='$cargo',`funcion`='$funcion',`Nombre`='$nombre',`Apellidomat`='$apellidomat',`Apellidopat`='$apellidopat',`alosl`='$alosl',`puesto`='$puesto',`tutulo1`='$tutulo1',`NombreUni1`='$NombreUni1',`aniosUni1`='$aniosUni1',`descrip1`='$descripUni1',`tutulo2`='$tutulo2',`NombreUni2`='$NombreUni2',`aniosUni2`='$aniosUni2',`descrip2`='$descripUni2',`sobremi`='$sobremi' WHERE usuario='$user';";
}

if (mysqli_query($mysql, $sql)) {
      echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="estilos.css">
<title>VitaTec</title>
</head>
<body >
 <header>
            <ul> <li><a href="Inicio.php"> Inicio</a></li>
              <li><a href="ActualizarD.php" id="cambiante">Actualiza tus datos</a></li><li><a href="mostrarDatos.php">Mostrar datos</a></li><li><a href="menuC.php">Hacer curriculum</a></li><li><li><a href="cerrar.php">Cerrar sesion</a></li>
              </ul>

        </header>
<div style="margin-left:30px;">
        <h1>La captura de sus datos se ha hecho correctamente</h1>
        Le recomendamos ir a "Mostrar Datos" en el menú de arriba para observar sus datos
</div

</body>

</html>';
} else {
      echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="estilos.css">
<title>VitaTec</title>
</head>
<body >
 <header>
            <ul>
                <li><a href="Inicio.php"> Inicio</a></li>
                <li><a href="formulario2.php" id="cambiante">Registra tus datos</a></li>
                 <li><a href="cerrar.php">Cerrar sesion</a></li>
              </ul>

        </header>
<div style="margin-left:30px;">
        <h1>Upps!! Ha ocurrido un error en la captura de sus datos</h1>
        Si sus datos ya han sido registrados, solo puede visualizarlos y modificarlos en la secciones correspondientes
</div

</body>

</html>';//Error: " . $sql . "<br>" . mysqli_error($mysql);
}


?>
