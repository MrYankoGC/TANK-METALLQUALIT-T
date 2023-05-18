<html>
<head>
    <link rel="stylesheet" type="text/css" href="rm/media/css/estilo.css"> 
    <link rel="shortcut icon" type="image/x-icon" href="rm/img/tank.ico" />
    <title> Menu TM</title>
    <meta charset="utf-8">
    <style>
        body {
	
  background-image: url('rm/img/metal.jpg');
}
    </style>
</head>
<body>
     
          <nav>
    
        <i class="fas fa-bars"></i>
     
      <label class="logo">METALLQUALITÄT</label>
      <ul>


<li><a href="rm/media/php/log.php">ya tengo una cuenta</a></li>



</ul>
</nav>      
    
  <div class="rectangulo">
<h1>Creador de usuarios</h1>
<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_tanques";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $admin = isset($_POST["admin"]) ? "yes" : "no";

    // Verificar si el correo electrónico ya existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo_electronico = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El correo electrónico ya está en uso
        echo "Correo electrónico ya utilizado.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, correo_electronico, contrasena, admin)
                VALUES ('$nombre', '$correo', '$contrasena', '$admin')";

        if ($conn->query($sql) === TRUE) {
            // Redireccionar al archivo inicio.php
            header("Location: rm/media/php/inicio.php");
            exit();
        } else {
            echo "Error al guardar el usuario: " . $conn->error;
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

    <h2>Formulario de Registro de Usuario</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>

        <label for="admin">Admin:</label>
        <input type="checkbox" name="admin" value="yes"><br>

        <input type="submit" value="Guardar Usuario">
    </form>




  


  <br><br><br>





  </div>
   
  
</body>
</html>