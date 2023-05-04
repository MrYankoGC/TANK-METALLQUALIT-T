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
    <div class="rectangulo2">
        <h1>TANK METALLQUALITÄT</h1>
    </div>
    <div class="rectangulo">
      
<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_tanques";

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificación de solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $correo = $_POST["correo"];
  $contrasena = $_POST["contrasena"];

  // Consulta para obtener información del usuario
  $sql_usuario = "SELECT * FROM usuarios WHERE correo_electronico = ? AND contrasena = ?";
  $stmt = mysqli_prepare($conn, $sql_usuario);
  mysqli_stmt_bind_param($stmt, "ss", $correo, $contrasena);
  mysqli_stmt_execute($stmt);
  $result_usuario = mysqli_stmt_get_result($stmt);

  // Si el usuario existe en la base de datos
  if (mysqli_num_rows($result_usuario) > 0) {
    // Iniciar sesión y redirigir al usuario a la página set1.php
    session_start();
    $_SESSION["correo"] = $correo;
    header("Location: rm/media/php/inicio.php");
  } else {
    // Si el usuario no existe en la base de datos, mostrar mensaje de error
    echo "Correo electrónico o contraseña incorrectos. Por favor, inténtalo de nuevo.";
  }
}
?>

</head>
<body>
  <h2>Iniciar sesión</h2>
  <form method="POST">
    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="correo" required><br><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br><br>
    <button type="submit">Iniciar sesión</button>
  </form>
    </div>
  <div class="rectangulo">
<h1>Creador de usuarios</h1>
	<form method="POST" action="rm/media/php/inicio.php">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre"><br><br>
		<label for="correo">Correo electrónico:</label>
		<input type="email" id="correo" name="correo"><br><br>
		<label for="contrasena">Contraseña:</label>
		<input type="password" id="contrasena" name="contrasena"><br><br>
		<input type="submit" value="Crear usuario">
	</form>
<?php
// Datos de conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "tienda_tanques";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $database);

// Verificación de la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Recuperación de los datos del formulario
$nombre = $_POST["nombre"];
$correo = $_POST["correo_electronico"];
$contrasena = $_POST["contrasena"];

// Inserción de los datos en la tabla "usuarios"
$sql = "INSERT INTO usuarios (nombre, correo_electronico, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";
if (mysqli_query($conn, $sql)) {
    echo "Usuario creado correctamente.";
} else {
    echo "Error al crear el usuario: " . mysqli_error($conn);
}

// Cierre de la conexión
mysqli_close($conn);
?>



  </div>
   
  
</body>
</html>