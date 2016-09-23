<!DOCTYPE html>
<html lang="es">
<head>
	<title>iStore</title>
	<?php include_once 'Php/include.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/iconos.css">
</head>
<body>
	<?php include_once 'Php/header.php' ?>
<link rel="stylesheet" type="text/css" href="css/main.css">
	<section id="galeria" class="container">
		<div class="row " id="galeria">
			<div class="col-xs-0 col-xs-offset-12 col-md-8 col-md-offset-12 col-lg-8 col-lg-offset-2"></div>
		</div>
	</section>

	<section class="main container">
		<div class="row">
			<div class="col-xs-0 col-md-3 col-lg-3 categories" >
				<p style="background: yellow;">Categorias</p>
				<ul >
					<?php 
						include_once 'Php/communicate.php';
						include_once 'Php/dats.php';
						$db = new Conexion($HOST,$USER,$PASSWORD,$DB);
						$tmp = $db->get_categories();
						while ($row = mysqli_fetch_array($tmp)) {
							echo '<li><a >'.$row['name'].'</a></li>';
						}
					?>
				</ul>
			</div>
			<div class="col-xs-12 col-md-9">
					<?php include_once 'Php/products.php'; ?>
			</div>
		</div>
	</section>
	<footer>

	</footer>
</body>
</html>
