    <!DOCTYPE html>
    <html lang="es-ES">

    <head>
         <link rel="shortcut icon" type="image/x-icon" href="rm/img/tank.ico" />    
        <link rel="stylesheet" type="text/css" href="rm/media/css/estilo.css"> 
    
            <title> Lista TM </title>
    <style>
        body {
  background-image: url('rm/img/metal.jpg');
}
    </style>
    </head>

    <body>
<nav>
    
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">METALLQUALITÄT</label>
      <ul>
<li><a href="index.php">login</a></li>
<li><a href="index.php">crear cuenta</a></li>
<li><a href="#">actividad</a></li>
<li><a href="rm/media/php/inicio.php">inicio</a></li>

</ul>
</nav>

   

</div>

    </div>
    <div class = "rectangulo4">
        
    <h1>Stock</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_tanques";

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <label for="tipo">Tipo de Tanque:</label>
    <select id="tipo" name="tipo">
        <?php
        // Consulta para obtener los tipos de tanques
        $sql_tipos = "SELECT DISTINCT tipo FROM tanques";
        $result_tipos = mysqli_query($conn, $sql_tipos);

        // Mostrar los tipos de tanques en la casilla desplegable
        while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
            $tipo = $row_tipo["tipo"];
            echo "<option value='$tipo'>$tipo</option>";
        }
        ?>
    </select>
    <input type="submit" value="Buscar">
</form>

<?php
// Verificación de solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];

    // Consulta para obtener información de los tanques del tipo seleccionado
    $sql_tanques = "SELECT id, nombre, tipo, stock, descripcion, precio_unidad FROM tanques WHERE tipo = '$tipo'";
    $result_tanques = mysqli_query($conn, $sql_tanques);

    // Si se encontraron resultados
    if (mysqli_num_rows($result_tanques) > 0) {
        // Mostrar información de los tanques
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Tipo</th><th>Stock</th><th>Descripción</th><th>Precio por unidad</th></tr>";
        while ($row_tanque = mysqli_fetch_assoc($result_tanques)) {
            $id_tanque = $row_tanque["id"];
            $nombre_tanque = $row_tanque["nombre"];
            $tipo_tanque = $row_tanque["tipo"];
            $stock_tanque = $row_tanque["stock"];
            $descripcion_tanque = $row_tanque["descripcion"];
            $precio_tanque = $row_tanque["precio_unidad"];
            echo "<tr>";
            echo "<td><a href='set1.php?id=$id_tanque'>$nombre_tanque</a></td>";
            echo "<td>$tipo_tanque</td>";
            echo "<td>$stock_tanque</td>";
            echo "<td>$descripcion_tanque</td>";
            echo "<td>$precio_tanque</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

       </div>

 <div class = "rectangulo7">
     <h1>Municion</h1>


     <form action="set1.php" method="post">
    <label for="nombre">Buscar por nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <input type="submit" value="Buscar">
</form>
<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "tienda_tanques";

$conn = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];

   
    $sql = "SELECT tipo, descripcion, cantidad, precio FROM municiones WHERE tipo LIKE '%$nombre%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo  "Tipo: " . $row["tipo"]. " - Descripción: " . $row["descripcion"]. " - Cantidad: " . $row["cantidad"]. " - Precio: " . $row["precio"]. "<br>";
        }
    } else {
        echo "0 resultados";
    }
}

$conn->close();
?>



 </div>
    <br>
    <br>
    </body>

    </html>