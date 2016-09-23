

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detalles</title>
</head>
<body>
	<?php 
		$is_ok = true; 
		if (isset($_GET['id_producto'])){
			if (is_numeric($_GET['id_producto'])){
				include_once 'communicate.php';
				include_once 'dats.php';
				$db = new Conexion($HOST,$USER,$PASSWORD,$DB);
				$SQL = 'SELECT * FROM producto WHERE id_producto ='.$_GET['id_producto'].';';
				$datos = $db->query($SQL)->fetch_array(MYSQLI_ASSOC);
				if ($db->afected_rows == 1){
					echo '
						<header><h1>'.$datos['title'].'</h2></header>
						<div>
							<div><img src="../'.$datos['img_src'].'"</div>
							<div>Descripcion: '.$datos['descripcion'].'</div>
							<div>Precio: $'.$datos['precio'].'</div>
							<div>
						</div><a href="../'.$datos['src'].'">Descargar</div>
					';
				}else{
					echo '<h2>No se encontro ningun resultado...</h2>';
				}
			}
		}
	?>
</body>
</html>