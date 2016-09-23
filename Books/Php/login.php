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
    <?php include_once 'Php/header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-8  col-lg-8 col-md-offset-2 col-lg-offset-2  login ">
          <form action="" method="post">
            <input  type="email" name="email" placeholder="Ingrese su direccion de correo" required="requiered" max="60" >
            <input type="password" name="password" placeholder="Ingrese su contraseña" required="requiered" max="42">
            <input type="submit" name="name" value="Entrar">
          </form>
        </div>
      </div>
    </div>
    <?php
    if(isset($_POST['password'])){
      include_once 'Php/communicate.php';
      include_once 'Php/dats.php';
      $db =new Conexion($HOST,$USER,$PASSWORD,$DB);
      $SQL = 'SELECT id,email,password,nombre FROM users WHERE email = "'.$_POST['email'].'" and password= "'.$_POST['password'].'" ;';
      $datos = $db->query($SQL);
      foreach ($datos as $key => $value) {
        echo $key," : ",$value,'</br>';
      }
      if (sizeof($datos) == 4){
        session_start();
        $_SESSION['start'] = true;
        $_SESSION['id'] = $datos['id'];
        $_SESSION['nombre'] = $datos['nombre']; 
        header('location: ./index.php');
        exit(0);
      }
    }
    ?>
</body>
</html>
