
<header>
  <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
          <button type="button" name="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
            <span class="sr-only">Desplegar / Ocultar Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="" class="navbar-brand">iStore</a>
      </div>
          <div class="collapse navbar-collapse" id="navegacion-fm">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    Categorias <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <?php 
                      include_once 'Php/communicate.php';
                      include_once 'Php/dats.php';
                      $db = new Conexion($HOST,$USER,$PASSWORD,$DB);
                      $re = $db->get_categories();
                      while ($row = mysqli_fetch_array($re)) {
                        echo '<li><a href="#'.$row['name'].'">'.$row['name'].'</a></li>'; 
                      }
                     ?>

                  </ul>
                </li>
                <li><a href="#">Contactanos</a></li>
                <?php 
                  session_start();
                  if(!isset($_SESSION['start'])){
                    echo '<li><a href="login.php">Ingresar</a></li><li><a href="create_acount.php">Registrate</a></li>';
                    session_destroy();
                  }else{
                      echo '
                      <li class="dropdown"><a href="login.php" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-user carrito"></span> '.$_SESSION['nombre'].'<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="Php/logout.php">Cerrar sesion</a></li>
                        <li><a href="#">Mis cosas</a></li>
                        </ul>
                      </li>';
                    } 
                  ?>
                <li><a href="#" class="navbar-left">Carrito<span class="glyphicon glyphicon-shopping-cart carrito"></span></a></li>
              </ul>
              <form class="navbar-form navbar-right" role="search" method="GET" action="Php/search.php">
                  <div class="form-group">
                    <input type="text" name="search" placeholder="Ingresa tu busqueda" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary" name="button">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
              </form>
          </div>
    </div>
  </nav>
</header>
