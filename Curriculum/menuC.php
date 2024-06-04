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
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/menuc.css">
 <script>
    var colorFDF=" ";
    var colorI=" ";
    var colorL=" ";
    
        function changeIframeStyles1(color,color1) { 

            var iframe = document.getElementById('myIframe');
            var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
            var header = iframeDocument.getElementsByTagName('header')[0];
            header.style.backgroundColor=color;
            //iframeDocument.body.style.backgroundColor = color; /* Cambia el color de fondo */
             /* Cambia el color del texto */

            var iframe2 = document.getElementById('myIframe2');
            var iframeDocument2 = iframe2.contentDocument || iframe.contentWindow.document;
             /* Cambia el color de fondo */
            var header = iframeDocument2.getElementsByTagName('header')[0];
            header.style.backgroundColor=color;
            /* Cambia el color del texto */

            var iframe3 = document.getElementById('myIframe3');
            var iframeDocument3 = iframe3.contentDocument || iframe.contentWindow.document;
             /* Cambia el color de fondo */
            var header = iframeDocument3.getElementsByTagName('header')[0];
            header.style.backgroundColor=color;
            colorFDF=color1;
            //-----------------------------------------------------------------------------------------------
            var uno=document.getElementById('uno');
            uno.href='./plantilla1/plantilla1.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            var dos=document.getElementById('dos');
            dos.href='./platilla2/plantilla2.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            var tres=document.getElementById('tres');
            tres.href='./plantilla3/plantilla3.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
    
                    }

         function changeIframeStyles2(color,color1) { 
            var iframe = document.getElementById('myIframe');
            var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
            iframeDocument.body.style.backgroundColor=color;
            //iframeDocument.body.style.ba

            var iframe2 = document.getElementById('myIframe2');
            var iframeDocument2 = iframe2.contentDocument || iframe.contentWindow.document;
             /* Cambia el color de fondo */
            iframeDocument2.body.style.backgroundColor=color;
    
            var iframe3 = document.getElementById('myIframe3');
            var iframeDocument3 = iframe3.contentDocument || iframe.contentWindow.document;
            var section = iframeDocument3.getElementsByTagName('section');
            for (var i = 0; i<section.length; i++) {
                section[i].style.backgroundColor=color;
            }
            var contenido = iframeDocument3.getElementsByTagName('div')[0];
            contenido.style.backgroundColor=color;

             colorI=color1;
             //-----------------------------------------------------------------------------------------------
            var uno=document.getElementById('uno');
            uno.href='../plantilla1/plantilla1.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            var dos=document.getElementById('dos');
            dos.href='./platilla2/plantilla2.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            var tres=document.getElementById('tres');
            tres.href='./plantilla3/plantilla3.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            
        }
        function letraC(color,color1) { 
            var iframe = document.getElementById('myIframe');
            var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
            iframeDocument.body.style.color=color;
            //iframeDocument.body.style.ba

            var iframe2 = document.getElementById('myIframe2');
            var iframeDocument2 = iframe2.contentDocument || iframe.contentWindow.document;
             /* Cambia el color de fondo */
            iframeDocument2.body.style.color=color;
    
            var iframe3 = document.getElementById('myIframe3');
            var iframeDocument3 = iframe3.contentDocument || iframe.contentWindow.document;
            var section = iframeDocument3.getElementsByTagName('section');
            for (var i = 0; i<section.length; i++) {
                section[i].style.color=color;
            }
            var contenido = iframeDocument3.getElementsByTagName('div')[0];
            contenido.style.color=color;

            colorL=color1;
            var uno=document.getElementById('uno');
            uno.href='../plantilla1/plantilla1.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            var dos=document.getElementById('dos');
            dos.href='./platilla2/plantilla2.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            var tres=document.getElementById('tres');
            tres.href='./plantilla3/plantilla3.php?var='+colorFDF+'&var2='+colorI+'&var3='+colorL;
            
        }

    </script>
</head>

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
        <section>

        <a href="visualizar.php" id=tres class="button" ><h1>Presiona aqui para elegir</h1></a></center>
        <h2 style="margin-left:30px">Eliga el color para el fondo de la foto</h2>
     <button style="margin-left:30px; height: 50px;width: 50px; background:black;border-radius:30% " id="myButton" onclick="changeIframeStyles1('black','black');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:white;border-radius:30% " id="myButton" onclick="changeIframeStyles1('white','white');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:blue;border-radius:30% " id="myButton" onclick="changeIframeStyles1('blue','blue');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:grey;border-radius:30% " id="myButton" onclick="changeIframeStyles1('grey','grey');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:red;border-radius:30% " id="myButton" onclick="changeIframeStyles1('red','red');"> </button>

     <button style="margin-left:30px; height: 50px;width: 50px; background:#33a4c9;border-radius:30% " id="myButton" onclick="changeIframeStyles1('#33a4c9','33a4c9');"> </button>

      <button style="margin-left:30px; height: 50px;width: 50px; background:#f18585;border-radius:30% " id="myButton" onclick="changeIframeStyles1('#f18585','f18585');"> </button>

      <button style="margin-left:30px; height: 50px;width: 50px; background:#ddd3d3;border-radius:30% " id="myButton" onclick="changeIframeStyles1('#ddd3d3','ddd3d3');"> </button>


      <h2 style="margin-left:30px">Eliga el color para el fondo de informacion</h2>
     <button style="margin-left:30px; height: 50px;width: 50px; background:black;border-radius:30% " id="myButton" onclick="changeIframeStyles2('black','black');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:white;border-radius:30% " id="myButton" onclick="changeIframeStyles2('white','white');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:blue;border-radius:30% " id="myButton" onclick="changeIframeStyles2('blue','blue');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:grey;border-radius:30% " id="myButton" onclick="changeIframeStyles2('grey','grey');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:red;border-radius:30% " id="myButton" onclick="changeIframeStyles2('red','red');"> </button>

     <button style="margin-left:30px; height: 50px;width: 50px; background:#33a4c9;border-radius:30% " id="myButton" onclick="changeIframeStyles2('#33a4c9','33a4c9');"> </button>

      <button style="margin-left:30px; height: 50px;width: 50px; background:#f18585;border-radius:30% " id="myButton" onclick="changeIframeStyles2('#f18585','f18585');"> </button>

      <button style="margin-left:30px; height: 50px;width: 50px; background:#ddd3d3;border-radius:30% " id="myButton" onclick="changeIframeStyles2('#ddd3d3','ddd3d3');"> </button>


<h2 style="margin-left:30px">Eliga el color de la letra</h2>
     <button style="margin-left:30px; height: 50px;width: 50px; background:black;border-radius:30% " id="myButton" onclick="letraC('black','black');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:white;border-radius:30% " id="myButton" onclick="letraC('white','white');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:blue;border-radius:30% " id="myButton" onclick="letraC('blue','blue');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:grey;border-radius:30% " id="myButton" onclick="letraC('grey','grey');"> </button>
     <button style="margin-left:30px; height: 50px;width: 50px; background:red;border-radius:30% " id="myButton" onclick="letraC('red','red');"> </button>

     <button style="margin-left:30px; height: 50px;width: 50px; background:#33a4c9;border-radius:30% " id="myButton" onclick="letraC('#33a4c9','33a4c9');"> </button>

      <button style="margin-left:30px; height: 50px;width: 50px; background:#f18585;border-radius:30% " id="myButton" onclick="letraC('#f18585','f18585');"> </button>

      <button style="margin-left:30px; height: 50px;width: 50px; background:#ddd3d3;border-radius:30% " id="myButton" onclick="letraC('#ddd3d3','ddd3d3');"> </button>

  <br><br>  <br><br>  
  <div class="horizontal-container ">

<div class="item" >
    
  <iframe src="./plantilla1/plantilla1.html"  width=600 height=1635  id="myIframe">
  </iframe><center><a href="../plantilla1/plantilla1.php?var=''&var2=''&var3=''" id=uno class="button"><h1>Presiona aqui para elegir</h1></a></center>
</div>

<div class="item" style="margin-left: -190px;">
<iframe src="./platilla2/index.html" width=600 height=1635 id="myIframe2">
</iframe><center><a href="./platilla2/plantilla2.php?var=''&var2=''&var3=''" id=dos class="button"><h1>Presiona aqui para elegir</h1></a></center>
</div>


<div class="item" style="margin-left: -190px;">
<iframe src="./plantilla3/plantilla3.html" width=600 height=1635 id="myIframe3">
</iframe><center><a href="./plantilla3/plantilla3.php?var=''&var2=''&var3=''" id=tres class="button" ><h1>Presiona aqui para elegir</h1></a></center>
</div>
</div>
        </section>
</body>
</html>