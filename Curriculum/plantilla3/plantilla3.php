<?php 
session_start();
$username=$_SESSION['correo'];
$pasword=$_SESSION['pasword'];//$_SESSION['password'];
$usuario=$_SESSION['usuario'];
header('Content-Type: text/html; charset=UTF-8');
ini_set("default_charset", "UTF-8");
mb_internal_encoding("UTF-8");

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum Vitae</title>
    <link rel="stylesheet" href="style.css">
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
        echo '<style type="text/css">section,#contenido {background: #'.$colorI.';}</style>';
}else{ echo '<style type="text/css">section,#contenido{background: '.$colorI.';}</style>';
}
}
//------------------------------------------------
if(isset($_GET['var3'])){
    $colorL=($_GET['var3']);
if(ctype_xdigit($colorL)){
        echo '<style type="text/css">section,#contenido {color: #'.$colorL.';}</style>';
}else{ echo '<style type="text/css">section,#contenido{color: '.$colorL.';}</style>';
}
}

?>

<body id=contenido>
    <div class="container" id=contenido>
        <header>
            <div class="profile-pic">
                <img src="data:imagen/jpg;base64,<?php echo base64_encode($row['foto']);?>">
            </div>
            <div class="header-text">
                <h1><?php echo $row['Nombre'].' '.$row['Apellidopat'].' '.$row['Apellidomat'];?></h1>
                <p><?php echo $row['puesto'];?></p>
                <p><img src="gmail.png" width="10" height="10"><?php echo $row['correo'];?></p>
                <p><img src="telefono.jpg" width="10" height="10"><?php echo $row['NoTel'];?></p>
                <p><img src="telefono.jpg" width="10" height="10"><?php echo $row['noTel2'];?></p>
            </div>
        </header>
        <br><br>
        <section class="personal-info">
            <h2>Sobre mi</h2>
            <p><?php echo $row['sobremi'];?></p>
        </section>
        <br><br>
        <section class="experience">
            <h2>Experiencia Laboral</h2>
                <?php 
            $anios=explode('|', $row['alosl']);
           $empresas=explode('|', $row['lugar']);
           $cargos=explode('|', $row['cargo']);
           $funciones=explode('|', $row['funcion']);
           for ($i=0; $i < count($empresas); $i++) { 
            if($empresas[$i]!='' && $cargos[$i]!='' &&  $funciones[$i]!=''){
            ?>
            <div class="job">

                <h3><?php echo $cargos[$i];?></h3>
                <p><em><?php echo $anios[$i];?></em></p>
                <ul>
                    <li> 
                    <?php echo $funciones[$i];?>
                    </li>
                </ul>
            </div>

               <?php 
           }
           }
           ?>
        </section>
        <br><br>
        <section class="education">
            <h2>Formación</h2>
            <div class="school">
                <h3><?php echo $row['tutulo1'];?></h3>
                <p><em><?php echo $row['NombreUni1'];?></em></p>
                <p><?php echo $row['descrip1'];?></p>
            </div>

            <div class="school">
                <h3><?php if(isset($row['tutulo2'])){echo $row['tutulo2'];?></h3>
                <p><em><?php echo $row['NombreUni2'];?></em></p>
                <p><?php echo $row['descrip2'];}?></p>
            </div>
        </section>
        <br><br>
        <section class="skills">
            <h2>Habilidades</h2>
            <ul class="skills-list">
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
    </div>
</body>
<div><button id=downloadPDF>imprimir</button></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
    document.getElementById('downloadPDF').addEventListener('click', function () {
        // Usa html2canvas para capturar el div como una imagen
        html2canvas(document.getElementById('contenido')).then(canvas => {
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