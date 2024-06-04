<?php 
session_start();
$username=$_SESSION['correo'];
$pasword=$_SESSION['pasword'];//$_SESSION['password'];
$usuario=$_SESSION['usuario'];
header('Content-Type: text/html; charset=UTF-8');
$mysql = new mysqli("localhost", "root", "", "agenda");

if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}
$Query = "SELECT * FROM datos WHERE usuario ='$usuario';";
$Result = $mysql->query($Query);

if ($Result->num_rows > 0) {
    $row = $Result->fetch_assoc();
    }
$mysql->close();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="boton.css">
    <title>Curriculum vitae</title>
</head>
<?php 

if(isset($_GET['var'])){
 $colorFDF=($_GET['var']);
if(ctype_xdigit($colorFDF)){
        echo '<style type="text/css">header{background: #'.$colorFDF.';}</style>';
}else{ echo '<style type="text/css">header{background: '.$colorFDF.';}</style>';
}}
//-------------------------------------------
if(isset($_GET['var2'])){
    $colorI=($_GET['var2']);
if(ctype_xdigit($colorI)){
        echo '<style type="text/css">body {background: #'.$colorI.';}</style>';
}else{ echo '<style type="text/css">body{background: '.$colorI.';}</style>';
}
}
//------------------------------------------------
if(isset($_GET['var3'])){
    $colorL=($_GET['var3']);
if(ctype_xdigit($colorL)){
        echo '<style type="text/css">body{color: #'.$colorL.';}</style>';
}else{ echo '<style type="text/css">body{color: '.$colorL.';}</style>';
}
}

?>
<body id=container>
    <!-- Header -->
    <header class="banner">
        <div class="container_16">
            <figure>
                <img src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>" width="150" height="150">
            </figure>
            <hgroup>
                <h1 class="fadeInDown"><?php echo $row['Nombre'].' '.$row['Apellidopat'].' '.$row['Apellidomat'];?></h1>
                <h2 class="fadeInUp">Curriculum vitae</h2>
                <img id="cv" class="fadeInUp" src="https://i.imgur.com/GVUBi6u.png" alt="cv">
            </hgroup>
        </div>
    </header>

    <!-- Main section -->
    <section role="main" class="container_16">
        <div class="grid_16">
            <!-- About me -->
            <div class="grid_8 fadeInLeft">
                <img class="icon" src="https://i.imgur.com/8msw88z.png" alt="sobre mí">
                <h3>Sobre mí</h3>
                <p>Mi nombre es <?php echo $row['Nombre']." ".$row['Apellidopat'];?>y estudie <?php echo $row['tutulo1'];?></p>
                <div style="word-wrap: break-word ;"><p><?php echo $row['sobremi'];?></p></div>
                <p>¡Un saludo!</p>
            </div>

            <!-- Habilidades -->
            <div class="grid_8 information fadeInUp">
                <img class="icon" src="https://i.imgur.com/1JUepNb.png" alt="Otros datos">
                <h3>Habilidades</h3>
                <ul class="information">
                    <?php $h=explode(',',$row['habilidades']);
                for ($i=0; $i < count($h); $i++) { 
            if($h[$i]!=''){
            ?>

                <li>
        <?php echo $h[$i];?>
                </li>
               <?php 
           }
           }
           ?>
                </ul>
            </div>
        </div>


        <!-- Experience -->
        <div class="grid_16 experiences appear">
            <img class="icon" src="https://i.imgur.com/gIXe1cf.png" alt="Experiencias">
            <h3>Experiencias</h3>
            <ul>
                <?php 
            $anios=explode('|', $row['alosl']);
           $empresas=explode('|', $row['lugar']);
           $cargos=explode('|', $row['cargo']);
           $funciones=explode('|', $row['funcion']);
           for ($i=0; $i < count($empresas); $i++) { 
            if($empresas[$i]!='' && $cargos[$i]!='' &&  $funciones[$i]!=''){
            ?>

                <li>
                    <h4><strong><?php echo $empresas[$i];?></strong></h4>
                    <span class="site"><?php echo $cargos[$i];?></span><br>
                    <span class="date">Tiempo en el empleo: <?php echo $anios[$i];?></span>
                    <p><?php echo $funciones[$i];?></p>
                </li>
               <?php 
           }
           }
           ?>
            </ul>
        </div>

        <!-- Training -->

        <div class="grid_16">
            <!-- About me -->
            <div class="grid_8 fadeInLeft">
                <img class="icon" src="https://i.imgur.com/mTJKfOj.png" alt="sobre mí">
                <h3>Formación</h3>
                    <ul>
                        <li>
                            <h4><strong><?php echo $row['tutulo1'];?></strong></h4>
                            <span class="site"><?php echo $row['NombreUni1'];?></span>
                            <span class="site"><?php echo $row['descrip1'];?></span>
                            <span class="date"><?php echo $row['aniosUni1'];?></span>
                        </li>
                        
                            <h4><strong><?php
                            if(isset($row['tutulo2'])){echo "<li>".$row['tutulo2'];?></strong></h4>
                            <span class="site"><?php echo $row['NombreUni2'];?></span>
                            <span class="site"><?php echo $row['descrip2'];?></span>
                            <span class="date"><?php echo $row['aniosUni2'];}?></span>
                        </li>
                        
                    </ul>
            </div>

            <!-- Contacto -->
            <div class="grid_8 information fadeInUp">
                <img class="icon" src="https://i.imgur.com/mTJKfOj.png" alt="Otros datos">
                <h3>Contacto</h3>
                <img src="telefono.jpg" width="15" height="15"> &nbsp; <?php echo $row['NoTel'];?>
                <br>
                <br>
                <img src="telefono.jpg" width="15" height="15"> &nbsp; <?php echo $row['noTel2'];?>
                <br>
                <br>
                <img src="gmail.png" width="15" height="15"> &nbsp; <?php echo $row['correo'];?>
                <br>
                <br>
                <a href="<?php echo $row['instagram'];?>"><img class="social" src="instagram.png"></a>
                <a href="<?php echo $row['facebook'];?>"><img class="social" src="facebook.png"></a>
            </div>
        </div>


    </section>
</body>
<div id="boton" ><button id=downloadPDF class="btn primary"><i class="fas fa-exclamation-circle"></i>Imprimir</button></button></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
    document.getElementById('downloadPDF').addEventListener('click', function () {
        // Usa html2canvas para capturar el div como una imagen
        html2canvas(document.getElementById('container')).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const { jsPDF } = window.jspdf;
            
            // Obtén el tamaño del canvas
            const imgWidth = canvas.width;
            const imgHeight = canvas.height;
            
            // Define las dimensiones del PDF (en este caso, A4)
            const pdfWidth = 292; // Ancho en mm para A4
            const pdfHeight = 250; // Alto en mm para A4
            
            // Crea un nuevo PDF en orientación vertical
            const doc = new jsPDF('landscape', 'mm', 'a4');

            // Calcula las dimensiones de la imagen para que se ajuste al PDF
            const ratio = Math.min(pdfWidth / imgWidth, pdfHeight / imgHeight);
            const width = imgWidth * ratio;
            const height = imgHeight * ratio;

            // Agrega la imagen al PDF
            doc.addImage(imgData, 'PNG', 2.5, 10, width, height);
            
            // Descarga el PDF
            doc.save('contenido.pdf');
        });
    });
</script>

</html>