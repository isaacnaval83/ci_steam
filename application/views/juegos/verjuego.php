<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
		}

		html{
			
		}
		body{
			margin: 15px;
			text-align: center;
			justify-content: center;
			background-color: #0C3785;
			color: white;
			


		}

		section{
			display: flex;
			-webkit-flex-direction: row;
			-moz-flex-direction: row;
			-ms-flex-direction: row;
			-o-flex-direction: row;
			flex-direction: row;
			justify-content: center;
		}
		header{
			height: 60px;
			
			text-align: center;
			
			font-size: 50px;
			display: flex;
			-webkit-flex-direction: column;
			-moz-flex-direction: column;
			-ms-flex-direction: column;
			-o-flex-direction: column;
			flex-direction: column;
			margin-bottom: 25px;
		}
		div{
			text-align: left;
			color: black;
			background-color: #BEB2B2;

		}

		label{
			font-weight: bold;
		}
		img{
			height: 300px;
		}

		</style>
	</head>
	<body>
		<header><?= $juego['titulo'] ?></header>

		<section>
			<img src="<?= $juego['url'] ?>">
			<div>
				<label> Descripcion: </label>
					<?= $juego['descripcion'] ?><br/>
				<label> Fecha de lanzamiento: </label>
					<?= $juego['fecha_lanzamiento'] ?><br/>
				<label> Precio: </label>
					<?= $juego['precio'] ?><br/>

				<label> Sistema Operativo disponible: </label>
					<?php foreach ($so as $item):?>
						<?= $item['nombre_so'] ?>
					<?php endforeach;?><br/>
				<label> Desarrollador:  </label>
					<?= $juego['nombre_desarrollador'] ?><br/>

			</div>


		</section>
	
	
		
	</body>
</html>