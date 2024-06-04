<?php 
session_start();
$username=$_SESSION['username'];
$pasword=$_SESSION['password'];
$usuario=$_SESSION['usuario'];
echo "Usuario: ".$username."<br>";
echo "contra: ".$pasword."<br>";
echo "usuario: ".$usuario;

$mysql = new mysqli("localhost", "root", "", "agenda");

if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}
$Query = "SELECT * FROM usuarios WHERE Email ='".$username."' AND Password='".$pasword."';";
$Result = $mysql->query($Query);

if ($Result->num_rows > 0) {
    $row = $Result->fetch_assoc();
    }
$mysql->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>

<body>

    <center>
        <h1>Mi CV</h1>
    </center>
    Lea con atención e ingrese los datos correspondientes
    <br><br><br>

    <form class="form" action="RegistroF.php" method="POST" target="_blank" enctype="multipart/form-data">
        <!-- Formulario datos personales -->
        <div class="formulario" id="formulario1">
            <legend>Datos personales</legend>
            <div class="contenedor">
                <div class="row">
                    <div class="col-25">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nombre" name="nombre" size="40" placeholder="Ingrese su nombre"
                        value="<?php  echo $row['Nombre'];?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="paterno">Apellido Paterno</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="paterno" name="apellidopat" size="40"
                            placeholder="Ingrese su apellido paterno" 
                            value="<?php  echo $row['Apellidopat'];?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="materno">Apellido Materno</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="materno" name="apellidomat" size="40"
                            placeholder="Ingrese su apellido materno" 
                            value="<?php  echo $row['Apellidomat'];?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="titulacion1">Titulación 1</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="titulacion1" name="titulacion1"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="nomUni1">Nombre de la universidad </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nomUni1" name="nomUni1"></input>
                    </div>
                </div>

                <div class="col-25">
                        <label for="añosTit1">Años en los que se estudio la titulación</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="añosTit1" name="añosTit1" placeholder="xxxx-xxxx"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="descTit1">Descripción de la titulación</label>
                    </div>
                    <div class="col-75">
                        <textarea id="descTit1" name="descTit1"
                            placeholder="Explique brevemente en que consiste esta titulación"></textarea>
                    </div>
                </div>


                <div class="row">
                    <div class="col-25">
                        <label for="titulacion2">Titulación 2</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="titulacion2" name="titulacion2"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="nomUni2">Nombre de la universidad </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nomUni2" name="nomUni2"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="añosTit2">Años en los que se estudio la titulación</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="añosTit2" name="añosTit2" placeholder="xxxx-xxxx"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="descTit1">Descripción de la titulación</label>
                    </div>
                    <div class="col-75">
                        <textarea id="descTit2" name="descTit2"
                            placeholder="Explique brevemente en que consiste esta titulación"></textarea>
                    </div>
                </div>



                <div class="row">
                    <div class="col-25">
                        <label for="sobreti">Sobre ti</label>
                    </div>
                    <div class="col-75">
                        <textarea type="text" id="sobreti" name="sobreti" size="40"></textarea>
                    </div>
                </div>

                <br><br>
                <Label for="video">Coloca una fotografia tuya sin ningun tipo de filtro para tu curriculum</Label>
                <p> fotografia.pgn o fotografia.jpg</p>
                <input type="file" name="IMAGEN" id="video" required>
                <br>
                <br>
            </div>
            <button type="button" onclick="mostrarSiguienteFormulario(1)">Siguiente</button>
        </div>

        <!-- Formulario contacto -->
        <div class="formulario" id="formulario2">
            <legend>Información de contacto</legend>
            <div class="contenedor1">
                <div class="row">
                    <div class="col-25">
                        <label for="correo"> Correo electrónico </label>
                    </div>
                    <div class="col-75">
                        <input type="email" name="correo" id="correo" placeholder="tucorreo@dominio.com"
                            validate="false"

                            value="<?php  echo $row['Email'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="telefono">Número de telefono(1)</label>
                    </div>
                    <div class="col-75">
                        <input type="tel" id="notel" name="notel" placeholder="123-456-78-90">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="telefono">Número de telefono(2)</label>
                    </div>
                    <div class="col-75">
                        <input type="tel" id="notel2" name="notel2" placeholder="123-456-78-90">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="facebook">Link de su perfil personal de facebook</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="face" name="face" placeholder="www.facebook...........">
                    </div>
                </div>


                <div class="row">
                    <div class="col-25">
                        <label for="insta">Link de su perfil personal de intagram</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="insta" name="insta" placeholder="www.instagram...........">
                    </div>
                </div>


            </div>
                <br><br>
                <button type="button" onclick="mostrarSiguienteFormulario(2)">Siguiente</button>
        </div>

        <!-- Formulario profesionales -->
        <div class="formulario" id="formulario3">
            <legend>Datos profesionales</legend>
            <div class="contenedor">

                 <div class="row">
                    <div class="col-25">
                        <label for="puestoSoli">¿Puesto a solicitar?</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="puestoSoli" name="puestoSoli" ></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="habilidades">Ingrese un pequeño listado de habilidades laborales con las que  cuente</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="habilidades" name="habilidades"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="tutor">¿Años de experiencia?</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="alosE" name="alosE"
                            placeholder="Ingresa solo los años de experiencia"></input>
                    </div>
                </div>



                A continuacion ingrese los datos de por lo menos 1 experiencia laboral (Maximo 5)

                <div class="row">
                    <p>Ingrese los datos de su experiencia laboral (1)</p>
                    <div class="col-25">
                        <label for="añosL1">Años laborados</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="alosl" name="alosl" placeholder="xxxx-xxxx"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lugar1">Lugar</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lugar1" name="lugar1"
                            placeholder="Nombre de la empresa o establecimiento"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="cargo1">Cargo</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="cargo1" name="cargo1" placeholder="Ingrese el cargo que ejercio"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="funcion">Función</label>
                    </div>
                    <div class="col-75">
                        <textarea id="funcion1" name="funcion1"
                            placeholder="Explique brevemente las actividades que realizaba teniendo ese puesto"></textarea>
                    </div>
                </div>
                <br> <br>







                <div class="row">
                    <p>Ingrese los datos de su experiencia laboral (2)</p>
                    <div class="col-25">
                        <label for="alosl2">Años laborados</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="alosl2" name="alosl2" placeholder="xxxx-xxxx"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lugar2">Lugar</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lugar2" name="lugar2"
                            placeholder="Nombre de la empresa o establecimiento"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="cargo2">Cargo</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="cargo2" name="cargo2" placeholder="Ingrese el cargo que ejercio"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="funcion2">Función</label>
                    </div>
                    <div class="col-75">
                        <textarea id="funcion2" name="funcion2"
                            placeholder="Explique brevemente las actividades que realizaba teniendo ese puesto"></textarea>
                    </div>
                </div>
                <br> <br>







                <div class="row">
                    <p>Ingrese los datos de su experiencia laboral (3)</p>
                    <div class="col-25">
                        <label for="alosl3">Años laborados</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="alosl3" name="alosl3" placeholder="xxxx-xxxx"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lugar3">Lugar</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lugar3" name="lugar3"
                            placeholder="Nombre de la empresa o establecimiento"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="cargo3">Cargo</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="cargo3" name="cargo3" placeholder="Ingrese el cargo que ejercio"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="funcion3">Función</label>
                    </div>
                    <div class="col-75">
                        <textarea id="funcion3" name="funcion3"
                            placeholder="Explique brevemente las actividades que realizaba teniendo ese puesto"></textarea>
                    </div>
                </div>
                <br> <br>







                <div class="row">
                    <p>Ingrese los datos de su experiencia laboral (4)</p>
                    <div class="col-25">
                        <label for="alosl4">Años laborados</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="alosl4" name="alosl4" placeholder="xxxx-xxxx"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lugar4">Lugar</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lugar4" name="lugar4"
                            placeholder="Nombre de la empresa o establecimiento"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="cargo4">Cargo</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="cargo4" name="cargo4" placeholder="Ingrese el cargo que ejercio"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="funcion4">Función</label>
                    </div>
                    <div class="col-75">
                        <textarea id="funcion4" name="funcion4"
                            placeholder="Explique brevemente las actividades que realizaba teniendo ese puesto"></textarea>
                    </div>
                </div>
                <br> <br>







                <div class="row">
                    <p>Ingrese los datos de su experiencia laboral (5)</p>
                    <div class="col-25">
                        <label for="alosl5">Años laborados</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="alosl5" name="alosl5" placeholder="xxxx-xxxx"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lugar5">Lugar</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="lugar5" name="lugar5"
                            placeholder="Nombre de la empresa o establecimiento"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="cargo5">Cargo</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="cargo5" name="cargo5" placeholder="Ingrese el cargo que ejercio"></input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="funcion5">Función</label>
                    </div>
                    <div class="col-75">
                        <textarea id="funcion5" name="funcion5"
                            placeholder="Explique brevemente las actividades que realizaba teniendo ese puesto"></textarea>
                    </div>
                </div>
            </div>
                <br>
                <button type="submit">Enviar Información</button>
        </div>
    </form>

    <script src="script.js"></script>
</body>

</html>
