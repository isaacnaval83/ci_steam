<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Juegos</title>
</head>
<body>
	<p>INDEX</p>

	<?php
		//var_dump($juegos);
	/*foreach ($juegos as $juego => $value) {
		//echo $juego['titulo'];
		//echo $value;
		echo "<br>";
		echo $juego;
		echo ": ";
		//echo $juegos[$juego];
		//echo $value;
	}*/
	?>

	<?php foreach ($juegos as $juego):?>
		<p><?= $juego['id'] ?></p>
		<p><?= $juego['titulo'] ?></p>
		<p><?= $juego['desarrollador_id'] ?></p>
		<p><?= $juego['caratula'] ?></p>
		<p><?= $juego['descripcion'] ?></p>
		<p><?= $juego['fecha_lanzamiento'] ?></p>
		<p><?= $juego['precio'] ?></p>
		<p><?= $juego['destacado'] ?></p>
	<?php endforeach;?>
</body>
</html>
	