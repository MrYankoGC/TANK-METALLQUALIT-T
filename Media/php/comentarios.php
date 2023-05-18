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
        
       
        <div class = "rectangulo4">
        <h1>Apartado de Comentarios</h1>

    <!-- Formulario para agregar un comentario -->
    <form method="POST" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="comentario">Comentario:</label><br>
        <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Agregar Comentario">
    </form>

    <?php
    // Procesar el formulario y guardar los comentarios en la base de datos

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $comentario = $_POST['comentario'];

        // Conexión a la base de datos
        $conexion = mysqli_connect('localhost', 'root', '', 'tienda_tanques');

        // Verificar la conexión
        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        // Insertar el comentario en la base de datos
        $insertar = "INSERT INTO comentarios (usuario, comentario) VALUES ('$usuario', '$comentario')";

        if (mysqli_query($conexion, $insertar)) {
            echo "<p>Comentario agregado exitosamente.</p>";
        } else {
            echo "Error al agregar el comentario: " . mysqli_error($conexion);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }

    // Mostrar los comentarios existentes
    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'tienda_tanques');

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Consulta para obtener los comentarios
    $consulta = "SELECT usuario, comentario FROM comentarios";
    $resultados = mysqli_query($conexion, $consulta);

    // Mostrar los comentarios
    while ($fila = mysqli_fetch_assoc($resultados)) {
        echo "<p><strong>{$fila['usuario']}:</strong> {$fila['comentario']}</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    ?>
        
        <br><!-- comment -->
        <br>
       
        <br>
 
     
 
    </body>

    </html>