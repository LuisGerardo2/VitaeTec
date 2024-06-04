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

?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <body>
 <header>
            <ul>
                <li><a href="Inicio.php"> Inicio</a></li>



<?php
if ($Result->num_rows > 0) {
    $row = $Result->fetch_assoc();
    echo '<li><a href="ActualizarD.php" id="cambiante">Actualiza tus datos</a></li> <li><a href="mostrarDatos.php">Mostrar datos</a></li>';
    }else{echo '<li><a href="formulario2.php" id="cambiante">Registra tus datos</a></li>';}

$mysql->close();
?>
        
                
               
                <li><a href="menuC.php">Hacer curriculum</a></li>
                <li><a href="cerrar.php">Cerrar sesion</a></li>
              </ul>

        </header>
        <center>
        <iframe src="../plantilla1/plantilla1.php"  width=600 height=948  id="myIframe"></iframe></center>
             <button id=downloadPDF>Descragar PDF</button>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
    document.getElementById('downloadPDF').addEventListener('click', function () {
        var iframe = document.getElementById('myIframe');
            var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
        // Usa html2canvas para capturar el div como una imagen
        html2canvas(iframeDocument.getElementById('luisito20')).then(canvas => {
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
            doc.save('<?php echo $usuario;?>.pdf');
        });
    });
</script>

</body>
</html>