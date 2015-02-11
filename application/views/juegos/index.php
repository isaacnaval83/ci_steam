<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Juegos</title>
</head>
<body>
	<p>INDEX</p>

	<?php foreach ($juegos as $juego):?>
		<p>Id: <?= $juego['id'] ?></p>
		<p>Titulo: <?= $juego['titulo'] ?></p>
		<!--caratula-->
		<p>Description: <?= $juego['descripcion'] ?></p>
		<p>Lanzamiento: <?= $juego['fecha_lanzamiento'] ?></p>
		<p>Precio: <?= $juego['precio'] ?></p>
		<p>Destacado: <?= $juego['destacado'] ?></p>
		<p>Desarrollador: <?= $juego['nombre_desarrollador'] ?></p>
		<img src="<?= $juego['url'] ?>">
	<?php endforeach;?>
</body>
</html>
	