<?php 
  session_start();
  if(isset($_SESSION['start'])){
    header('location: ./index.php');
    exit(0);
  }else
    session_destroy(); 
  ?>

<!DOCTYPE html>
<html lang="es">
	<head>
	  <link rel="stylesheet" type="text/css" href="css/iconos.css">
	  <?php include_once("Php/include.php") ?>
	  <link rel="stylesheet" type="text/css" href="css/create_acount.css">
	</head>
	<body>
		<div class="container well">
			<div class="row">
				<div class="col-xs-12"><h2>Crea tu perfil</h2></div>
			</div>	<br><br>
			<form class="form-horizontal" method="POST" action="">
				<div class="form-group ">
					<label class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-4 " >
						<input type="text" class="form-control" name="nombre">
					</div>
				</div>
				<div class="form-group ">
					<label class="control-label col-sm-2">Apellidos</label>
					<div class="col-sm-4 ">
						<input type="text" class="form-control" name="apellidos">
					</div>
				</div>
				<div class="form-group ">
					<br>
					<label class="control-label col-sm-2" id="mail" >Correo electronico</label>
					<div class="input-group col-sm-4 ">
						<span class="input-group-addon">@</span>
						<input type="email" class="form-control" name="email">
					</div>
				</div>
				<div class="form-group ">
					<label class="control-label col-sm-2">Contraseña</label>
					<div class="col-sm-4 ">
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class="form-group ">
					<label class="control-label col-sm-2">Codigo postal</label>
					<div class="col-sm-4 ">
						<input type="text" class="form-control" name="codigo_postal">
					</div>
				</div>
				<div class="form-group ">
					<label class="control-label col-sm-2">Cuidad</label>
					<div class="col-sm-4 ">
						<input type="text" class="form-control" name="ciudad">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12">
					<label class="col-sm-2 control-label" id="tel">Telefono</label>
					<div class="input-group col-sm-4 ">
						<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
						<input type="text" class="form-control" name="telefono">
					</div>
				</div>
					<div class="form-group">
					<label class="control-label col-sm-2">Direccion</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="direccion"><br>
					</div>
				</div>
				</div>
				<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-saved"></span>Registrar</button>
			</form>
		</div>
		
		<?php 
			include_once 'Php/communicate.php';
			include_once 'Php/dats.php';
			if (isset($_POST['password'])) {
				$db = new Conexion($HOST,$USER,$PASSWORD,$DB);
				$entry = array('email' => $_POST['email'],'password' => $_POST['password'],'nombre' => $_POST['nombre'],
					'apellidos' => $_POST['apellidos'],'direccion' => $_POST['direccion'],'telefono' => $_POST['telefono'],
					'codigo_postal' => $_POST['codigo_postal'],'ciudad' => $_POST['ciudad']);
				if ($db->new_entry($entry)){
					header('location:./login.php');
					exit(0);
				}
			}
		?>
	</body>
</html>




  
