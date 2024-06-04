<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Ingresar datos</title>
</head>
<body>
    <h2>Iniciar Sesi&oacute;n</h2>
    <form action="RegistroF.php" method="POST" >
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="puesto">Nombre de Usuario:</label>
        <input type="text" id="puesto" name="puesto" required><br><br>

        <label for="IMAGEN">Ingresa tu fotografia:</label>
        <input type="file" name="IMAGEN" required><br><br>

        <label for="correo">Ingresa tu correo:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="notel">Ingresa tu numero de telefono a 10 digitos:</label>
        <input type="text" id="notel" name="notel" pattern="[0-9]{10}" required><br><br>

        <label for="instagram">Instagram</label>
        <input type="text" name="instagram" required><br><br>

         <label for="facebook">facebook</label>
        <input type="text" name="facebook" required><br><br>

 <label for="linkedin">linkedin</label>
        <input type="text" name="linkedin" required><br><br>

 <label for="habilidades">habilidades:</label>
        <input type="text" name="habilidades" required><br><br>






        
        


        
        <button type="submit">Iniciar Sesi&oacute;n</button>
    </form>
</body>
</html>