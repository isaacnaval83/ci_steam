<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Comentar</title>
	</head>
	<body>
		  <?= validation_errors() ?>
	  
	    <?php if (isset($error)): ?>
	      <p style="color:red;"><?= $error ?></p style="color:red;">
	    <?php endif ?>

		  <?= form_open('juegos/comentar') ?>
		 	 	<?= form_hidden('id', $id) ?>
	      <?= form_label('Comentario:', 'texto_comentario') ?>
	      <?= form_textarea(array('name' => 'texto_comentario', 
	      											  'cols' => '50', 
	      											  'rows' => '10', 
	      											  'maxlength' => '500')) ?><br/>
	      <?= form_submit('comentar', 'Comentar') ?>
	    <?= form_close() ?>

	</body>
</html>