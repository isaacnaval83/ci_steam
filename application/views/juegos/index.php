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
		
		
		<?php 
		//echo $juego['id'];
		//var_dump($comentarios[$juego['id']-1][0]['juegos_id']);
		//var_dump($comentarios[$juego['id']-1][$fila]['texto_comentario']);
		?>
		<!--<p>Comentarios: 
			<!--rellena todos los comentarios para un juego
			<?php $con=0; ?>
			<?php foreach ($comentarios as $comentario):?>
				<?php
				//var_dump($comentario['texto_comentario']);
				echo "Texto comentario".$comentarios[$juego['id']-1][$con]['texto_comentario']."<br/>";
				echo "contador".$con."<br/>";
				echo "juego[id]".$juego['id']."<br/>";
				echo "Juegos_id".$comentarios[$juego['id']-1][$con]['juegos_id']."<br/>";
				echo isset($comentarios[$juego['id']-1][$con]['juegos_id']);
				?>
				<?php if ($juego['id']==$comentarios[$juego['id']-1][$con]['juegos_id'] &&
							isset($comentarios[$juego['id']-1][$con]['juegos_id'])==TRUE): ?>
					<span><?= $comentarios[$juego['id']-1][$con] ?></span>
				<?php endif ?>
				
			<?php $con++; ?>	
			<?php endforeach;?>
		</p>-->


		<?php $fila++; ?>
		<img src="<?= $juego['url'] ?>">

	<?php endforeach;?>
</body>
</html>
	