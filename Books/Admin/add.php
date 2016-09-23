<?php  
	/*session_start();
	if (!isset($_SESSION['admin'])){
		session_destroy();
		header('location: index.php');
	}*/

	if (isset($_GET['categoria'])){
		include_once '../Php/communicate.php';
		include_once '../Php/dats.php';
		$ok = false;
		$db = new Conexion($HOST,$USER,$PASSWORD,$DB);
		$categoria = $db->filter_sql($_GET['categoria']);
		$cat = $db->get_categories();
		$tmp = $cat;
		while ($row = mysqli_fetch_array($cat)) {
			if ($categoria == $row['name']){$ok=true;}
		}
		if(!$ok){
			echo '<h1>No existe la categoria "'.$categoria.'" </h1>';
		}else{
			echo '<h2>Agrega los nuevos productos de '.$categoria.'</h2>';
			echo '
				<form action="" method="GET" enctype="multipart/form-data">
					<label>Libro: </label><input type="file" name="file">
					<br>
					<label>Agrega una imagen: </label>
					<input type="file" name="image"><br>
					<input type="text" name="title" placeholder="Titulo"><br>
					<input type="text" name="precio" placeholder="Precio"><br>
					<textarea rows="4" placeholder="Agrega una descripcion" name="descripcion"></textarea><br>
					<input type="submit" value="Cargar" name="append">
				</form>
			';
		}
	}else if(isset($_GET['append'])){
		echo $_GET['file'].'<br>';
		echo $_GET['title'].'<br>';
		echo $_GET['image'].'<br>';
	}
?>