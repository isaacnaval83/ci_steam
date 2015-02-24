<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Juegos</title>
</head>
<body>
	<p>INDEX</p>
	<?php $fila=0; ?>
	<?php foreach ($juegos as $juego):?>
		<p>Id: <?= $juego['id'] ?></p>
		<p>Titulo: <?= $juego['titulo'] ?></p>
		<!--caratula-->
		<p>Description: <?= $juego['descripcion'] ?></p>
		<p>Lanzamiento: <?= $juego['fecha_lanzamiento'] ?></p>
		<p>Precio: <?= $juego['precio'] ?></p>
		<p>Destacado: <?= $juego['destacado'] ?></p>
		<p>Desarrollador: <?= $juego['nombre_desarrollador'] ?></p>
		
		
		<p>Plataformas: 
			<!--rellena todos los sistemas operativos para un juego-->
			<?php foreach ($so[$fila] as $sistema):?>
				<span><?= $sistema['nombre_so'] ?></span>
			<?php endforeach;?>
		</p>
		<p>Generos: 
			<!--rellena todos los generos para un juego-->
			<?php foreach ($generos[$fila] as $genero):?>
				<span><?= $genero['nombre_genero'] ?></span>
			<?php endforeach;?>
		</p>
		
		<p>Comentarios: 
		<br>
		<?php 
		//rellena los comentarios
		for ($i=0; $i <count($comentarios) ; $i++) { 
			for ($x=0; $x <count($comentarios[$i]) ; $x++) { 
				if ($comentarios[$i][$x]["juegos_id"]==$juego['id']) {
					?>
					<span><?= $comentarios[$i][$x]["texto_comentario"] ?></span>
					<span>Usuario: <?= $comentarios[$i][$x]["nick"] ?></span>
					<br>
					<?php
				}
			}		
		}
		?>
		</p>
		
		<?php $fila++; ?>
		<img src="<?= $juego['url'] ?>">

	<?php endforeach;?>
</body>
</html>
	