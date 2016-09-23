<?php 
	if (isset($_GET['search'])){
		include_once 'communicate.php';
		include_once 'dats.php';
		$db = new Conexion($HOST,$USER,$PASSWORD,$DB);
		$find = $db->filter_sql($_GET['search']);
		$SQL = 'SELECT title FROM producto WHERE title LIKE "%'.$find.'%";';
		$fil = $db->query($SQL);
		if ($db->afected_rows > 0){
			echo '<ul>';
			while ($row= mysqli_fetch_array($fil)) {
				echo '<li><a href="">'.$row['title'].'</a></li>';
			}
			echo '</ul>';
		}else 
		echo '<h3>No se encontraron Resultados para '.$find;
	}


?>