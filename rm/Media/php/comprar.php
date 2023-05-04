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
      <h2>selecciona tu tanque</h2>

      <form method="post" action="guardar_pedido.php">
		<label for="usuario">Nombre de Usuario:</label><br>
		<input type="text" id="usuario" name="usuario"><br>
		<label for="tanque">Nombre del Tanque:</label><br>
		<input type="text" id="tanque" name="tanque"><br>
		<label for="numero">Cantidad:</label><br>
		<input type="number" id="numero" name="numero"><br>
		<label for="tarjeta">Información de la Tarjeta de Crédito:</label><br>
		<input type="text" id="tarjeta" name="tarjeta"><br>
		<label for="cv">CVV:</label><br>
		<input type="text" id="cv" name="cv"><br><br>
		<input type="submit" value="Enviar Pedido">
	</form>
      
      <?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_tanques";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$tanque = $_POST['tanque'];
$numero = $_POST['numero'];

// Insertar los datos en la tabla de pedidos
$sql = "INSERT INTO pedidos (nombreUsuario, tanque, cantidad) VALUES ('$usuario', '$tanque', '$numero')";

if (mysqli_query($conn, $sql)) {
    echo "Pedido realizado con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

      
      
      
      
      
      
      
      
      
      
  </div>
</div>
        </div>
    </html>
    </body>