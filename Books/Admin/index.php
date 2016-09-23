<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Administrador</title>
	</head>
	<body>
		<h1>Agregar nuevos libros</h1>
		<form action="" method="GET" >
			<input type="text" name="new_categori" placeholder="Neva categoria">
			<input type="button" name="new" value="Agregar">
		</form>
		<hr>
		<form action="add.php" method="GET">
			<h1>Agregar productos</h1>
			<label>Selecciona una categoria</label>
			<select name="categoria">
				<option>--------</option>
				<?php 
					include_once '../Php/communicate.php';
					include_once '../Php/dats.php';
					$db = new Conexion($HOST,$USER,$PASSWORD,$DB);
					$cat = $db->get_categories();
					while ($row = mysqli_fetch_array($cat)) {
						echo '<option><a href="add.php?category=1">'.$row['name'].'</a></option>';
					}
				?>
			</select>
			<input type="submit"  value="Editar">
		</form>
	</body>
</html>