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
   
   
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $nombreCliente = $_POST['nombre'];
        $tanque = $_POST['tanque'];
        $cantidad = $_POST['cantidad'];
        $tarjeta = $_POST['tarjeta'];
        
        // Conexión a la base de datos
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'tienda_tanques';
        
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Verificar la conexión
        if ($conn->connect_error) {
            die('Error en la conexión a la base de datos: ' . $conn->connect_error);
        }
        
        // Guardar los detalles del pedido en la tabla "detalles_pedidos"
        $sql = "INSERT INTO detalles_pedidos (nombre, tanque, cantidad, tarjeta)
                VALUES ('$nombreCliente', '$tanque', $cantidad, '$tarjeta')";
        
        if ($conn->query($sql) === TRUE) {
            echo '¡Pedido realizado con éxito!';
        } else {
            echo 'Error al realizar el pedido: ' . $conn->error;
        }
        
        // Cerrar la conexión a la base de datos
        $conn->close();
    }
    ?>
    
    <form method="POST" action="">
        <label for="nombre">Nombre del cliente:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="tanque">municion</label>
        <input type="text" id="tanque" name="tanque" required><br><br>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br><br>
        
        <label for="tarjeta">Detalles de la tarjeta de crédito:</label>
        <input type="text" id="tarjeta" name="tarjeta" required><br><br>
        
        <input type="submit" value="Realizar Pedido">
    </form>

      
  </div>
</div>
        </div>
    </html>
    </body>