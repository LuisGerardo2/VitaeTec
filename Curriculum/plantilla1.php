<?php 
session_start();
$username=$_SESSION['correo'];
$pasword=$_SESSION['pasword'];//$_SESSION['password'];
$usuario=$_SESSION['usuario'];
echo "Usuario: ".$username."<br>";
echo "contra: ".$pasword."<br>";
echo "usuario: ".$usuario;

$mysql = new mysqli("localhost", "root", "", "agenda");

if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}
$Query = "SELECT * FROM datos WHERE usuario ='".$usuario."';";
$Result = $mysql->query($Query);

if ($Result->num_rows > 0) {
    $row = $Result->fetch_assoc();
    }
$mysql->close();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ejemplo de HTML5">
    <meta name="keywords" content="HTML5, CSS3, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="estiloBasico.css">

    <title>Plantilla curriculum 1</title>
</head>


<body>
    <div id="agrupar"><?php echo $row['Nombre'].' '.$row['Apellidopat'].' '.$row['Apellidomat']?>

        <aside id="columna"> <!-- aside -->
            <img id="imagen" src="data:image/jpg;base64,<?php echo base64_encode($row['foto'])?>" width="150" height="150">

            <h3>
                <?php echo $row['Nombre'].' '.$row['Apellidopat'].' '.$row['Apellidomat']?>
            </h3>
            <h5>
                <?php echo $row['puesto'];?>
            </h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quidem vero, ducimus quos ipsum corporis
                ex delectus fugit placeat magnam quas aperiam, eos est nobis cum accusantium praesentium tempore
                aspernatur?</p>
            <br>
            <h5>Datos del contacto</h5>
            <img src="telefono.jpg" width="15" height="15"> &nbsp; <?php echo $row['NoTel'];?>
            <br>
            <br>
            <img src="telefono.jpg" width="15" height="15"> &nbsp; <?php echo $row['noTel2'];?>
            <br>
            <br>
            <img src="gmail3.png" width="15" height="15"> &nbsp; <?php echo $row['correo'];?>
            <br>
            <br>
            <img src="instagram.png" width="15" height="15"> &nbsp; <?php echo $row['instagram'];?>
            <br>
            <br>
            <img src="facebook.png" width="15" height="15"> &nbsp; <?php echo $row['facebook'];?>

            <h5>IDIOMA</h5>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad eveniet fugit, modi consequuntur dolorem
                iure, ex quis numquam, corporis temporibus aliquam illo in? Magnam, et. Corporis, nihil dolorem? Iure,
                quasi!</p>

        </aside> <!-- Fin aside -->

        <section id="seccion">
                    <img src="empleo.png" width="100" height="100">
                    <center>
                        <h2>Empleos</h2>
                    </center>


            <article>
                <h3> EXPERIENCIA PROFECIONAL </h3>
                <table>
                    <th>año-año </th> 
                    
                    <th> Trabajo </th>
                    <br>
                    <td>cargo</td>
                    <br>

                </table>

                <h5> xxxx-xxxx Trabajo </h3>
                    Cargo: &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    <br> Función: &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    <br>
                    <br>
            <label>
                PERFIL
            </label>

            <h5> estudiante de ()en la()   </h5>
                Cargo: &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit.
                <br> Función: &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit.
            <BR>
            </BR>

<label>
    EDUCACION 
</label>

<h5> <?php echo $row['estudios'];?> </h5>
<br>
<br>
 <br>
<label> 
    HABILIDADES
</label>
<p>
    <?php echo $row['habilidades'];?>
</p>
<br>
 <br>

 <label> 
    INTERESES
</label>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad eveniet fugit, modi consequuntur dolorem
    iure, ex quis numquam, corporis temporibus aliquam illo in? Magnam, et. Corporis, nihil dolorem? Iure,
    quasi!</p>
<br>
 <br>

 <label> 
    CURSOS Y CERTIFICACIONES
</label>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad eveniet fugit, modi consequuntur dolorem
    iure, ex quis numquam, corporis temporibus aliquam illo in? Magnam, et. Corporis, nihil dolorem? Iure,
    quasi!</p>
<br>
 <br>


</article>
</section> <!--Fin de section seccion-->
</div> <!--fin div agrupar-->
</body>

</html>