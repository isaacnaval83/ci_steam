
	<h2><?= $juego['titulo'] ?></h2>

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
	<section>
			<?= validation_errors() ?>
	  
	    <?php if (isset($error)): ?>
	      <p style="color:red;"><?= $error ?></p style="color:red;">
	    <?php endif ?>

		  <?= form_open('juegos/comentar') ?>
		 	 	<?= form_hidden('id', $id) ?>
		 	 	<?= form_hidden('juego_id', $juego['id']) ?>
	      <?= form_label('Comentario:', 'texto_comentario') ?>
	      <?= form_textarea(array('name' => 'texto_comentario', 
	      											  'cols' => '50', 
	      											  'rows' => '10', 
	      											  'maxlength' => '500')) ?><br/>
	      <?= form_submit('comentar', 'Comentar') ?>
	    <?= form_close() ?>

	</section>
	
		