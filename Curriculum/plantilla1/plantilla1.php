
<?php 
session_start();
$username=$_SESSION['correo'];
$pasword=$_SESSION['pasword'];
$usuario=$_SESSION['usuario'];

header('Content-Type: text/html; charset=UTF-8');
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
<html lang="es" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
    </style>
   
</head>
<?php 

if(isset($_GET['var'])&&($_GET['var']!='')){
 $colorFDF=($_GET['var']);
if(ctype_xdigit($colorFDF)){
        echo '<style type="text/css">header{background: #'.$colorFDF.';}</style>';
}else{ echo '<style type="text/css">header{background: '.$colorFDF.';}</style>';
}}
//-------------------------------------------
if(isset($_GET['var2'])){
    $colorI=($_GET['var2']);
if(ctype_xdigit($colorI)){
        echo '<style type="text/css">body,#luisito20, {background: #'.$colorI.';}</style>';
}else{ echo '<style type="text/css">body,#luisito20{background: '.$colorI.';}</style>';
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
<div id=luisito20 class="horizontal-container" style="margin-top:0px; height: auto; width: auto+100px;">
<body >
<div class="item" style="height:auto+100px">
    <header>
        <img id="imagen" src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>" width="150" height="150">
        <h2><?php echo $row['Nombre'].' '.$row['Apellidopat'].' '.$row['Apellidomat'];?></h2>
        <p><?php echo $row['puesto'];?></p>
        <br>
        <br>
        <h3>Sobre mí</h3>
        <p><div style="word-wrap: break-word ;"><?php echo $row['sobremi'];?></div></p>
        <br>
        <br>
        <div id="contacto">
            <h3>Contacto</h3>
            <ul class="contacto">
                <li><a href=" "> <img src="gmail.png" width="15" height="15"> &nbsp; <?php echo $row['correo'];?></a></li>
                <li><a href=" "><img src="telefono.jpg" width="15" height="15"> &nbsp; <?php echo $row['NoTel'];?></a></li>
                <li><a href=" "><img src="telefono.jpg" width="15" height="15"> &nbsp; <?php echo $row['noTel2'];?></a></li>
                <center>
                    <a href="<?php echo $row['instagram'];?>"><img class="social" src="instagram.png" width="40" height="40"></a>&nbsp;
                    <a href="<?php echo $row['facebook'];?>"><img class="social" src="facebook.png" width="40" height="40"></a>
                </center>
            </ul>
        </div>
        <br><br>
        <section class="habilidades">
            <h2>Habilidades</h2>
            <ul id="habilidades">
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
        </section>

    </header>
</div>
<!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<div class="item" style="margin-top:-875px ;margin-left:300px;position: relative; ;" id=abajo>
    <main>
        <section class="experiencia">
            <div class="header-estudios">
                <img src="empleo.png" width="100" height="100">
                <h2>Experiencia laboral</h2>
            </div>
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
                    <h3><?php echo strtoupper($empresas[$i]);?></h3>
                    <h4><?php echo $cargos[$i];?></h4>
                    <span class="fecha"><?php echo $anios[$i];?></span>
                    <p><?php echo $funciones[$i];?></p>
                </li>

               <?php 
           }
           }
           ?>
            </ul>
        </section>

        <section class="estudios">
            <div class="header-estudios">
                <img src="estudio.png" width="100" height="100">
                <h2>Estudios</h2>
            </div>
            <ul>
                <li>
                    <h3><?php echo $row['tutulo1'];?></h3>
                    <h4><?php echo $row['NombreUni1'];?></h4>
                    <span class="fecha"><?php echo $row['aniosUni1'];?></span>
                    <p><?php echo $row['descrip1'];?></p>
                </li>
                
                    <?php
                    if(isset($row['tutulo2'])){echo "<li><h3>".$row['tutulo2']."</h3>";?> 
                    <h4><?php echo $row['NombreUni2'];?></h4>
                    <span class="fecha"><?php echo $row['aniosUni2'];?></span>
                    <p><?php echo $row['descrip2']."</li>";?><?php }?></p>
                
            </ul>
        </section>
    </main>
</div>


  </body></div>
  <button onclick="generarPDF();" style="height: 100px; width: 100px; margin-left:500px">Generar PDF</button>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script>
    function generarPDF() {
    
        // Usa html2canvas para capturar el div como una imagen
        html2canvas(document.getElementById('luisito20')).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const { jsPDF } = window.jspdf;
            
            // Obtén el tamaño del canvas
            const imgWidth = canvas.width;
            const imgHeight = canvas.height;
            
            // Define las dimensiones del PDF (en este caso, A4)
            const pdfWidth = 250; // Ancho en mm para A4
            const pdfHeight = 280; // Alto en mm para A4
            
            // Crea un nuevo PDF en orientación vertical
            const doc = new jsPDF('p', 'mm', 'a4');

            // Calcula las dimensiones de la imagen para que se ajuste al PDF
            const ratio = Math.min(pdfWidth / imgWidth, pdfHeight / imgHeight);
            const width = imgWidth * ratio;
            const height = imgHeight * ratio;

            // Agrega la imagen al PDF
            doc.addImage(imgData, 'PNG', 2.5, 10, width, height);
            // Descarga el PDF
            doc.save('contenido.pdf');
        });
    }
  </script>
 </html>