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
	  <?php include_once 'Php/include.php'; ?>
	  <link rel="stylesheet" href="css/login.css" media="screen" title="no title">
	  <link rel="stylesheet" type="text/css" href="css/iconos.css">
	</head>
	<body>
		<div class="container well" id="sha">
			<div class="row">
				<div class="col-xs-12">
					<img src="Image/avatar.png" class="img-responsive" id="avatar">
				</div>	
			</div>
			<form class="login" action="" method="POST">
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Contraseña" required="">
				</div>
				<button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
				<br/>
				<div class="form-group">
					<a href="create_acount.php">Registrate</a> | <a href="index.php">Inicio</a> 
					<strong><?php echo $msg; ?></strong>
				</div>
			</form>
		</div>
		<?php
			$msg = 'Usuario o contraseña invalido';
		    if(isset($_POST['password'])){
		      include_once 'Php/communicate.php';
		      $db =new Conexion("localhost","root","01mangekio03","istore");
		      $result = $db->is_user($_POST['email'],$_POST['password']);
		      if ($result['is_user']){
		        session_start();
		        //echo "tas ok";
		        $_SESSION['start'] = true;
		        $_SESSION['id'] = $result['id'];
		        $_SESSION['nombre'] = $result['name']; 
		        header('location: ./index.php');
		        exit(0);
		      }
		    }
    ?>
	</body>
</html>