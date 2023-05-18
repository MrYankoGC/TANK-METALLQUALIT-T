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

<li><a href="../../../index.php">crear cuenta</a></li>



</ul>
</nav>      
        
        
      
        <div class = "rectangulo4">
            <br> 
              <br> 
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
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Verificar si el correo electrónico y la contraseña coinciden en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo_electronico = '$correo' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Las credenciales son válidas, redireccionar al archivo inicio.php
        header("Location: inicio.php");
        exit();
    } else {
        // Las credenciales son inválidas
        echo "Credenciales de inicio de sesión inválidas.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

    <h2> Inicio de Sesión</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>

        
        <br><!-- comment -->
        <br>
       
        <br>
 
     
        </div>
        
    </body>

    </html>