<?php 
  include_once 'Php/communicate.php';
  include_once 'Php/dats.php';

  $db = new Conexion($HOST,$USER,$PASSWORD,$DB);
  $categories = $db->get_categories();
  while ($cat=mysqli_fetch_array($categories)) {
    $products = $db->get_products_by_category($cat['id_categoria']);  
    echo '<div id="#'.$cat['name'].'">';
      while ($row = mysqli_fetch_array($products)) {
       echo '<div class="Producto">
        <a href="Php/view.php?id_producto='.$row['id_producto'].'"><div>'.$row['title'].'</div></a>
          <a href="#"><img src="'.$row['img_src'].'" /></a>
          <div>Precio: $'.$row['precio'].'</div>
        </div>';

      }
    echo '</div>';
  }
?>


