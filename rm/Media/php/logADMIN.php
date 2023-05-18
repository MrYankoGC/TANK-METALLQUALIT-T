 <!DOCTYPE html>
    <html lang="es-ES">

    <head>
      <link rel="shortcut icon" type="image/x-icon" href="../../img/tank.ico" />    
<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
<script src="../javascript/script.js"></script>



            <title> TM </title>
    <style>
        body {
	
  background-image: url('../../img/metal.jpg');
  
}
    </style>
    </head>

    <body>
        <nav>
       <i class="fas fa-bars"></i>
      </label>
      <label class="logo">METALLQUALITÄT</label>
      <ul>

<li><a href="tmshop.php">volver</a></li>



</ul>
</nav>      
        
        
        <div class = "rectangulo10">
        <H1>solo admin</H1>
        <div class = "rectangulo4">
       
    <?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tienda_tanques");

// Verificar la conexión
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Inicializar variables
$correo_electronico = "";
$contrasena = "";

// Procesar los datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $correo_electronico = $_POST["correo_electronico"];
  $contrasena = $_POST["contrasena"];

  // Consultar la tabla de usuarios para obtener el admin
  $sql = "SELECT admin FROM usuarios WHERE correo_electronico='$correo_electronico' AND contrasena='$contrasena'";
  $result = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($result) == 1) {
    // Si se encontró un usuario con ese correo y contraseña
    $row = mysqli_fetch_assoc($result);
    if ($row["admin"] == "yes") {
      // Si el usuario es admin, redirigir a la siguiente página
      header("Location: admin.php");
      exit();
    } else {
      echo "Lo siento, no eres admin";
    }
  } else {
    echo "Correo electrónico o contraseña incorrectos";
  }
}
?>

<!-- HTML del formulario -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="correo_electronico">Correo electrónico:</label>
  <br>
  <input type="email" id="correo_electronico" name="correo_electronico" required><br>
<br>
  <label for="contrasena">Contraseña:</label>
  <br>
  <input type="password" id="contrasena" name="contrasena" required><br>
<br>
  <button type="submit">Iniciar sesión</button>
  <br><br><br>
</form>

        
        
        <br><!-- comment -->
        <br>
       
        <br>
 
     
 
    </body>

    </html>