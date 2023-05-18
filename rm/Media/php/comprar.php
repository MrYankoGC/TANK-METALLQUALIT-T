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
     
      <label class="logo">METALLQUALITÄT</label>
      <ul>


<li><a href="tmshop.php">volver</a></li>



</ul>
</nav>      
        <div class = "rectangulo10">
        <H1>Comprar</H1>
      

 <div class="contenedor">
  <div class="elemento">
      <h2>rellene los campos</h2>

      
      
      <?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tienda_tanques");

// Verificar la conexión
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$nombre = "";
$tanque = "";
$cantidad = "";
$tarjeta = "";

// Procesar los datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $nombre = $_POST["nombre"];
  $tanque = $_POST["tanque"];
  $cantidad = $_POST["cantidad"];
  $tarjeta = $_POST["tarjeta"];

  // Verificar si el tanque existe en la tabla 'tanques'
  $sql = "SELECT * FROM tanques WHERE nombre='$tanque'";
  $result = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($result) == 0) {
    echo "Error: El tanque no existe en la base de datos.";
  } else {
    // Insertar los datos en la tabla 'detalles_pedidos'
    $sql = "INSERT INTO detalles_pedidos (nombre, tanque, cantidad, tarjeta)
            VALUES ('$nombre', '$tanque', '$cantidad', '$tarjeta')";

    if (mysqli_query($conexion, $sql)) {
      echo "Pedido registrado correctamente.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
  }
}
?>

<!-- HTML del formulario -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="nombre">Nombre:</label>
  <br>
  <input type="text" id="nombre" name="nombre" required><br>
  <br>
  <label for="tanque">Tanque:</label>
  <br>
  <input type="text" id="tanque" name="tanque" required><br>
  <br>
  <label for="cantidad">Cantidad:</label>
  <br>
  <input type="number" id="cantidad" name="cantidad" required><br>
  <br>
  <label for="tarjeta">Tarjeta:</label>
  <br>
  <input type="text" id="tarjeta" name="tarjeta" required><br>
  <br>
  <button type="submit">Registrar pedido</button>
</form>

      
  </div>
</div>
        </div>
    </html>
    </body>