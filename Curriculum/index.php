
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/menu.css">
<title>VitaTec</title>
</head>
<body >


    
 <header>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#not">Noticias</a></li>
                <li><a href="#cont">Contacto</a></li>
                <li><a href="#acerca">Acerca de.</a></li>
              </ul>

        </header>

<div class="contenedor" id="contenedor">
            <div class="form-contenedor sing-up">

                <form action="register_process.php" target="" method="POST">

                    <h1>Registrar usuario</h1>

                    <input type="text" placeholder="Nombre" name="Nombre" id="Nombre" required>
                    <input type="text" placeholder="Apellido Paterno"name="Apellidopat" id="Apellidopat" required>
                    <input type="text" placeholder="Apellido Materno"name="Apellidomat" id="Apellidomat" required>
                    <input type="email" placeholder="example@orizaba.tecnm.mx" name="Email" id="Email" required>
                    <input type="text" placeholder="Numero de control" name="NumControl" id="NumControl" pattern="[0-9]{8}" required>
                    <input type="password" placeholder="Contraseña" name="Password" id="Password" required>
                    <button onclick="comprobar();"> Registrarse</button></form>

            </div>

            <div class="form-contenedor sing-in">

            <form action="login_process.php" target="" method="POST">
                    <h1>Iniciar Sesion</h1>
                    <input type="text" placeholder="Numero de control" name="NumControl" id="NumControl">
                    <input type="password" placeholder="Contraseña" name="Password" id="Password">
                    <button> Iniciar sesion</button>
                </form>

            </div>

            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Bienvenido </h1>
                        <p>Ingresa tus datos personales para entrar al sitio</p>

                        <button class="hidden" id="login">
                            Iniciar sesion

                        </button>

                    </div>

                    <div class="toggle-panel toggle-right">
                        <h1>Hola, eres nuevo? </h1>
                        <p>Registra tus datos personales para entrar al sitio</p>

                        <button class="hidden" id="register">
                            Registrarse

                        </button>

                    </div>
                </div>

            </div>
        </div>
        
        
       <script src="script/script.js"></script>     
</body>
</html>
