<!DOCTYPE html>
<html lang="es-ES">

<head>
     <link rel="shortcut icon" type="image/x-icon" href="rm/img/tank.ico" />    
    <link rel="stylesheet" href="style.css">
	<title> Lista TM </title>
</head>

<body>
   
    <nav>
  <ul>
    <li><a href="index.php">Volver</a></li>
    <li><a href="#">TANK METALLQUALITÄT</a></li>
    <li><a href="#">Login</a></li>
    <li><a href="#">Crear cuenta</a></li>
  </ul>
</nav>
    <br>
    <br>
    <div class="rectangulo5">
<h1>Main Battle Tank lista </h1>
                         <H1    >MBT </H1>
                         <p>ejemplos</p>
    </div>
   

<br>
<br>
<br>
<br>
                    <div class = " texto" >
                     <div class = "rectangulo3">
                         <h1>Main Battle Tank lista </h1>
                         <H1    >MBT </H1>
                         <p>ejemplos</p>
                     <?php
       
  $MBT_TANK = array("leopard 2a6 ","challenger 2"," T-72BM3" ,"T-80BMV");
list($mbt1 , $mbt2 ,$mbt3 ,$mbt4) = $MBT_TANK;
echo "$mbt1 , $mbt2 , $mbt3 , $mbt4 ";

 ?>
                         <br>
                         <h1>IFV</h1>
                          <p>ejemplos</p>
                                           <?php
      
  $IFV_TANK = array("BMP-2m "," M2 Bradley"," Puma" ,"Type 89");
list($ivf1 , $ivf2 ,$ivf3 ,$ivf4) = $IFV_TANK;
echo "$ivf1 , $ivf2 , $ivf3 , $ivf4 ";

 ?>
                         <h1>APC</h1>
                         <p>ejemplos</p>
                                     <?php
       
  $MBT_TANK = array("Boxer","BTR-80","M113" ,"Stryker ");
list($mbt1 , $mbt2 ,$mbt3 ,$mbt4) = $MBT_TANK;
echo "$mbt1 , $mbt2 , $mbt3 , $mbt4 ";

 ?>
                     </div>
                    </div>
<br>

<div class = "rectangulo4">
    <h1>Stock</h1>
   <form action="set1.php" method="post">
		<label for="numero_casillas">Selecciona el número de casillas:</label>
		<select id="numero_casillas" name="numero_casillas">
                        <option value="1">1</option>
                        <option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<br><br>
		<?php
			if(isset($_POST['numero_casillas'])) {
				$numero_casillas = $_POST['numero_casillas'];
				for($i = 1; $i <= $numero_casillas; $i++) {
					echo "<label for='Model$i'>Model $i:</label>";
					echo "<input type='text' id='Model$i' name='Model$i'><br>";
				}
			}
		?>
		<br>
		<input type="submit" value="Enviar">
	</form>
    
    <?php
		if(isset($_POST['numero_casillas'])) {
			$numero_casillas = $_POST['numero_casillas'];
			echo "<p>Se seleccionaron $numero_casillas casillas.</p>";
			for($i = 1; $i <= $numero_casillas; $i++) {
				if(isset($_POST["Model$i"])) {
					$valor_casilla = $_POST["Model$i"];
					echo "<p>Tanque nº  $i en espera $valor_casilla</p>";
				}
			}
		}
	?>
    
   </div>
  <div class="carrito">
  <form action="set1.php" method="post">
    <!-- formulario -->
  </form>
  <div class="contenido-carrito">
    <!-- contenido del carrito -->
  </div>
</div>

</body>

</html>