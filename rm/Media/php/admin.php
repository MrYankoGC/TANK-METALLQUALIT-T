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
        <H1>Apartado de administrador</H1>
        <div class = "rectangulo4">
       
    <?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tienda_tanques");

// Verificar la conexión
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Variables para almacenar los datos del formulario
$nombre_usuario = "";
$password_actual = "";
$nueva_password = "";
$mensaje = "";

// Procesar los datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $nombre_usuario = $_POST["nombre_usuario"];
  $password_actual = $_POST["password_actual"];
  $nueva_password = $_POST["nueva_password"];

  // Verificar si el usuario existe en la base de datos
  $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre_usuario' AND contrasena = '$password_actual'";
  $result = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($result) > 0) {
    // Actualizar la contraseña del usuario
    $sql = "UPDATE usuarios SET contrasena = '$nueva_password' WHERE nombre = '$nombre_usuario'";
    if (mysqli_query($conexion, $sql)) {
      $mensaje = "La contraseña se ha actualizado correctamente.";
    } else {
      $mensaje = "Error al actualizar la contraseña: " . mysqli_error($conexion);
    }
  } else {
    $mensaje = "Usuario o contraseña actual incorrectos.";
  }
}
?>

<!-- HTML del formulario -->
<h1>Modificar contraseña de usuario</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="nombre_usuario">Nombre de usuario:</label>
  <br>
  <input type="text" id="nombre_usuario" name="nombre_usuario" required><br>
  <br>
  <label for="password_actual">Contraseña actual:</label>
  <br>
  <input type="password" id="password_actual" name="password_actual" required><br>
  <br>
  <label for="nueva_password">Nueva contraseña:</label>
  <br>
  <input type="password" id="nueva_password" name="nueva_password" required><br>
  <br>
  <button type="submit">Modificar contraseña</button>
  <br>
  <?php echo $mensaje; ?>
</form>

        
        
        <br><!-- comment -->
        <br>
       
        <br>
        </div>
        <br>
         </div>
   <div class = "rectangulo4">
       <h2>verificar tanques </h2>
       <?php
		// Conexión a la base de datos
		$conexion = mysqli_connect("localhost", "root", "", "tienda_tanques");

		// Verificar la conexión
		if (!$conexion) {
			die("Error al conectar a la base de datos: " . mysqli_connect_error());
		}

		// Obtener los nombres de los tanques
		$sql = "SELECT nombre FROM tanques";
		$resultado = mysqli_query($conexion, $sql);

		// Verificar si hay resultados
		if (mysqli_num_rows($resultado) > 0) {
			// Crear un menú desplegable con los nombres de los tanques
			echo "<form method='POST'>";
			echo "<label for='tanque'>Selecciona un tanque:</label>";
			echo "<select id='tanque' name='tanque' onchange='this.form.submit()'>";
			echo "<option value=''>-- Selecciona un tanque --</option>";
			while ($fila = mysqli_fetch_assoc($resultado)) {
				echo "<option value='" . $fila["nombre"] . "'";
				if ($_POST["tanque"] == $fila["nombre"]) {
					echo " selected";
				}
				echo ">" . $fila["nombre"] . "</option>";
			}
			echo "</select>";
			echo "</form>";

			// Obtener la información del tanque seleccionado
			if ($_POST["tanque"]) {
				$sql = "SELECT * FROM tanques WHERE nombre='" . $_POST["tanque"] . "'";
				$resultado = mysqli_query($conexion, $sql);
				$fila = mysqli_fetch_assoc($resultado);

				// Mostrar la información del tanque
				echo "<h1>" . $fila["nombre"] . "</h1>";
				echo "<p><strong>Tipo:</strong> " . $fila["tipo"] . "</p>";
				echo "<p><strong>Stock:</strong> " . $fila["stock"] . "</p>";
				echo "<p><strong>Descripción:</strong> " . $fila["descripcion"] . "</p>";
				echo "<p><strong>Precio unidad:</strong> $" . $fila["precio_unidad"] . "</p>";
			}
		} else {
			echo "No se encontraron tanques.";
		}

		// Cerrar la conexión a la base de datos
		mysqli_close($conexion);
	?>
       
       <br>
        <br>
   </div>
       
        <br>
        <br><br>
         <div class = "rectangulo4">
        <?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tienda_tanques");

// Verificar la conexión
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$nombre = "";
$nuevo_stock = "";

// Procesar los datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $nombre = $_POST["nombre"];
  $nuevo_stock = $_POST["nuevo_stock"];

  // Actualizar el stock del tanque en la tabla
  $sql = "UPDATE tanques SET stock = '$nuevo_stock' WHERE nombre = '$nombre'";

  if (mysqli_query($conexion, $sql)) {
    echo "El stock del tanque $nombre se ha actualizado correctamente.";
  } else {
    echo "Error al actualizar el stock del tanque: " . mysqli_error($conexion);
  }
}
?>
        

<!-- HTML del formulario -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="nombre">Nombre del tanque:</label>
  <br>
  <input type="text" id="nombre" name="nombre" required><br>
  <br>
  <label for="nuevo_stock">Nuevo stock:</label>
  <br>
  <input type="number" id="nuevo_stock" name="nuevo_stock" min="0" required><br>
  <br>
  <button type="submit">Actualizar stock</button>
  <br><br><br>
</form>
<br>
       
 </div>
        <br>
        <br>
  
        <br>
          <br>
  </div>
          <br>
<!-- HTML del formulario -->
 <div class = "rectangulo4">
     <br>
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tienda_tanques");

// Verificar la conexión
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$nombre = "";
$cambiarAdmin = "";

// Procesar los datos del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $nombre = $_POST["nombre"];
  $cambiarAdmin = $_POST["cambiarAdmin"];

  // Verificar si el nombre existe en la tabla de usuarios
  $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
  $resultado = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($resultado) > 0) {
    // El nombre existe en la tabla de usuarios, obtener el valor actual de la columna admin
    $row = mysqli_fetch_assoc($resultado);
    $adminActual = $row["admin"];

    // Verificar si el valor actual de admin es diferente al seleccionado en el formulario
    if ($adminActual !== $cambiarAdmin) {
      // Actualizar la columna admin
      $sqlUpdate = "UPDATE usuarios SET admin = '$cambiarAdmin' WHERE nombre = '$nombre'";

      if (mysqli_query($conexion, $sqlUpdate)) {
        echo "El valor de la columna 'admin' para el usuario '$nombre' se ha actualizado correctamente.";
      } else {
        echo "Error al actualizar la columna 'admin': " . mysqli_error($conexion);
      }
    } else {
      echo "El valor de la columna 'admin' para el usuario '$nombre' ya es '$adminActual'. No se realizaron cambios.";
    }
  } else {
    echo "No se encontró ningún usuario con el nombre '$nombre'.";
  }
}
?>

<!-- HTML del formulario -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="nombre">Nombre:</label>
  <br>
  <input type="text" id="nombre" name="nombre" required><br>
  <br>
  <label for="cambiarAdmin">Cambiar admin:</label>
  <br>
  <input type="radio" id="cambiarAdminYes" name="cambiarAdmin" value="yes">
  <label for="cambiarAdminYes">Yes</label>
  <input type="radio" id="cambiarAdminNo" name="cambiarAdmin" value="no">
  <label for="cambiarAdminNo">No</label>
  <br><br>
  <button type="submit">Actualizar</button>
</form>

     <br>
 </div>
<br>
  <br>
   <div class = "rectangulo4">
  <?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tienda_tanques");

// Verificar la conexión
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener todos los usuarios de la tabla
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombreSeleccionado = $_POST["nombreSeleccionado"];

  // Obtener los datos del usuario seleccionado
  $sqlUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombreSeleccionado'";
  $resultadoUsuario = mysqli_query($conexion, $sqlUsuario);

  if (mysqli_num_rows($resultadoUsuario) > 0) {
    $usuario = mysqli_fetch_assoc($resultadoUsuario);
    $nombre = $usuario["nombre"];
    $correo = $usuario["correo_electronico"];
    $contrasena = $usuario["contrasena"];
    $admin = $usuario["admin"];
  }
}
?>

<!-- HTML del formulario -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="nombreSeleccionado">Selecciona un usuario:</label>
  <br>
  <select id="nombreSeleccionado" name="nombreSeleccionado">
    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
      <option value="<?php echo $fila['nombre']; ?>"><?php echo $fila['nombre']; ?></option>
    <?php } ?>
  </select>
  <br><br>
  <button type="submit">Mostrar detalles</button>
</form>

<br>

<!-- Mostrar los detalles del usuario seleccionado -->
<?php if (isset($nombre) && isset($correo) && isset($contrasena) && isset($admin)) { ?>
  <h2>Detalles del usuario</h2>
  <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
  <p><strong>Correo electrónico:</strong> <?php echo $correo; ?></p>
  <p><strong>Contraseña:</strong> <?php echo $contrasena; ?></p>
  <p><strong>Admin:</strong> <?php echo $admin; ?></p>
<?php } ?>
  <br>
  <br>
  
   </div>
  
  <div class = "rectangulo4">
      <form method="POST" action="">
        <input type="submit" name="ver_comentarios" value="Ver Comentarios">
    </form>

    <?php
    // Procesar el formulario para ver la tabla de comentarios

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ver_comentarios'])) {

        // Conexión a la base de datos
        $conexion = mysqli_connect('localhost', 'root', '', 'tienda_tanques');

        // Verificar la conexión
        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        // Consulta para obtener todos los comentarios
        $consulta = "SELECT * FROM comentarios";
        $resultados = mysqli_query($conexion, $consulta);

        // Mostrar la tabla de comentarios
        echo "<h3>Tabla de Comentarios:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Usuario</th><th>Comentario</th><th>Fecha de Creación</th><th>Acción</th></tr>";
        while ($fila = mysqli_fetch_assoc($resultados)) {
            echo "<tr>";
            echo "<td>{$fila['id']}</td>";
            echo "<td>{$fila['usuario']}</td>";
            echo "<td>{$fila['comentario']}</td>";
            echo "<td>{$fila['fecha_creacion']}</td>";
            echo "<td><form method='POST' action=''><input type='hidden' name='id_eliminar' value='{$fila['id']}'><input type='submit' name='eliminar' value='Eliminar'></form></td>";
            echo "</tr>";
        }
        echo "</table>";

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }

    // Procesar el formulario para eliminar comentarios

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_eliminar']) && isset($_POST['eliminar'])) {
        $id_eliminar = $_POST['id_eliminar'];

        // Conexión a la base de datos
        $conexion = mysqli_connect('localhost', 'root', '', 'tienda_tanques');

        // Verificar la conexión
        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        // Eliminar el comentario de la base de datos
        $eliminar = "DELETE FROM comentarios WHERE id = $id_eliminar";

        if (mysqli_query($conexion, $eliminar)) {
            echo "<p>Comentario eliminado exitosamente.</p>";
        } else {
            echo "Error al eliminar el comentario: " . mysqli_error($conexion);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }
    ?>
  </div>
  <br>
  <br>
  <br>
    </body>

    </html>