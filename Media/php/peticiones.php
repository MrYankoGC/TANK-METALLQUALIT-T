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

// Variables para almacenar los datos del formulario
$descripcion = "";
$stock = "";
$precio = "";
$nombre_usuario = "";
$nombre_tanque = "";
$mensaje = "";

// Procesar los datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $descripcion = $_POST["descripcion"];
  $stock = $_POST["stock"];
  $precio = $_POST["precio"];
  $nombre_usuario = $_POST["nombre_usuario"];
  $nombre_tanque = $_POST["nombre_tanque"];

  // Insertar los datos en la base de datos
  $sql = "INSERT INTO tanques_pedidos (descripcion, stock, precio, nombre_usuario, nombre_tanque) VALUES ('$descripcion', '$stock', '$precio', '$nombre_usuario', '$nombre_tanque')";
  if (mysqli_query($conexion, $sql)) {
    $mensaje = "Los datos se han guardado correctamente.";
    $descripcion = "";
    $stock = "";
    $precio = "";
    $nombre_usuario = "";
    $nombre_tanque = "";
  } else {
    $mensaje = "Error al guardar los datos: " . mysqli_error($conexion);
  }
}
?>

<!-- HTML del formulario -->
<h1>Realizar un pedido</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="descripcion">Descripción:</label>
  <br>
  <textarea id="descripcion" name="descripcion" required><?php echo $descripcion; ?></textarea><br>
  <br>
  <label for="stock">Stock:</label>
  <br>
  <input type="number" id="stock" name="stock" required value="<?php echo $stock; ?>"><br>
  <br>
  <label for="precio">Precio:</label>
  <br>
  <input type="number" step="0.01" id="precio" name="precio" required value="<?php echo $precio; ?>"><br>
  <br>
  <label for="nombre_usuario">Nombre de usuario:</label>
  <br>
  <input type="text" id="nombre_usuario" name="nombre_usuario" required value="<?php echo $nombre_usuario; ?>"><br>
  <br>
  <label for="nombre_tanque">Nombre del tanque:</label>
  <br>
  <input type="text" id="nombre_tanque" name="nombre_tanque" required value="<?php echo $nombre_tanque; ?>"><br>
  <br>
  <button type="submit">Realizar pedido</button>
  <br>
  <?php echo $mensaje; ?>
</form>

        
        
        <br><!-- comment -->
        <br>
       
        <br>
 
     
 
    </body>

    </html>