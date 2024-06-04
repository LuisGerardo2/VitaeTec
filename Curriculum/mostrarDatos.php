<?php 
require('valida.php');


$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" href="css/stylem.css" title="Color">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/mostrarDatos.css">
</head>

<body>

 <header>
            <ul><li><a href="Inicio.php"> Inicio</a></li>
                <?php 
// $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");      

$mysql = new mysqli("localhost", "root", "", "agenda");
$Query = "SELECT * FROM datos where usuario='".$usuario."';";
$Result = $mysql->query( $Query );


$numeroRegistros=$Result->num_rows;
if($numeroRegistros<=0) 
   { 
     echo '<li><a href="formulario2.php" id="cambiante">Registra tus datos</a></li>';
   }else{echo '<li><a href="ActualizarD.php" id="cambiante">Actualiza tus datos</a></li><li><a href="mostrarDatos.php">Mostrar datos</a></li><li><a href="menuC.php">Hacer curriculum</a></li>';
   ?>
                
               <li><a href="cerrar.php">Cerrar sesion</a></li>
              </ul>

        </header>
     
  <br><br>
<section id="seccion">
    <article>
<div>



       <table  bordercolor="yellow" id="Luis" style="margin-left: 30px;">
        <tr>
        <td><strong> Usuario</strong></td>
        <td><strong> Foto</strong></td>
        <td><strong> Correo</strong></td>
        <td><strong> Telefono</strong></td>
        <td><strong><center>Instagram</center></strong>
             <td><strong> Facebook</strong></td>
        <td><strong><center>Habilidades</center></strong>
            <td><strong> Telefono 2</strong></td>
        <td><strong><center>Experencia en años</center></strong>
            <td><strong> años laborales</strong></td>
        <td colspan="3"><strong><center>Trabajos</center></strong>
            <td><strong> Nombre</strong></td>
        <td><strong><center>Apellido paterno</center></strong>
            <td><strong>  apellido materno</strong></td>
        </tr>
        <?php
         // fetch_array() Obtiene una fila de resultado como un array asociativo
        while($row =$Result->fetch_array()) {       
           ?>
           <tr>
           <td> <?php printf($row["usuario"]); ?>   </td>
          
           <td> <img height="100px" width="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['foto'])?>"/>  </td>
          
           <td> <?php printf($row["correo"]); ?></td>
           <td> <?php printf($row["NoTel"]); ?></td>
           <td> <?php printf($row["instagram"]); ?></td>
           <td> <?php printf($row["facebook"]); ?></td>
           <td> <?php printf($row["habilidades"]); ?></td>
           <td> <?php printf($row["noTel2"]); ?></td>
           <td> <?php printf($row["experienciaA"]); ?></td>
           <td> <?php printf($row["alos"]); ?></td>
           <td colspan="3">
            <table><tr><th>Empresa</th><th>Cargos</th><th>Funcion</th><th>Años</th></tr>
            <?php 
            $anios=explode('|', $row['alosl']);
           $empresas=explode('|', $row['lugar']);
           $cargos=explode('|', $row['cargo']);
           $funciones=explode('|', $row['funcion']);
           for ($i=0; $i < count($empresas); $i++) { 
            if(isset($empresas[$i])){
                echo "<tr><td>".$empresas[$i]."</td><td>".$cargos[$i]."</td><td>".$funciones[$i]."</td><td>".$anios[$i]."</td</tr>";   
            }
           }
           ?>

       </table>
           <td> <?php printf($row["Nombre"]); ?></td>
           <td> <?php printf($row["Apellidopat"]); ?></td>
           <td> <?php printf($row["Apellidomat"]); ?></td>
           </tr>
<?php   }
}
?>
 <br> 
</table>
</div>
</article>
</section>
</body>
</html>