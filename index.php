<!DOCTYPE html>
<html>
<head>

        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="image/x-icon" href="rm/img/tank.ico" />
	<title> Menu TM</title>
	<meta charset="utf-8">
        
                  
</head>
<body>
 

    <div class = "rectangulo2">
    <h1>TANK METALLQUALITÄT</h1>
   
    </div>
    <div class = "rectangulo">
         <div class = " texto" >
         </div>
    </div>

    <div class = "rectangulo">
         <div class = " texto" >
             <BR>
    
    <?php

// Definimos las variables de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_tanques";

// Creamos la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos si se ha producido un error en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recogemos los datos del formulario y los validamos
    $nombre = htmlspecialchars($_POST["nombre"]);
    $correo = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
    $contrasena = htmlspecialchars($_POST["contrasena"]);

    // Verificamos si el correo electrónico es válido
    if (!$correo) {
        echo "Correo electrónico inválido";
    } else {

        // Preparamos la consulta SQL para verificar si el usuario ya existe
        $verificar_usuario = "SELECT * FROM usuarios WHERE correo_electronico = '$correo'";
        $consulta_usuario = $conn->query($verificar_usuario);

        // Comprobamos si ya existe un usuario con ese correo electrónico
        if ($consulta_usuario->num_rows > 0) {
            echo "Ya existe una cuenta con ese correo electrónico";
        } else {

            // Preparamos la consulta SQL para insertar los datos del nuevo usuario
            $sql = "INSERT INTO usuarios (nombre, correo_electronico, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";

            // Ejecutamos la consulta SQL
            if ($conn->query($sql) === TRUE) {
                echo "Cuenta creada satisfactoriamente";
            } else {
                echo "Error al crear la cuenta: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Cerramos la conexión a la base de datos
$conn->close();

?>

<h1>Crear cuenta</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre"><br>
    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="correo"><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena"><br>
    <input type="submit" value="Crear cuenta">
</form>
    
     </div>
         </div>
    </div>
        
        
</body>
</html>